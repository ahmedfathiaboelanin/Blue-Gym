<form action="{{ route('admins.add') }}" class=" createForm" method="POST">
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
        </div>
    @endif
    <div class="inputRow">
        <input class="form-control" required type="text" name="name" id="name" placeholder="Name">
    </div>
    <div class="inputRow">
        <input class="form-control" required type="email" name="email" id="email" placeholder="Email">
    </div>
    <div class="inputRow">
        <input class="form-control" required type="phone" name="phone" id="phone" placeholder="Phone">
    </div>
    <div class="inputRow">
        <input class="form-control" required type="password" name="password" id="password" placeholder="Password">
    </div>
    {{-- <div class="inputRow">

    </div> --}}
    <div class="inputRow">
        <select name="role">
            <option value="men_admin">Men Admin</option>
            <option value="girls_admin">Girls Admin</option>
            <option value="super_admin">Super Admin</option>
        </select>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Create Admin">
</form>