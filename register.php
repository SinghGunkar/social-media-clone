<html>
<head>
    <title>Welcome to Swirlfeed</title>
</head>
<body>

    <!-- action is the page that the data from this form will be sent to -->
    <form action="register.php">
        <input type="text" name="reg_fname" placeholder="First Name" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required>
        <br>
        <input type="email" name="reg_email" placeholder="Email" required>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <input type="submit" name="reg_button" value="Register">
    </form>



</body>
</html>