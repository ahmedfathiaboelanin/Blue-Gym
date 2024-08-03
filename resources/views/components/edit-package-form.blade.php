@php
    use Carbon\Carbon;
@endphp
<form action="{{ route('dashboard.packages.edit', $package->id) }}" class=" createForm" method="POST">
    @csrf
    @if ($errors->any())
        <div class="errors">
            @if ($errors->has('title'))
                <p class="alert alert-danger">{{ $errors->first('title') }}</p>
            @endif
            @if ($errors->has('description'))
                <p class="alert alert-danger">{{ $errors->first('description') }}</p>
            @endif
            @if ($errors->has('price'))
                <p class="alert alert-danger">{{ $errors->first('price') }}</p>
            @endif
            @if ($errors->has('old_price'))
                <p class="alert alert-danger">{{ $errors->first('old_price') }}</p>
            @endif
            @if ($errors->has('badge'))
                <p class="alert alert-danger">{{ $errors->first('badge') }}</p>
            @endif
            @if ($errors->has('months'))
                <p class="alert alert-danger">{{ $errors->first('months') }}</p>
            @endif
            @if ($errors->has('start_date'))
                <p class="alert alert-danger">{{ $errors->first('start_date') }}</p>
            @endif
            @if ($errors->has('end_date'))
                <p class="alert alert-danger">{{ $errors->first('end_date') }}</p>
            @endif
            @if ($errors->has('is_active'))
                <p class="alert alert-danger">{{ $errors->first('is_active') }}</p>
            @endif
        </div>
    @endif
    <div class="inputRow">
        <input class="form-control" required type="text" name="title" value="{{ $package->title }}" id="title" placeholder="Package Title">
        <input class="form-control" required type="number" name="price" value="{{ $package->price }}" id="price" placeholder="Price">
        <input class="form-control" type="number" name="old_price" value="{{ $package->old_price }}" id="oldPrice" placeholder="Old Price">
        <input class="form-control" type="number" name="months" value="{{ $package->months }}" id="months" placeholder="Number of Months">
    </div>
    <div class="inputRow">
        <textarea class="w-100" name="description" id="description" placeholder="Package Description">{{ $package->description }}</textarea>
    </div>
    <div class="inputRow">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="basic-addon1">Start Date</span>
            <input type="date" id="start" name="start_date" min="{{ date('Y-m-d') }}" value="{{ $package->start_date }}" class="form-control">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="basic-addon2">End Date</span>
            <input type="date" id="end" name="end_date" min="{{ date('Y-m-d') }}" value="{{ $package->end_date }}" class="form-control">
        </div>
    </div>
    <div class="inputRow">
        <select name="badge">
            <option {{ $package->badge == 'BASIC' ? 'selected' : '' }} value="BASIC">Basic</option>
            <option {{ $package->badge == 'HOT' ? 'selected' : '' }} value="HOT">HOT</option>
            <option {{ $package->badge == 'NEW' ? 'selected' : '' }} value="NEW">NEW</option>
        </select>
        <select name="is_active">
            <option {{ $package->is_active == 1 ? 'selected' : '' }} value="{{ 1 }}">Active</option>
            <option {{ $package->is_active == 0 ? 'selected' : '' }} value="{{ 0 }}">Inactive</option>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Update">
</form>