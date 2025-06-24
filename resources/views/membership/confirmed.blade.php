
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Membership Confirmed</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background-color: #fdfdf9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 100%;
      width: 100%;
      max-width: 600px;
      margin: auto;
      background-color: #fff;
      padding: 25px 20px;
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    h2 {
      color: #4CAF50;
      margin-bottom: 15px;
      font-size: 1.5rem;
    }
    p {
      color: #333;
      font-size: 1rem;
      margin-bottom: 12px;
    }
    .pay-link {
      display: inline-block;
      margin-top: 15px;
      padding: 12px 18px;
      background-color: #4CAF50;
      color: #fff;
      border-radius: 6px;
      text-decoration: none;
      font-size: 1rem;
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
    <p>Please click below to pay your membership fee:</p>
    <a href="{{ route('membership.payment') }}" class="pay-link">Pay Membership Fee</a>
  </div>
</body>
</html>
