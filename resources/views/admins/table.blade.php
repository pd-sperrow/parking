<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            {{-- <th class="nosort">Avatar</th> --}}
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th class="nosort">Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{ $key+1 }}</td>
            {{-- <td><img src="{{ getUserAvatar($user->avatar) }}" class="table-user-thumb" alt=""></td> --}}
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('d M Y') }}</td>
            <td>
                <div class="table-actions d-flex">
                    @if(auth()->user()->email != $user->email)
                        <a href="#" data-toggle="modal" data-target="#delete{{ $key }}"><i class="ik ik-trash-2"></i></a>
                    @else
                        <a href="#">Logged user</a>
                    @endif
                </div>
            </td>
            <td></td>
        </tr>
        @if(auth()->user()->email != $user->email)
            @include('admins.delete')
        @endif
        @endforeach
    </tbody>
</table>
