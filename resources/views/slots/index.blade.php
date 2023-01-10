@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-12">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Slot List</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              @include('slots.table')
            </div>
        </div>
    </div>
</div>

@endsection
