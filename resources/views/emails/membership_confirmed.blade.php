
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      background-color: #fdfdf9;
      padding: 10px;
    }
    .content {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 6px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    h2 {
      font-size: 1.3rem;
      color: #4CAF50;
    }
    p {
      font-size: 1rem;
      line-height: 1.4;
    }
    .link {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      font-size: 1rem;
    }
    .link:hover {
      background-color: #43a047;
    }
  </style>
</head>
<body>
  <div class="content">
    <h2>🎉 Welcome to CHWRA!</h2>
    <p>Dear {{ $user->name }},</p>
    <p>Your email has been successfully verified and your membership has been registered.</p>
    <p>To complete the process, please click below to pay your membership fee:</p>
    <a href="{{ route('membership.payment') }}" class="link">Pay Membership Fee</a>
  </div>
</body>
</html>
