<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminUsersDataTable;
use App\DataTables\AgentUsersDataTable;
use App\DataTables\NormalUsersDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('backend.users.all_users');
    }

    public function showNormalUsers(NormalUsersDataTable $dataTable)
    {
        return $dataTable->render('backend.users.normal_users.all_normal_users');
    }

    public function showAgentUsers(AgentUsersDataTable $dataTable)
    {
        return $dataTable->render('backend.users.agent_users.all_agent_users');
    }


    public function showAdmins(AdminUsersDataTable $dataTable)
    {
        return $dataTable->render('backend.users.admin_users.all_admin_users');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.add_users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_image' => ['required', 'max:4196', 'image'],
            'user_full_name' => ['required', 'max:50'],
            'user_name' => ['required', 'max:30'],
            'user_email' => ['required', 'email'],
            'user_password' => ['required'],
            'user_address' => ['required', 'max:100'],
            'role' => ['required'],
            'status' => ['required']
        ]);

        $user = new User();

        $imagePath = $this->uploadImage($request, 'user_image', 'uploads');

        $user->photo = $imagePath;
        $user->name = $request->user_full_name;
        $user->username = $request->user_name;
        $user->address = $request->user_address;
        $user->email = $request->user_email;
        $user->password = $request->user_password;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        $notification = array(
            'message' => 'User Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('users.index')->with($notification);
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
        $users = User::findOrFail($id);
        return view('backend.users.edit_users', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_image' => ['nullable', 'max:4196', 'image'],
            'user_full_name' => ['required', 'max:50'],
            'user_name' => ['required', 'max:30'],
            'user_email' => ['required', 'email'],
            'user_address' => ['required', 'max:100'],
            'role' => ['required'],
            'status' => ['required']
        ]);

        $user = User::findOrFail($id);

        $imagePath = $this->updateImage($request, 'user_image', 'uploads', $user->photo);

        $user->photo = $imagePath;
        $user->name = $request->user_full_name;
        $user->username = $request->user_name;
        $user->address = $request->user_address;
        $user->email = $request->user_email;
        $user->password = $request->user_password;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        $notification = array(
            'message' => 'User Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $this->deleteImage($user->photo);
        $user->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = $request->status == 'true' ? 'active' : 'inactive';
        $user->save();

        return response(['message' => 'Status has been updated!']);
    }
}
