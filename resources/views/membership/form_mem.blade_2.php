@extends('layouts.app')
@section('content')
<link href="{{ asset('assets/css/membership.css') }}" rel="stylesheet">
<div class="container mt-5 mb-5" style="max-width: 720px;">
    <div class="card shadow border-0">
        <div class="card-header text-center">
            <h5 class="mb-0">CHWRA Membership Enrolment Form</h5>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('membership.submit') }}" class="needs-validation" novalidate>
                @csrf

                <div class="row g-3">
                    <div class="col-md-6 form-floating">
                        <select name="title" id="title" class="form-select" required>
                            <option value="">Select</option>
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Ms</option>
                            <option>Dr</option>
                            <option>Other</option>
                        </select>
                        <label for="title">Title</label>
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                        <label for="first_name">First Name</label>
                    </div>

                    <div class="col-md-12 form-floating">
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                        <label for="last_name">Last Name</label>
                    </div>

                    <div class="col-md-4 form-floating">
                        <input type="text" name="house_no" id="house_no" class="form-control" maxlength="6" placeholder="House No." required>
                        <label for="house_no">House No.</label>
                    </div>

                    <div class="col-md-8 form-floating">
                        <select class="form-select" name="street_id" id="street_id" required>
                            <option value="">-- Select Street --</option>
                            @foreach($streets as $street)
                                <option value="{{ $street->id }}">{{ $street->name }}</option>
                            @endforeach
                        </select>
                        <label for="street_id">Street</label>
                    </div>

                    <div class="col-md-12 form-floating">
                        <input type="text" name="line3" id="line3" class="form-control" placeholder="Line 3 (optional)">
                        <label for="line3">Line 3 (optional)</label>
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="text" name="city" id="city" class="form-control" value="London" readonly>
                        <label for="city">City</label>
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="text" name="post_code" id="post_code" class="form-control" placeholder="Post Code" maxlength="8" required>
                        <label for="post_code">Post Code</label>
                    </div>

                    <div class="col-md-12 form-floating">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="col-md-12 form-floating">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" maxlength="15" required>
                        <label for="mobile">Mobile (+44...)</label>
                    </div>

                    <div class="col-md-12 form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" name="meeting_attendance" id="meeting_attendance">
                        <label class="form-check-label" for="meeting_attendance">I will be able to attend the meeting on 28th</label>
                    </div>

                    <div class="col-md-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                        <label class="form-check-label" for="terms">
                            By submitting this form, you agree to our <a href="#">Terms & Conditions</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookie Policy</a>.
                        </label>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="submit-button">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
