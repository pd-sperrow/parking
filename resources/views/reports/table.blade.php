<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Parking Number</th>
            <th>Reg #</th>
            <th>Parking Area</th>
            <th>Recieved By</th>
            <th>Parking Time</th>
            <th>Charge</th>
            <th>Status</th>
            <th class="nosort">Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($parks as $key => $park)
        <tr>
            <td>{{ $park->id }}</td>
            <td>{{ $park->vehicle->reg_no }}</td>
            <td>{{ $park->slot->name }}</td>
            <td>{{ $park->reciever->name }}</td>
            <td>{{ $park->parking_time }}</td>
            <td>৳ {{ $park->charge }}</td>
            @if($park->status == 'in_parking')
            <td><span class="badge badge-pill badge-primary">Parked</span></td>
            @else
            <td><span class="badge badge-pill badge-warning">Leaved</span></td>
            @endif
            <td>
                <div class="table-actions d-flex">
                    <a href="{{ route('parks.show', $park->id) }}"><i class="ik ik-eye"></i></a>
                    <a href="{{ route('parks.edit', $park->id) }}"><i class="ik ik-edit-2"></i></a>
                    <a href="#" onclick=" confirm('Are you sure you want to delete this?');
                    document.getElementById('delete-data').submit();"><i class="ik ik-trash-2"></i></a>

                     <form id="delete-data" action="{{ route('parks.destroy', $park->id) }}" method="POST" class="d-none">
                        @method('Delete')
                        @csrf
                    </form>
                </div>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
