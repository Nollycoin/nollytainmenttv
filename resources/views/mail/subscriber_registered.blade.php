<!doctype>
<html>
<head></head>
<body>
<div>
    <p>Welcome, {{ $user->name }}</p>
    <p>Your Subscriber account with NollyTV has been created.</p>
    <p>Below are your login details</p>

    <p>Email Address: {{ $user->email }}</p>
    <p>Password: {{ $password }}</p>
</div>
</body>
</html>