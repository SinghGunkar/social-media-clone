<?php
    // connection to database
    $con = mysqli_connect("localhost", "root", "", "social");

    if (mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    }

    // Declare variables to prevent errors
    $fname       = "";  // first name                                   
    $lname       = "";  // lastname
    $em          = "";  // email
    $em2         = "";  // email confirmation
    $password    = "";  // password
    $password2   = "";  // password confirmation
    $date        = "";  // sign up date
    $error_array = "";  // holds error messages

    // $_POST variable is an array of variable names and values sent by the HTTP POST method.
    if (isset($_POST['register_button'])) {

        // First name
        $fname = strip_tags($_POST['reg_fname']);   // Remove html tag
        $fname = str_replace(' ', '', $fname);      // Remove spaces
        $fname = ucfirst(strtolower($fname));       // Uppercase first letter

        // Last name
        $lname = strip_tags($_POST['reg_lname']);   // Remove html tag
        $lname = str_replace(' ', '', $lname);      // Remove spaces
        $lname = ucfirst(strtolower($lname));       // Uppercase first letter

        // Email 
        $em = strip_tags($_POST['reg_email']);      // Remove html tag
        $em = str_replace(' ', '', $em);            // Remove spaces
        $em = ucfirst(strtolower($em));             // Uppercase first letter

        // Email confirmation
        $em2 = strip_tags($_POST['reg_email2']);    // Remove html tag
        $em2 = str_replace(' ', '', $em2);          // Remove spaces
        $em2 = ucfirst(strtolower($em2));           // Uppercase first letter

        // Password
        $password = strip_tags($_POST['reg_password']);  // Remove html tag

        // Password2
        $password2 = strip_tags($_POST['reg_password2']);  // Remove html tag

        // Date
        $date = date("Y-m-d");  // Current date

        if ($em == $em2) {
            // Check is email is in valid format
            if (filter_var($em, FILTER_VALIDATE_EMAIL)) {

                $em = filter_var($em, FILTER_VALIDATE_EMAIL);

                // Check if email already exists
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

                // Count the number of rows returned
                $num_rows = mysqli_num_rows($e_check);

                if ($num_rows > 0) {
                    echo "Email already in use";
                }

            } 
            else {
                echo "Invalid format"; 
            }
        } 
        else {
            echo "Emails don't match";
        }

        // Validation
        if (strlen($fname) > 25 || strlen($fname) < 2) {
            echo "Your first name must be between 2 and 25 characters";
        }

        if (strlen($lname) > 25 || strlen($lname) < 2) {
            echo "Your last name must be between 2 and 25 characters";
        }

        if ($password != $password2) {
            echo "Your passwords do not match";
        }

        else {
            if (preg_match('/[^A-Za-z0-9]/', $password)) {
                echo "Your password can only contain english characters or numbers";
            }
        }

        if (strlen($password > 30 || strlen($password) < 5)) {
            echo "Your password must be between 5 and 30 characters";
        }
    }
?>

<html>
<head>
    <title>Swirlfeed</title>
</head>
<body>

    <!-- action is the page that the data from this form will be sent to -->
    <form action="register.php" method="POST">
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
        <input type="submit" name="register_button" value="Register">
    </form>



</body>
</html>