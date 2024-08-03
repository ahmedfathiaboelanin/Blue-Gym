@php
use Carbon\Carbon;
@endphp
<div class="searchHead">
<a class="actionBtn add" href="{{ route('dashboard.packages.create') }}"><i class="fa-solid fa-plus"></i> Add Package</a>
<a class="actionBtn add" href="{{ route('download.packages')}}"><i class="fa-solid fa-plus"></i> Download All Packages</a>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <caption>
            List of Packages
            {{ $packages->links() }}
        </caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Old Price</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Duration</th>
                <th>Badge</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td>{{$package->id}}</td>
                    <td>{{ $package->title }}</td>
                    <td>{{ $package->description }}</td>
                    <td>{{ $package->price }}</td>
                    <td>{{ $package->old_price }}</td>
                    <td>{{ $package->start_date }}</td>
                    <td>{{ $package->end_date }}</td>
                    <td>{{ $package->months }}</td>
                    <td>{{ $package->badge }}</td>
                    <td>{{ $package->is_active }}</td>
                    <td>
                        <a class="actionBtn edit" href="{{ route('dashboard.packages.editform',['id' => $package->id]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.packages.delete', $package->id) }}" method="POST">
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