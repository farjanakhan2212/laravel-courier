<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Courier\CourierInvoice;
use App\Models\Courier\CourierInvoiceDetail;
// use App\Models\Parcel\CourierSender;
// use App\Models\Courier\CourierParcel;


class CourierInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return "Hello";
        // $invoices=CourierInvoice::all();
           $invoices = DB::table('courier_invoices as i')
                     ->join('courier_sender as s', 's.id', '=', 'i.sender_id')
                     ->select('i.id', 'i.created_at','i.invoice_total','s.name as sender')
                     ->get();
           return response()->json(['invoices'=> $invoices], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'sender_id' => 'required|exists:senders,id',
            'created_at' => 'required|datetime-local',
            'remark' => 'nullable|string',
            'payment_term' => 'required|string',
            'updated_at' => 'required|datetime-local',
            'invoice_total' => 'required|numeric|min:0',
            'paid_total' => 'required|numeric|min:0',    

        ]);

        DB::beginTransaction();
        try{
            $invoice= CourierInvoice::create([

            'sender_id'=>$request->sender_id,
            'created_at' => $required->created_at,
            'remark' =>$required->remark??null ,
            'payment_term' => $required->payment_term,
            'updated_at' =>$required->updated_at,
            'invoice_total' => $required->invoice_total,
            'paid_total' => $required->paid_total
            ]);

            
         foreach($request->parcels as $parcel){
            CourierInvoiceDetail::create([
                  'invoice_id'=>$invoice->id,

                  'parcel_id'=>$parcel['id'],
                  'parcel_description'=>$parcel['parcel_description'],

                  'price'=>$parcel['price'],
                  'qty'=>$parcel['qty']

            ]);

         }
         
            DB::commit();

            return response()->json([
                'success' => true,
                'invoice' => $invoice->load('details')
            ], 201);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Invoice creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $invoice = CourierInvoice::with('details')->find($id);

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
                 return response()->json(['invoice' => $invoice], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = CourierInvoice::find($id);
        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
         $request->validate([

            'sender_id' => 'required|exists:senders,id',
            'created_at' => 'required|datetime-local',
            'remark' => 'nullable|string',
            'payment_term' => 'required|string',
            'updated_at' => 'required|datetime-local',
            'invoice_total' => 'required|numeric|min:0',
            'paid_total' => 'required|numeric|min:0',    

        ]);

          DB::beginTransaction();
        try{
            $invoice= update($request->only([

            'sender_id',
            'created_at', 
            'remark', 
            'payment_term',
            'updated_at', 
            'invoice_total', 
            'paid_total' 
            ]));

            if ($request->has('parcels')) {
                CourierInvoiceDetail::where('invoice_id', $invoice->id)->delete();

         foreach($request->parcels as $parcel){
            CourierInvoiceDetail::create([
                  'invoice_id'=>$invoice->id,
                  'parcel_id'=>$parcel['id'],
                  'parcel_description'=>$parcel['parcel_description'],

                 'price'=>$parcel['price'],
                 'qty'=>$parcel['qty']

            ]);

         }
    }     
    DB::commit();

            return response()->json([
                'success' => true,
                'invoice' => $invoice->load('details')
            ], 201);
            
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Invoice creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
      

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $invoice = CourierInvoice::find($id);
        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }

        CourierInvoiceDetail::where('invoice_id', $invoice->id)->delete();
        $invoice->delete();

        return response()->json(['message' => 'Invoice deleted successfully'], 200);
    }
}
