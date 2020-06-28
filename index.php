<?php
    // connection to database
    $con = mysqli_connect("localhost", "root", "", "social");

    if (mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    }

    // insert into table test
    $query = mysqli_query($con, "INSERT INTO test VALUES(NULL, 'Gunkar Singh')");
?>

<html>
<head>
  <title>Swirlfeed</title>
</head>
<body>
    Hello Gunkar!
</body>
</html>