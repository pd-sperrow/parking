@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-10">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h5>Vehicle Reports</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-header row">
            <div class="col col-sm-12">
                <label for="">Search Vehicle with Registration Number</label>
                <div class="card-search with-adv-search dropdown">
                    <form action="{{ route('reports.index') }}" method="GET">
                        <input type="text" value="{{ request()->search_in }}" class="form-control" name="search_in"
                            placeholder="REG NO.." required>
                        <input type="hidden" name="report_in" value="report_in">
                        <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                    </form>
                    <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle"
                        data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <form action="{{ route('reports.index') }}" method="GET">
                        <input type="hidden" name="report_out" value="report_out">
                        <div class="adv-search-wrap dropdown-menu dropdown-menu-right " aria-labelledby="adv_wrap_toggler">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="date">From Date</label>
                                    <input type="text" value1="{{ request()->from_date }}"
                                        class="form-control datetimepicker-input" name="from_date" id="datepicker_in_from"
                                        data-toggle="datetimepicker" data-target="#datepicker_in_from">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">To Date</label>
                                    <input type="text" value1="{{ request()->to_date }}"
                                        class="form-control datetimepicker-input" name="to_date" id="datepicker_in_to"
                                        data-toggle="datetimepicker" data-target="#datepicker_in_to">
                                </div>
                            </div>

                            <div class="btn-group" style="float: right">
                                <button class="btn btn-theme">Search</button>
                            </div>
                        </div>
                        {{-- <input type="text" value="{{ old('from_date') }}" name="" id=""> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('reports.table')
                </div>
            </div>
        </div>
    </div>

@endsection
