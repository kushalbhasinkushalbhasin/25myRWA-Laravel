<!DOCTYPE html>
<html>
<head>
    <title>New Contact Submission</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
    
    @if(isset($data['newsletter']) && $data['newsletter'])
    <p><em>User opted in to newsletter</em></p>
    @endif
    
    <p>Received at: {{ now()->format('Y-m-d H:i:s') }}</p>
</body>
</html>