<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="{{ route('post_register') }}">
    {!! csrf_field() !!}

    <div>
        Last name
        <input type="text" name="lastname" value="{{ old('lastname') }}">
    </div>
    
    <div>
        First name
        <input type="text" name="firstname" value="{{ old('firstname') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>