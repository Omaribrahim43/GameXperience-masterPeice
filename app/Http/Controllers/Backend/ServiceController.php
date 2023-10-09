<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('backend.services.all_services');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.services.add_services');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_image' => ['required', 'max:4196', 'image'],
            'service_title' => ['required', 'max:20'],
            'service_description' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $service = new Services();

        $imagePath = $this->uploadImage($request, 'service_image', 'uploads');

        $service->image = $imagePath;
        $service->title = $request->service_title;
        $service->description = $request->service_description;
        $service->status = $request->status;
        $service->save();

        $notification = array(
            'message' => 'Service Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('service.index')->with($notification);
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
        $services = Services::findOrFail($id);
        return view('backend.services.edit_services', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'service_image' => ['nullable', 'max:4196', 'image'],
            'service_title' => ['required', 'max:20'],
            'service_description' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $service = Services::findOrFail($id);

        $imagePath = $this->updateImage($request, 'service_image', 'uploads', $service->image);

        $service->image = empty(!$imagePath) ? $imagePath : $service->image;
        $service->title = $request->service_title;
        $service->description = $request->service_description;
        $service->status = $request->status;
        $service->save();

        $notification = array(
            'message' => 'Service Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Services::findOrFail($id);
        $this->deleteImage($service->image);
        $service->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $service = Services::findOrFail($request->id);
        $service->status = $request->status == 'true' ? 'active' : 'inactive';
        $service->save();

        return response(['message' => 'Status has been updated!']);
    }
}
