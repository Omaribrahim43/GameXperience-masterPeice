<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PaymentMethodDataTable;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaymentMethodDataTable $dataTable)
    {
        return $dataTable->render('backend.payment_method.index');
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
        $paymentMethod = PaymentMethod::findOrFail($id);
        $users = User::all();
        return view('backend.payment_method.edit', compact('paymentMethod', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => ['required'],
            'payment_type' => ['required', 'max:20'],
            'payment_details' => ['required', 'max:20'],
            'billing_address' => ['required', 'max:50'],
            'expiry_date' => ['required', 'date'],
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);

        $paymentMethod->user_id = $request->user_id;
        $paymentMethod->payment_type = $request->payment_type;
        $paymentMethod->payment_details = $request->payment_details;
        $paymentMethod->billing_address = $request->billing_address;
        $paymentMethod->expiry_date = $request->expiry_date;
        $paymentMethod->save();

        $notification = array(
            'message' => 'Payment Method Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('payment-method.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment_method = PaymentMethod::findOrFail($id);
        $payment_method->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
