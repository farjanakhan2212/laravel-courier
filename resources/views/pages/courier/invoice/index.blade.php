@extends("layouts.master")

@section("page")
<?php
use App\Models\Courier\CourierInvoice;
$invoices=CourierInvoice::all();

// print_r($customers->toArray());
?>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
<tr>
    <th>ID</th>
    <th>Sender ID</th>
    <th>Remark</th>
    <th>Payment_Term</th>
    <th>Invoice_total</th>
    <th>Paid_total</th>
    <th  class="d-flex justify-content-center">Action</th>
</tr>
@foreach($invoices as $invoice)
<tr>
    <td>{{$invoice->id}}</td>
    <td>{{$invoice->sender_id}}</td>
    <td>{{$invoice->remark}}</td>
    <td>{{$invoice->payment_term}}</td>
    <td>{{$invoice->invoice_total}}</td>
    <td>{{$invoice->paid_total}}</td>
    <td class="d-flex justify-content-center">
      <div class="btn-group">
        <a class="btn btn-primary" href="{{url('invoices/'.$invoice->id)}}">View</a>
        <a class="btn btn-danger" href="{{url('invoices/'.$invoice->id.'/delete')}}">Delete</a>
      
      </div>
    </td>
</tr>
@endforeach
</table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              
              </div>
            </div>

@endsection