<!DOCTYPE html>
<html>

<body>
    <h2>Password Reset OTP</h2>
    <p>Your OTP is:</p>
    <h1>{{ $otp }}</h1>
    <p>This OTP is valid for 5 minutes.</p>

    <form action="{{ route('verify.otp') }}" method="POST">
        @csrf
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <button type="submit">Verify OTP</button>
    </form>

</body>

</html>