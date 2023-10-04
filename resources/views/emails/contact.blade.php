<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailData['title'] }}</title>
</head>
<body>
<h1>{{ $mailData['title'] }}</h1>
<button><a
        href="{{env('EMAIL_VERIFICATION_BASE_URL')}}/email_verification/{{$mailData['user_id']}}/{{$mailData['verify_token']}}">Click
        Here To Verify Email</a>
</button>
</body>
</html>
