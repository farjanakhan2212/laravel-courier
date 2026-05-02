<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierInvoice;
use App\Models\Parcel\CourierSender;
use App\Models\Courier\CourierParcel;


class CourierInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public $dir="pages.Courier.Invoice.";

    public function index()
    {
         $invoices=CourierInvoice::all();
        return view("$this->dir.index",["invoices"=>$invoices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $senders=CourierSender::all();
        $parcels=CourierParcel::all();

        return view("$this->dir.create",["senders"=>$senders,"parcels"=>$parcels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $invoice=new CourierInvoice();
        $invoice->sender_id=$request->sender_id;
        $invoice->remark=$request->remark;
        $invoice->payment_term=$request->payment_term;
        $invoice->invoice_total=$request->invoice_total;
        $invoice->paid_total=$request->paid_total;
        
        $invoice->save();

        return redirect("invoices");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice=CourierInvoice::find($id);
        return view("$this->dir.show",["invoice"=>$invoice]);     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice=CourierInvoice::find($id);
        return view("$this->dir.edit",["invoice"=>$invoice]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    $invoice=new CourierInvoice();
        $invoice->sender_id=$request->sender_id;
        $invoice->remark=$request->remark;
        $invoice->payment_term=$request->payment_term;
        $invoice->invoice_total=$request->invoice_total;
        $invoice->paid_total=$request->paid_total;
        
        $invoice->update();

        return redirect("invoices");
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(string $id){
        $invoice=CourierInvoice::find($id);
        return view("$this->dir.delete",["invoice"=>$invoice]);
    }
     
    public function destroy(string $id)
    {
         $invoice=CourierInvoice::find($id);
         $invoice->delete();
        return redirect("invoices");  
    }
}
