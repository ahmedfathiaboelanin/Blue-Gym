@php
use Carbon\Carbon;
@endphp
<div class="searchHead">
    <form action="{{ route('users') }}" class="mb-5">
    <div class="input-group flex-nowrap">
        <input type="search" name="search" id="search" class="form-control" placeholder="Search with name or email">
        <span class="input-group-text" id="basic-addon2">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </span>
    </div>
</form>
<a class="actionBtn add" href="{{ route('users.create')}}"><i class="fa-solid fa-plus"></i> Add user</a>
<a class="actionBtn add" href="{{ route('download.users')}}"><i class="fa-solid fa-plus"></i> Download All Users</a>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <caption>
            List of users
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
                <th>Start date</th>
                <th>End date</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Status</th>
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
                    <td>{{ Carbon::parse($user->start_date)->format('d/m/Y')}}</td>
                    <td>
                        @if(Carbon::parse($user->end_date)->format('Y-m-d') < now()->format('Y-m-d'))
                            <span class="text-danger">{{ Carbon::parse($user->end_date)->format('d/m/Y') }}</span>
                        @elseif (Carbon::parse($user->end_date)->format('Y-m-d') > now()->format('Y-m-d'))
                            {{ Carbon::parse($user->end_date)->format('d/m/Y') }}
                        @else
                            <span class="text-warning">{{ Carbon::parse($user->end_date)->format('d/m/Y') }}</span>
                        @endif
                    </td>
                    <td>{{ $user->number_of_months }}</td>
                    <td>{{ $user->the_price_of_registration }}</td>
                    <td>
                        @if(Carbon::parse($user->end_date)->format('Y-m-d') < now()->format('Y-m-d'))
                            <span class="text-danger">Ended</span>
                        @elseif (Carbon::parse($user->end_date)->format('Y-m-d') > now()->format('Y-m-d'))
                            Active
                        @else
                            <span class="text-warning">Last Day</span>
                        @endif
                    </td>
                    <td>
                        <a class="actionBtn edit" href="{{ route('users.editform',['id' => $user->id]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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