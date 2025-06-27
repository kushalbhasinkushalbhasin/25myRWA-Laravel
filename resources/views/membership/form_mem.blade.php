<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CHWRA Membership Enrolment</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-color: #fdfdf9;
        }
        label, .form-check-label, .form-text {
            color: #4CAF50;
            font-weight: 400 !important;
        }
        .form-control, .form-select {
            background-color: #f4f4f4;
            border: 1px solid #ccc;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.15);
        }
        .form-floating > label {
            color: #4CAF50;
            font-weight: 400;
        }
        .submit-button {
            background-color: #4CAF50;
            color: white;
            font-size: 0.9rem;
            width: fit-content;
            padding: 8px 24px;
            margin: 20px auto 0 auto;
            display: block;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>

@if(session('show_payment'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll to top to ensure visibility
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    
    // Optional: Auto-hide after 1 minute
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) alert.style.display = 'none';
    }, 60000);
});
</script>
@endif


<body>

{{-- Payment Link Banner --}}
@if(session('show_payment'))
<div class="alert alert-success alert-dismissible fade show sticky-top" role="alert" style="z-index: 9999;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-check-circle me-2"></i>
                <strong>Membership request submitted!</strong> Please complete with the payment of annual membership fees of GBP 3 only. 
                Please enter your email ID, Name and House details as here on to the stripe link</div>
            <div>
                <a href="{{ session('payment_url') }}" class="btn btn-sm btn-primary me-2">
                    <i class="fas fa-credit-card me-1"></i> Pay Now (£3)
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endif


<div class="container mt-5 mb-5" style="max-width: 720px;">
    
    @if (session('success'))
        <div class="success" style="background-color: #e0f7e0; border: 1px solid #c8e6c9; color: #2e7d32; padding: 10px; margin-bottom: 15px; border-radius: 6px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header text-white text-center" style="background-color: #4CAF50;">
            <h4 class="mb-0">CHWRA Membership Enrolment</h4>
        </div>

        <div class="card-body p-4">

            @if ($errors->any()))
                <div class="alert alert-danger">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('membership.submit') }}" id="membershipForm" novalidate>
                @csrf

                <div class="col-md-5">
                    <div class="text-center fs-6 fw-normal text-black">Annual Membership GBP 3</div>
                </div>

                {{-- Title + First Name --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select" name="title" id="title" required>
                                <option value="">Select</option>
                                @foreach(['Mr', 'Mrs', 'Miss', 'Ms', 'Other'] as $title)
                                    <option value="{{ $title }}" {{ old('title') == $title ? 'selected' : '' }}>{{ $title }}</option>
                                @endforeach
                            </select>
                            <label for="title">Title</label>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required maxlength="50">
                            <label for="first_name">First Name</label>
                        </div>
                    </div>
                </div>

                {{-- Last Name --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required maxlength="50">
                    <label for="last_name">Last Name</label>
                </div>

                {{-- House No. + Street --}}
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="house_no" name="house_no" placeholder="House No" value="{{ old('house_no') }}" required maxlength="10">
                            <label for="house_no">House No.</label>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="street" name="street" placeholder="Street Name" value="{{ old('street') }}" required>
                            <label for="street">Street Name</label>
                        </div>
                    </div>
                </div>

                {{-- Line 3 --}}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="line3" name="line3" placeholder="Line 3" value="{{ old('line3') }}" maxlength="100">
                    <label for="line3">Line 3 (optional)</label>
                </div>

                {{-- City + Post Code --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="city" name="city" value="London" readonly placeholder="City">
                            <label for="city">City</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="post_code" name="post_code" placeholder="Post Code" value="{{ old('post_code') }}" required maxlength="8">
                            <label for="post_code">Post Code</label>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                    <label for="email">Email Address</label>
                </div>

                {{-- Meeting Attendance Toggle --}}
                <div class="form-check form-switch mt-4 mb-3">
                    <input class="form-check-input" type="checkbox" name="meeting_attendance" id="meeting_attendance" value="able" checked>
                    <label class="form-check-label" for="meeting_attendance">
                        I will be able to attend the meeting on 28th
                    </label>
                </div>

                {{-- Terms and Policies --}}
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required 
                    style="
                        width: 1.2em;
                        height: 1.2em;
                        border: 3px solid #000 !important;
                        border-radius: 0.25em;
                        cursor: pointer;
                        appearance: none;
                        -webkit-appearance: none;
                        margin-top: 0.2em;
                    "
                    onchange="this.style.backgroundColor = this.checked ? '#000' : ''"
                    >
                    <label class="form-check-label small" for="terms">
                    Yes I would like to join the association. 
                        <!--By submitting this form, you agree to our-->
                        <!--<a href="/terms" target="_blank">Terms & Conditions</a>,-->
                        <!--<a href="/privacy" target="_blank">Privacy Policy</a>, and-->
                        <!--<a href="/cookies" target="_blank">Cookie Policy</a>.-->
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="submit-button">Submit </button>
            <!--and Receive OTP-->
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('membershipForm').addEventListener('submit', function(e) {
    const postCode = document.getElementById('post_code').value.trim();
    const postCodePattern = /^[A-Za-z0-9 ]{6,8}$/;

    let error = '';

    if (!postCodePattern.test(postCode)) {
        error += 'Invalid postcode. Must be 6–8 alphanumeric characters.\n';
    }

    if (error) {
        alert(error);
        e.preventDefault();
    }
});
</script>

</body>
</html>