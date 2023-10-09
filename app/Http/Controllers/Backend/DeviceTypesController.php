<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DeviceTypesDataTable;
use App\Http\Controllers\Controller;
use App\Models\DeviceTypes;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class DeviceTypesController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(DeviceTypesDataTable $dataTable)
    {
        return $dataTable->render('backend.device_types.all_device_types');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.device_types.add_device_types');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_type_image' => ['required', 'max:4196', 'image'],
            'device_type' => ['required', 'max:30'],
            'device_type_description' => ['required'],
            'status' => ['required']
        ]);

        $device_type = new DeviceTypes();

        $imagePath = $this->uploadImage($request, 'device_type_image', 'uploads');

        $device_type->image = $imagePath;
        $device_type->type = $request->device_type;
        $device_type->description = $request->device_type_description;
        $device_type->status = $request->status;
        $device_type->save();

        $notification = array(
            'message' => 'Device Type Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('device-types.index')->with($notification);
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
    public function edit(string $id)
    {
        $deviceType = DeviceTypes::findOrFail($id);
        return view('backend.device_types.edit_device_types', compact('deviceType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'device_type_image' => ['nullable', 'max:4196', 'image'],
            'device_type' => ['required', 'max:30'],
            'device_type_description' => ['required'],
            'status' => ['required']
        ]);

        $device_type = DeviceTypes::findOrFail($id);

        $imagePath = $this->updateImage($request, 'device_type_image', 'uploads', $device_type->image);

        $device_type->image = empty(!$imagePath) ? $imagePath : $device_type->image;
        $device_type->type = $request->device_type;
        $device_type->description = $request->device_type_description;
        $device_type->status = $request->status;
        $device_type->save();

        $notification = array(
            'message' => 'Device Type Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('device-types.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deviceTypes = DeviceTypes::findOrFail($id);
        $this->deleteImage($deviceTypes->image);
        $deviceTypes->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $deviceTypes = DeviceTypes::findOrFail($request->id);
        $deviceTypes->status = $request->status == 'true' ? 'active' : 'inactive';
        $deviceTypes->save();

        return response(['message' => 'Status has been updated!']);
    }
}
