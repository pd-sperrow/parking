@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body" id="printDiv">
              <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Parking Details</h4>
                    <hr>
                </div>
                <div class="col-md-6"><h6>Vehicle Category</h6></div>
                <div class="col-md-6 mb-1 text-right"><h6>{{ $park->vehicle->category->name }}</h6></div>

                <div class="col-md-6"><h6>Vehicle Name</h6></div>
                <div class="col-md-6 mb-1 text-right"><h6>{{ $park->vehicle->name }}</h6></div>

                <div class="col-md-6"><h6>Registration Number</h6></div>
                <div class="col-md-6 mb-1 text-right"><h6>{{ $park->vehicle->reg_no }}</h6></div>

                <div class="col-md-6"><h6>Customer Name</h6></div>
                <div class="col-md-6 mb-1 text-right"><h6>{{ $park->customer_name }}</h6></div>

                <div class="col-md-6"><h6>Customer Phone</h6></div>
                <div class="col-md-6 mb-1 text-right"><h6>{{ $park->customer_phone }}</h6></div>

                <div class="col-md-6"><h6>Parking slot</h6></div>
                <div class="col-md-6 mb-1 text-right"><h6>{{ $park->slot->name }}</h6></div>

                <div class="col-md-6"><h6>Parked Time</h6></div>
                @php
                    $date = new DateTime($park->parking_time);
                @endphp
                <div class="col-md-6 mb-1 text-right"><h6>{{ $date->format('d M Y h:i A') }}</h6></div>

                <div class="col-md-6"><h6>Charge</h6></div>
                <div class="col-md-6 text-right"><h6>৳ {{ $park->charge }}(Paid)</h6></div>

                <div class="col-md-12"><hr></div>
                <div class="col-md-6"><h6>Recieved By</h6></div>
                <div class="col-md-6 text-right"><h6>{{ $park->reciever->name }}</h6></div>
                <div class="col-md-6"><h6>Leaved By</h6></div>
                <div class="col-md-6 text-right"><h6>{{ optional($park->leaved)->name ?? 'Currently Parked' }}</h6></div>
                <div class="col-md-6"><h6>Leaved Time</h6></div>
                @php
                    $ldate = new DateTime($park->leave_time);
                @endphp
                <div class="col-md-6 text-right"><h6>{{ ($park->leave_time) ? $ldate->format('d M Y h:i A') : 'Currently Parked' }}</h6></div>
              </div>
            </div>
            <div class="card-footer">
                <div class="btn btn-danger" onclick="myPrint()">Print</div>
            </div>
        </div>
    </div>

</div>
<script>
    function myPrint() {
        var printContents = document.getElementById('printDiv').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
