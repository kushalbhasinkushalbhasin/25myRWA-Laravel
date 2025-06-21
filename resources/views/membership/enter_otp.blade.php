@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-center">Enter OTP for Membership Verification</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('membership.verifyOtp') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email }}">

        <div class="form-group">
            <label for="otp">One-Time Password (OTP)</label>
            <input type="text" class="form-control" name="otp" maxlength="6" required autofocus>
        </div>

        <button type="submit" class="btn btn-success mt-3">Verify OTP</button>
    </form>

    <form method="POST" action="{{ route('membership.resendOtp') }}" class="mt-3">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <button type="submit" class="btn btn-link">Resend OTP</button>
    </form>
</div>
@endsection
