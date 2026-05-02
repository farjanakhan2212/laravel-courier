<?php

use App\Models\Courier\CourierParcel;
use App\Models\Courier\CourierType;
use App\Models\Parcel\CourierSender;
use App\Models\Courier\CourierReceiver;
use App\Models\Courier\CourierBranch;
use App\Models\Courier\CourierVehicle;
use App\Models\Courier\CourierShipment;
use App\Models\Courier\Person;


$parcels = CourierParcel::all();
$types = CourierType::all();
$senders = CourierSender::all();
$receivers = CourierReceiver::all();
$branches = CourierBranch::all();
$vehicles = CourierVehicle::all();
$shipments = CourierShipment::all();
$persons = Person::all();

?>

@extends("layouts.master")

@section("page")


<div class="card">
  <div class="card-header">
    <div class="row flex-between-center">
      <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Create Parcel</h5>
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

    <form action="{{url('parcels')}}" method="post" enctype="multipart/form-data">
      @csrf
      
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="type_id">Type</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select" id="type_id" name="type_id">
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="remark">Remark</label>
        <div class="col-sm-10">
          <input class="form-control" id="remark" name="remark" type="text">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="sender_id">Sender</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select" id="sender_id" name="sender_id">
            @foreach($senders as $sender)
            <option value="{{$sender->id}}">{{$sender->name}}</option>
            @endforeach
          </select>
        </div>
      </div>


      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="receiver_id">Reveicer</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select" id="receiver_id" name="receiver_id">
            @foreach($receivers as $receiver)
            <option value="{{$receiver->id}}">{{$receiver->name}}</option>
            @endforeach
          </select>
        </div>
      </div>




      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="weight">Weight</label>
        <div class="col-sm-10">
          <input class="form-control" id="weight" name="weight" type="text">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="created_at">Created_At</label>
        <div class="col-sm-10">
          <input class="form-control" id="created_at" name="created_at" type="datetime-local">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="update_at">Update_At</label>
        <div class="col-sm-10">
          <input class="form-control" id="update_at" name="update_at" type="datetime-local">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="is_csc">Is_CSC</label>
        <div class="col-sm-10">
          <input class="form-control" id="is_csc" name="is_csc" type="text">
        </div>
      </div>


      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="branch_id">Branch</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select" id="branch_id" name="branch_id">
            @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="vehical_id">Vehicle</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select" id="vehical_id" name="vehical_id">
            @foreach($vehicles as $vehicle)
            <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

        <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="shipment_id">Shipment</label>
                <div class="col-sm-10">
                  <select onchange="loadSection()" class="form-select" id="shipment_id" name="shipment_id">                      
                      @foreach($shipments as $shipment)
                        <option value="{{$shipment->id}}">{{$shipment->name}}</option>
                      @endforeach
                  </select>
                </div>
          </div>

       <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="person_id">person</label>
                <div class="col-sm-10">
                  <select onchange="loadSection()" class="form-select" id="person_id" name="person_id">                      
                      @foreach($persons as $person)
                        <option value="{{$person->id}}">{{$person->name}}</option>
                      @endforeach
                  </select>
                </div>
          </div>



      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="price">Price</label>
        <div class="col-sm-10">
          <input class="form-control" id="price" name="price" type="text">
        </div>
      </div>


      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="paid_amount">Paid_Amount</label>
        <div class="col-sm-10">
          <input class="form-control" id="paid_amount" name="paid_amount" type="text">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="vat">Vat</label>
        <div class="col-sm-10">
          <input class="form-control" id="vat" name="vat" type="text">
        </div>
      </div>


      <input class="btn btn-primary" type="submit" value="Save" />
    </form>

  </div>
</div>



@endsection