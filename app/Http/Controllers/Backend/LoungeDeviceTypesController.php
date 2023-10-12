<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\LoungeDeviceTypesDataTable;
use App\Http\Controllers\Controller;
use App\Models\DeviceTypes;
use App\Models\LoungeDeviceTypes;
use App\Models\Lounges;
use Illuminate\Http\Request;

class LoungeDeviceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, LoungeDeviceTypesDataTable $dataTable)
    {
        $deviceTypes = DeviceTypes::all();
        $lounge = Lounges::findOrFail($request->lounge);
        return $dataTable->render('backend.lounges.device_types.index', compact('lounge', 'deviceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_type' => 'required',
            'lounge_id' => 'required',
            'price_per_hour' => 'required',
        ]);

        $LoungeDeviceType = new LoungeDeviceTypes();
        // $count = $LoungeDeviceType->device_type_id->count();
        $count = LoungeDeviceTypes::where('device_type_id', '=', $request->device_type)->count();
        if ($count == 0) {
            $LoungeDeviceType->device_type_id = $request->device_type;
            $LoungeDeviceType->lounge_id = $request->lounge_id;
            $LoungeDeviceType->price_per_hour = $request->price_per_hour;
            $LoungeDeviceType->save();

            $notification = array(
                'message' => 'Device Type Added Successfully!!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Device Type Already Exists In This Game Center!!',
                'alert-type' => 'error',
            );

            return redirect()->route('device.index', ['lounge' => $request->id])->with($notification);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deviceType = LoungeDeviceTypes::findOrFail($id);
        $deviceType->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
