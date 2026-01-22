<!DOCTYPE html>
<html>

<head>
    <title>School LMS Login</title>

    {{-- 1️⃣ CSS Link --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>

        {{-- 2️⃣ Image Add --}}
        <div class="login-image">
            <img src="{{ asset('assets/undraw_education_3vwh.svg') }}" alt="Education Illustration">
        </div>

        {{-- Error Message --}}
        @if ($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf


            <input type="email" name="email" placeholder="Email" required><br><br>

            <input type="password" name="password" placeholder="Password" required><br><br>

            <button type="submit">Login</button>
        </form>
    </div>

    {{-- 3️⃣ JS Link --}}
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>