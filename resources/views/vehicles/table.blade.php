<table id="data_table" class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Reg #</th>
      <th>Vehicle Name</th>
      <th>Vehicle Category</th>
      <th>Vehicle Charge</th>
      <th>Created By</th>
      <th>Created At</th>
      {{-- <th class="nosort">Action</th> --}}
      <th></th>

    </tr>
  </thead>
  <tbody>
    @foreach ($vehicles as $key => $vehicle)
      <tr>
        <td>{{ $vehicle->id }}</td>
        <td>{{ $vehicle->reg_no }}</td>
        <td>{{ $vehicle->name }}</td>
        <td>{{ $vehicle->category->name }}</td>
        <td>৳ {{ $vehicle->category->price }}</td>
        <td>{{ $vehicle->user->name }}</td>
        <td>{{ $vehicle->created_at->format('d M Y') }}</td>
        {{-- <td>
          <div class="btn-group table-actions d-flex">
            <a href="#" data-toggle="modal" data-target="#show{{ $key }}"><i class="ik ik-eye"></i></a>
            <a href="{{ route('vehicles.edit', $vehicle->id) }}"><i class="ik ik-edit-2"></i></a>
            <a href="#" data-toggle="modal" data-target="#delete{{ $key }}"><i class="ik ik-trash-2"></i></a>
          </div>
        </td> --}}
        <td></td>

      </tr>
      {{-- @include('vehicles.show') --}}
      {{-- @include('vehicles.delete') --}}
    @endforeach
  </tbody>
</table>
