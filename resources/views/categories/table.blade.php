<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Charge</th>
            <th>Created By</th>
            <th>Created At</th>
            <th class="nosort">Action</th>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $category)
        <tr>
            <td>{{  $category->cat_id }}</td>
            <td>{{ $category->name }}</td>
            <td>৳ {{ $category->price }}</td>
            <td>{{ $category->user->name }}</td>
            <td>{{ $category->created_at->format('d M Y') }}</td>
            <td>
                <div class="table-actions d-flex">
                    <a href="{{ route('categories.edit', $category->cat_id) }}"><i class="ik ik-edit-2"></i></a>
                    <a href="#" data-toggle="modal" data-target="#delete{{ $key }}"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
            <td></td>
        </tr>
        @include('categories.delete')
        @endforeach
    </tbody>
</table>
