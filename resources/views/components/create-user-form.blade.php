<form action="{{ route('users.add') }}" class=" createForm" method="POST">
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
            @if ($errors->has('role'))
                <p class="alert alert-danger">{{ $errors->first('role') }}</p>
            @endif
            @if ($errors->has('gender'))
                <p class="alert alert-danger">{{ $errors->first('gender') }}</p>
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
        <input required type="text" name="name" id="name" placeholder="Name" class="form-control">
    </div>
    <div class="inputRow">
        <input required type="email" name="email" id="email" placeholder="Email" class="form-control">
    </div>
    <div class="inputRow">
        <input required type="phone" name="phone" id="phone" placeholder="Phone" class="form-control">
    </div>
    <div class="inputRow">
        <input required type="password" name="password" id="password" placeholder="Password" class="form-control">
    </div>
    <div class="inputRow">
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <div class="inputRow">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="basic-addon2">Start Date</span>
            <input type="date" id="start" name="start_date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d')}}" class="form-control">
        </div>
    </div>
    <div class="inputRow">
        <input type="number" name="number_of_months" placeholder="Number of Months" class="form-control">
    </div>
    <div class="inputRow">
        <input type="number" name="the_price_of_registration" placeholder="Price" class="form-control">
    </div>
    <input type="submit" class="btn btn-primary" value="Create User">
</form>