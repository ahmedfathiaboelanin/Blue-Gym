<form action="{{ route('dashboard.packages.add') }}" class=" createForm" method="POST">
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
        </div>
    @endif
    <div class="inputRow">
        <input class="form-control" required type="text" name="title" id="title" placeholder="Package Title">
        <input class="form-control" required type="number" name="price" id="price" placeholder="Price">
        <input class="form-control" type="number" name="old_price" id="oldPrice" placeholder="Old Price">
        <input class="form-control" type="number" name="months" id="months" placeholder="Number of Months">
    </div>
    <div class="inputRow">
        <textarea class="w-100" name="description" placeholder="Package Description"></textarea>
    </div>
    {{-- <div class="inputRow">
    </div> --}}
    <div class="inputRow">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="basic-addon1">Start Date</span>
            <input type="date" id="start" name="start_date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d')}}" class="form-control">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="basic-addon2">End Date</span>
            <input type="date" id="end" name="end_date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d')}}" class="form-control">
        </div>
    </div>
    <div class="inputRow">
        <select name="badge">
            <option value="BASIC">Basic</option>
            <option value="HOT">HOT</option>
            <option value="NEW">NEW</option>
        </select>

    </div>
    <input type="submit" class="btn btn-primary" value="Create Admin">
</form>