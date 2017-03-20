<!DOCTYPE html>
<html lang="sv">
<head>
    <title> Login Page </title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="admin/css/login.css">
    
</head>
<body>
    <form action="authorize.php" method="post">
   <p>
        <label> Username: </label>
        <input type="text" id="username" name="username" />
    </p>
    <p>
        <label> Password: </label>
        <input type="password" id="password" name="password" />
    </p>
    <p>
        <input type="submit" id="button" value="Login" />
    </p>
</form>
</body>
</html>


