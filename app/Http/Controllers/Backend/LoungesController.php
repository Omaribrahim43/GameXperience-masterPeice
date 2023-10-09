<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\LoungesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Lounges;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class LoungesController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(LoungesDataTable $dataTable)
    {
        return $dataTable->render('backend.lounges.all_lounges');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->where('role', 'agent');
        return view('backend.lounges.add_lounges', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lounge_image' => ['required', 'max:4196', 'image'],
            'lounge_name' => ['required', 'max:30'],
            'agent_id' => ['required'],
            'lounge_address' => ['required'],
            'lounge_description' => ['required', 'max:100'],
            'status' => ['required']
        ]);

        $lounge = new Lounges();

        $imagePath = $this->uploadImage($request, 'lounge_image', 'uploads');

        $lounge->image = $imagePath;
        $lounge->name = $request->lounge_name;
        $lounge->agent_id = $request->agent_id;
        $lounge->address = $request->lounge_address;
        $lounge->description = $request->lounge_description;
        $lounge->status = $request->status;
        $lounge->save();

        $notification = array(
            'message' => 'Lounge Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('lounges.index')->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all()->where('role', 'agent');
        $lounges = Lounges::findOrFail($id);
        return view('backend.lounges.edit_lounges', compact('lounges', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'lounge_image' => ['nullable', 'max:4196', 'image'],
            'lounge_name' => ['required', 'max:30'],
            'agent_id' => ['required'],
            'lounge_address' => ['required'],
            'lounge_description' => ['required', 'max:100'],
            'status' => ['required']
        ]);

        $lounge = Lounges::findOrFail($id);

        $imagePath = $this->updateImage($request, 'lounge_image', 'uploads', $lounge->image);

        $lounge->image = empty(!$imagePath) ? $imagePath : $lounge->image;
        $lounge->name = $request->lounge_name;
        $lounge->agent_id = $request->agent_id;
        $lounge->address = $request->lounge_address;
        $lounge->description = $request->lounge_description;
        $lounge->status = $request->status;
        $lounge->save();

        $notification = array(
            'message' => 'Lounge Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('lounges.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lounges = Lounges::findOrFail($id);
        $this->deleteImage($lounges->image);
        $lounges->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $lounge = Lounges::findOrFail($request->id);
        $lounge->status = $request->status == 'true' ? 'active' : 'inactive';
        $lounge->save();

        return response(['message' => 'Status has been updated!']);
    }
}
