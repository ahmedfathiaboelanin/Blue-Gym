@php
    use Carbon\Carbon;
@endphp
<form action="{{ route($route, $user->id) }}" class="createForm" method="POST">
    @csrf
    @if ($errors->any())
        <div class="errors">
            @if ($errors->has('name'))
                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
            @if ($errors->has('email'))
                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
            @endif
            @if ($errors->has('phone'))
                <p class="alert alert-danger">{{ $errors->first('phone') }}</p>
            @endif
            @if ($errors->has('password'))
                <p class="alert alert-danger">{{ $errors->first('password') }}</p>
            @endif
            @if ($errors->has('start_date'))
                <p class="alert alert-danger">{{ $errors->first('start_date') }}</p>
            @endif
            @if ($errors->has('number_of_months'))
                <p class="alert alert-danger">{{ $errors->first('number_of_months') }}</p>
            @endif
            @if ($errors->has('the_price_of_registration'))
                <p class="alert alert-danger">{{ $errors->first('the_price_of_registration') }}</p>
            @endif
        </div>
    @endif
    <div class="inputRow">
        <input class="form-control" required value="{{ $user->name }}" type="text" name="name" id="name" placeholder="Name">
    </div>
    <div class="inputRow">
        <input class="form-control" required value="{{ $user->email }}" type="email" name="email" id="email" placeholder="Email">
    </div>
    <div class="inputRow">
        <input class="form-control" required value="{{ $user->phone }}" type="phone" name="phone" id="phone" placeholder="Phone">
    </div>
    <div class="inputRow">
        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
    </div>
    <div class="inputRow">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="basic-addon2">Start Date</span>
            <input type="date" id="start" name="start_date" min="{{Carbon::createFromFormat('Y-m-d H:i:s',  $user->start_date)->format('d-m-y') }}" value="{{Carbon::createFromFormat('Y-m-d H:i:s',  $user->start_date)->format('Y-m-d') }}" class="form-control">
        </div>
    </div>
    <div class="inputRow">
        <input class="form-control" value="{{ $user->number_of_months }}" type="number" name="number_of_months" placeholder="Number of Months">
    </div>
    <div class="inputRow">
        <input class="form-control" value="{{ $user->the_price_of_registration }}" type="number" name="the_price_of_registration" placeholder="Price">
    </div>
    <input type="submit" class="btn btn-primary" value="Edit User">
</form>