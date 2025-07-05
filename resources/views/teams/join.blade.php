<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Join Team</h1>
    <form method="POST" action="{{ route('teams.join') }}">
    @csrf
    <label for="">Enter your invite code:</label>
    <input type="text" name="invite_code" placeholder="Enter Invite Code" required>
    <button type="submit">Join Team</button>
</form>
</body>
</html>
