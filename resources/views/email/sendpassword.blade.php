<!DOCTYPE html>
<html>
<head>
    <title>Student’s Feedback Evaluation</title>
</head>
<body>

    <h1>Dear ! {{$reply['name']}}</h1>

	Welcome to Student’s Feedback Evaluation . Your password reset link is: {{route('password_change',[$reply['type'],$reply['token']])}}



    




    <p>Thank you</p>
</body>
</html>