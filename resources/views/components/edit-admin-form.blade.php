<form action="{{ route($route, $user->id) }}" class=" createForm" method="POST">
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
        <input required value="{{ $user->name }}" type="text" name="name" id="name" placeholder="Name">
        <input required value="{{ $user->email }}" type="email" name="email" id="email" placeholder="Email">
    </div>
    <div class="inputRow">
        <input required value="{{ $user->phone }}" type="phone" name="phone" id="phone" placeholder="Phone">
        <input type="password" name="password" id="password" placeholder="Password">
    </div>
    @if($user->role !== 'user')
        <div class="inputRow">
            <select name="role">
                <option value="men_admin" {{ $user->role == 'men_admin' ? 'selected' : '' }}>Men Admin</option>
                <option value="girls_admin" {{ $user->role == 'girls_admin' ? 'selected' : '' }}>Girls Admin</option>
                <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
            </select>
        </div>
    @endif

    <input type="submit" class="btn btn-primary" value="Update">
</form>