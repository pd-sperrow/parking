@extends('layouts.app')
@section('content')
@include('flash')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-12">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Vehicle List</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header"><h3>Customers List</h3></div> --}}
            <div class="card-body">
              @include('vehicles.table')
            </div>
        </div>
    </div>
</div>

@endsection
