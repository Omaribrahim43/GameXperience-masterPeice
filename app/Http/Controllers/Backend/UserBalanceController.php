<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UserBalanceDataTable;
use App\Http\Controllers\Controller;
use App\Models\UserBalance;
use Illuminate\Http\Request;

class UserBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserBalanceDataTable $dataTable)
    {
        return $dataTable->render('backend.users.normal_users.user_balance.index');
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
        //
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
        $service = UserBalance::findOrFail($id);
        $service->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
