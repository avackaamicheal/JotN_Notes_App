<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Team</h1>
    <form method="POST">
    @csrf
    <label for="team_name">Team name:</label>
    <input type="text" name="team_name" placeholder="Team name" required>
    <label for="team_desc">Team description:</label>
    <input type="text" name="team_desc" placeholder="Brief description" required>
    <button type="submit">Create Team</button>
</form>
</body>
</html>
