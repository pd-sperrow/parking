@extends('layouts.app')
@section('content')
@include('flash')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-12">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Admin List</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @include('admins.table')

            </div>
        </div>
    </div>
</div>

@endsection
