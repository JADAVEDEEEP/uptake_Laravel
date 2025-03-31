<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <h2>Hello,</h2>
    <p>Your OTP code for password reset is:</p>
    <h1 style="color: blue;">{{ $otp }}</h1>
    <p>This OTP is valid for 10 minutes.</p>
    <p>If you didn't request this, please ignore this email.</p>
    <br>
    <p>Regards,<br> {{ config('app.name') }}</p>
</body>
</html>
