<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify OTP - CHWRA</title>
  <style>
    body {
      background-color: #fdfdf9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 500px;
      margin: 50px auto;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
      padding: 30px 25px;
    }
    h2 {
      text-align: center;
      color: #4CAF50;
      margin-bottom: 20px;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    label {
      font-size: 0.9rem;
      color: #4CAF50;
    }
    input[type="text"] {
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      background-color: #f4f4f4;
    }
    input[type="text"]:focus {
      border-color: #4CAF50;
      outline: none;
      box-shadow: 0 0 4px rgba(76, 175, 80, 0.2);
    }
    .btn-submit {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 6px;
      font-size: 0.95rem;
      cursor: pointer;
      margin-top: 10px;
    }
    .btn-submit:hover {
      background-color: #43a047;
    }
    .resend-link {
      text-align: center;
      margin-top: 15px;
      font-size: 0.85rem;
    }
    .alert {
      background-color: #ffe0e0;
      border: 1px solid #ffcccc;
      color: #c00;
      padding: 8px 10px;
      border-radius: 4px;
      font-size: 0.9rem;
    }
    .success {
      background-color: #e0f7e0;
      border: 1px solid #c8e6c9;
      color: #2e7d32;
      padding: 8px 10px;
      border-radius: 4px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Verify Your OTP</h2>

    @if (session('error'))
      <div class="alert">{{ session('error') }}</div>
    @endif
    @if (session('success'))
      <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('membership.verifyOtp') }}" id="otpForm">
      @csrf
      <input type="hidden" name="email" value="{{ $email }}">


      <label for="otp">6-digit OTP Code</label>
      <input type="text" name="otp" id="otp" maxlength="6" required>

      <button type="submit" class="btn-submit">Verify OTP</button>
    </form>

    <div class="resend-link">
      <label for="resendEmail">Enter your email to resend OTP:</label>
      <!--allo users to modify email during resend 
      <input type="text" id="resendEmail" name="email" placeholder="example@email.com" value="{{ $email ?? '' }}">-->
      <input type="text" id="resendEmail" name="email" readonly value="{{ $email ?? '' }}">

      
      <button class="btn-submit" onclick="resendOtp()">Resend OTP</button>
      <div id="resendFeedback" style="margin-top: 10px;"></div>
    </div>
  </div>

  <script>
    function resendOtp() {
      const emailField = document.getElementById('resendEmail');
      const feedback = document.getElementById('resendFeedback');
      const email = emailField.value.trim();

      feedback.innerHTML = '';
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        feedback.innerHTML = '<div class="alert">Please enter a valid email address.</div>';
        return;
      }

      fetch("{{ route('membership.resendOtp') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": '{{ csrf_token() }}'
        },
        body: JSON.stringify({ email: email })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          feedback.innerHTML = '<div class="success">OTP has been resent successfully.</div>';
        } else {
          feedback.innerHTML = '<div class="alert">' + (data.message || 'Something went wrong.') + '</div>';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        feedback.innerHTML = '<div class="alert">Server error. Please try again later.</div>';
      });
    }
  </script>
</body>
</html>
