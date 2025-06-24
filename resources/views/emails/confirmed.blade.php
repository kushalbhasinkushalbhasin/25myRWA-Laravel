
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Membership Confirmed</title>
  <style>
    body {
      background-color: #fdfdf9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 30px;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    h2 {
      color: #4CAF50;
      margin-bottom: 20px;
    }
    p {
      color: #333;
      font-size: 1rem;
    }
    .pay-link {
      margin-top: 20px;
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
    }
    .pay-link:hover {
      background-color: #43a047;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🎉 Membership Confirmed!</h2>
    <p>Your email has been verified and your membership is successfully registered.</p>
    <p>Please click the link below to pay your membership fee:</p>
    <a href="{{ route('membership.payment') }}" class="pay-link">Pay Membership Fee</a>
  </div>
</body>
</html>
