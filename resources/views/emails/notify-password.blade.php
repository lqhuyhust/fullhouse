<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullhouse - Account Information Notification</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>Congration to you to be an member of Fullhouse administrators team</p>
    <p>You can login with the following credential information:</p>
    <p>email: {{$details['email']}}</p>
    <p>password: {{$details['password']}}</p>
    <p>You should access this link to change your password {{$details['url']}}</p>
    <p>Thank you!</p>
</body>
</html>