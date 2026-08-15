<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>

<body>

<h3>Forgot Password</h3>

@if(session('status'))
    <div>
        {{ session('status') }}
    </div>
@endif


@if($errors->any())
    <div>
        {{ $errors->first() }}
    </div>
@endif


<form method="POST" action="{{ route('password.email') }}">

    @csrf

    <input 
        type="email"
        name="email"
        placeholder="Your Email"
        required
    >

    <button type="submit">
        Send Reset Link
    </button>

</form>


</body>
</html>