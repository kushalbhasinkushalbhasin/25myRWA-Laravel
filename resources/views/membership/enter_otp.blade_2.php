<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP - CHWRA Membership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- External CSS --}}
    <link href="{{ asset('assets/css/membership.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5 mb-5" style="max-width: 480px;">
    <div class="card shadow border-0">
        <div class="card-header text-center">
            <h5 class="mb-0">Verify Your OTP</h5>
        </div>

        <div class="card-body p-4">
            @if (session('error'))
                <div class="alert alert-danger small">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('membership.verifyOtp') }}" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="form-floating mb-3">
                    <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP" maxlength="6" required autofocus>
                    <label for="otp">6-digit OTP Code</label>
                </div>

                <button type="submit" class="submit-button">Verify OTP</button>
            </form>

            <form method="POST" action="{{ route('membership.resendOtp') }}" class="text-center mt-3">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <button type="submit" class="btn btn-link p-0 small">Didn't receive OTP? Resend</button>
            </form>
        </div>
    </div>
</div>

<script>
(() => {
    'use strict';
    const form = document.querySelector('.needs-validation');
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
})();
</script>
</body>
</html>
