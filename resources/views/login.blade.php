<!DOCTYPE html>
<html>

<head>
    <title>School LMS Login</title>
</head>

<body>

    <h2>Login</h2>

    @if ($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>

</body>

</html>
