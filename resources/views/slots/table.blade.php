<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Created By</th>
            <th>Created At</th>
            <th class="nosort">Action</th>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($slots as $key => $slot)
        <tr>
            <td>{{  $slot->slot_id }}</td>
            <td>{{ $slot->name }}</td>
            <td>{{ $slot->capacity }}</td>
            <td>{{ $slot->user->name }}</td>
            <td>{{ $slot->created_at->format('d M Y') }}</td>
            <td>
                <div class="table-actions d-flex">
                    <a href="{{ route('slots.edit', $slot->slot_id) }}"><i class="ik ik-edit-2"></i></a>
                    <a href="#" data-toggle="modal" data-target="#delete{{ $key }}"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
            <td></td>
        </tr>
        @include('slots.delete')
        @endforeach
    </tbody>
</table>
