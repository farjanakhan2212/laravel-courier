@extends("layouts.master")

@section("page")

<div class="card">
  <div class="card-header">
    <div class="row flex-between-center">
      <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Parcel Details</h5>
      </div>
      <div class="col-8 col-sm-auto ms-auto text-end ps-0">

        <div id="orders-actions">
          <a href="{{url('parcels')}}" class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;">
              <g transform="translate(224 256)">
                <g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                  <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path>
                </g>
              </g>
            </svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Back</span></a>

          <a href="#" class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;">
              <g transform="translate(256 256)">
                <g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                  <path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path>
                </g>
              </g>
            </svg><!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Export</span></a>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">

    <table class="table table-bordered table-striped">
      <tr>
        <th>Id</th>
        <td> {{$parcel->id}}</td>
      </tr>
      <tr>
        <th>Type</th>
        <td>{{$parcel->type_id}}</td>
      </tr>
       <tr>
        <th>Remark</th>
        <td> {{$parcel->remark}}</td>
      </tr>
      <tr>
        <th>Sender</th>
        <td>{{$parcel->sender_id}}</td>
      </tr>
      <tr>
        <th>Receiver</th>
        <td>{{$parcel->receiver_id}}</td>
      </tr>
      <tr>
        <th>Weight</th>
        <td> {{$parcel->weight}}</td>
      </tr>
      <tr>
        <th>Created_At</th>
        <td> {{$parcel->created_at}}</td>
      </tr>
      <tr>
        <th>Update_At</th>
        <td> {{$parcel->update_at}}</td>
      </tr>
      <tr>
        <th>Is_CSC</th>
        <td> {{$parcel->is_csc}}</td>
      </tr>
      <tr>
        <th>Branch</th>
        <td>{{$parcel->branch_id}}</td>
      </tr>
      <tr>
        <th>Vehical</th>

        <td>{{$parcel->vehical_id}}</td>
      </tr>
      <tr>
        <th>Shipment</th>

        <td>{{$parcel->shipment_id}}</td>
      </tr>
      <tr>
        <th>Person</th>

        <td>{{$parcel->person_id}}</td>
      </tr>
      <tr>
        <th>Price</th>
        <td> {{$parcel->price}}</td>
      </tr>
     
      <tr>
        <th>Paid_Amount</th>
        <td> {{$parcel->paid_amount}}</td>
      </tr>
      <tr>
        <th>Vat</th>
        <td> {{$parcel->vat}}</td>
      </tr>

      <tr>
        <td>
          <form action="{{url('parcels/'.$parcel->id)}}" method="post">
            @csrf
            @method("DELETE")

            <input class="btn btn-danger" type="submit" value="Delete" />
          </form>
        </td>
      </tr>
    </table>

  </div>
</div>
@endsection