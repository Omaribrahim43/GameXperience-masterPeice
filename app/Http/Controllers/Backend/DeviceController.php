<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DeviceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceTypes;
use App\Models\Lounges;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use DB;

class DeviceController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(DeviceDataTable $dataTable, Request $request)
    {
        $lounge = Lounges::findOrFail($request->lounge);
        return $dataTable->render('backend.lounges.lounge_devices.all_device', compact('lounge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $deviceTypes = DeviceTypes::all();
        $lounge = Lounges::findOrFail($request->lounge);
        return view('backend.lounges.lounge_devices.add_device', compact('deviceTypes', 'lounge'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_image' => ['required', 'max:4196', 'image'],
            'lounge_id' => ['required'],
            'device_type_id' => ['required'],
            'vip_room' => ['required'],
            'status' => ['required'],
            'device_info' => ['required', 'max:100'],
        ]);

        $validRelationship = DB::table('lounge_device_types')
            ->where('lounge_id', $request->lounge_id)
            ->where('device_type_id', $request->device_type_id)
            ->exists();

        if (!$validRelationship) {
            $notification = array(
                'message' => 'This Game Center doesnt have such a device type.',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }

        $device = new Device();

        $imagePath = $this->uploadImage($request, 'device_image', 'uploads');

        $device->image = $imagePath;
        $device->lounge_id = $request->lounge_id;
        $device->device_type_id = $request->device_type_id;
        $device->info = $request->device_info;
        $device->vip_room = $request->vip_room;
        $device->status = $request->status;
        $device->save();

        $notification = array(
            'message' => 'Device Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $device = Device::findOrFail($id);
        $deviceTypes = DeviceTypes::all();
        $lounge = Lounges::findOrFail($request->lounge);
        return view('backend.lounges.lounge_devices.edit_device', compact('device', 'deviceTypes', 'lounge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'device_image' => ['nullable', 'max:4196', 'image'],
            'device_type_id' => ['required'],
            'lounge_id' => ['required'],
            'vip_room' => ['required'],
            'status' => ['required'],
            'device_info' => ['required', 'max:100'],
        ]);

        $device = Device::findOrFail($id);

        $imagePath = $this->updateImage($request, 'device_image', 'uploads', $device->image);

        $device->image = empty(!$imagePath) ? $imagePath : $device->image;
        $device->lounge_id = $request->lounge_id;
        $device->device_type_id = $request->device_type_id;
        $device->info = $request->device_info;
        $device->vip_room = $request->vip_room;
        $device->status = $request->status;
        $device->save();

        $notification = array(
            'message' => 'Device Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deviceTypes = Device::findOrFail($id);
        $this->deleteImage($deviceTypes->image);
        $deviceTypes->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $deviceTypes = Device::findOrFail($request->id);
        $deviceTypes->status = $request->status == 'true' ? 'active' : 'inactive';
        $deviceTypes->save();

        return response(['message' => 'Status has been updated!']);
    }
}
