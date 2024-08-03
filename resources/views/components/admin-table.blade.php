<div class="searchHead">
    <form action="{{ route('admins') }}" class="mb-5">
        <div class="input-group flex-nowrap">
            <input type="search" name="search" id="search" class="form-control" placeholder="Search with name or email">
            <span class="input-group-text" id="basic-addon2">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </span>
        </div>
    </form>
<a class="actionBtn add" href="{{ route('admins.create')}}"><i class="fa-solid fa-plus"></i> Add Admin</a>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <caption>
            List of Admins
            <div class="pagination d-flex flex-column">
                {{ $users->links() }}
            </div>
        </caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{!! $user->gender === 'male' ? '<i class="fa-solid fa-mars fa-lg text-blue-600"></i> Male' : '<i class="fa-solid fa-venus fa-lg text-pink-600"></i> Female'  !!}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a class="actionBtn edit" href="{{ route('admins.editform',['id' => $user->id]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admins.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="actionBtn delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>