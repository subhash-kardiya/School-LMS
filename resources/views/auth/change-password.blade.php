<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - School LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div
                class="col-lg-6 vh-responsive-50 d-flex flex-column justify-content-center align-items-center left-side">
                <h2 class="fw-bold text-center text-white w-100 fs-1">New Password</h2>
                <p class="text-center text-white mb-lg-5">Create a strong password to secure your account.</p>
                <img src="{{ asset('assets/undraw_education_3vwh.svg') }}" alt="Security Illustration" class="img-fluid"
                    style="max-height: 250px;">
            </div>

            <div
                class="col-lg-6 vh-responsive-50 bg-light d-flex flex-column justify-content-center align-items-center">
                <h2 class="text-center mb-4 forgot-txt">Set Password</h2>

                <form action="{{ route('change.password.post') }}" method="POST">
                    @csrf
                    <input type="password" name="password" placeholder="New Password" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <button type="submit">Update Password</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
