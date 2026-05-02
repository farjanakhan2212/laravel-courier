<?php

use App\Models\Courier\CourierParcelHistory;
use App\Models\Courier\CourierParcel;
use App\Models\Courier\CourierParcelStatus;
use App\Models\Courier\Person;
use App\Models\Courier\CourierBranch;

$parcels = CourierParcel::all();
$statuses = CourierParcelStatus::all();
$persons = Person::all();
$branches = CourierBranch::all();
$histories = CourierParcelHistory::all();




?>

@extends("layouts.master")
@section("page")

<div class="card">
  <div class="card-header">
    <div class="row flex-between-center">
      <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">View All History</h5>
      </div>
      <div class="col-8 col-sm-auto ms-auto text-end ps-0">

        <div id="orders-actions">
          <a href="{{url('history')}}" class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;">
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

    <form action="{{url('history/'.$history->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method("PUT")
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="parcel_id">Parcel ID</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select px-4" id="parcel_id" name="parcel_id">
            @foreach($parcels as $parcel)
            <option value="{{$parcel->id}}">{{$parcel->id}}</option>
            @endforeach
          </select>
        </div>
      </div>

     <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="status_id">Status ID</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select" id="status_id" name="status_id">
            @foreach($statuses as $status)
            <option value="{{$status->id}}">{{$status->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

 <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="person_id">person ID</label>
                <div class="col-sm-10">
                  <select onchange="loadSection()" class="form-select" id="person_id" name="person_id">                      
                      @foreach($persons as $person)
                        <option value="{{$person->id}}">{{$person->name}}</option>
                      @endforeach
                  </select>
                </div>
          </div>

       <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="branch_id">Branch ID</label>
        <div class="col-sm-10">
          <select onchange="loadSection()" class="form-select" id="branch_id" name="branch_id">
            @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach
          </select>
        </div>
      </div>


      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="created_at">Created_At</label>
        <div class="col-sm-10">
          <input class="form-control" id="created_at" name="created_at" type="datetime-local" value="{{ $history->created_at }}">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="remark">Remark</label>
        <div class="col-sm-10">
          <input class="form-control" id="remark" name="remark" type="text" value="{{ $history->remark }}">
        </div>
      </div>


      <input class="btn btn-primary" type="submit" value="Save Change" />
    </form>

  </div>
</div>



@endsection