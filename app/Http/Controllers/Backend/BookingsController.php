<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BookingsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookingsDataTable $dataTable)
    {
        return $dataTable->render('backend.bookings.index');
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
        $bookings = Bookings::findOrFail($id);
        $bookings->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $bookings = Bookings::findOrFail($request->id);
        $bookings->booking_status = $request->status == 'true' ? 'accepted' : 'rejected';
        $bookings->save();

        return response(['message' => 'Status has been updated!']);
    }
}
