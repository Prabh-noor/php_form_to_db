<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserting to database</title>
    <link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" class="payment">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "my_db");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        // Taking all values from the form data(input)
        $name =  $_REQUEST['name'];
        $card_num = $_REQUEST['card-num'];
        $cvv = $_REQUEST['cvv'];
        $expiry = $_REQUEST['expiry'];

        $sql = "INSERT INTO cardholders  VALUES ('$name', '$card_num', '$cvv', '$expiry')";
        if (mysqli_query($conn, $sql)) {
            echo "<h1>Amount paid successfully!</h1>";
        } else {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
        }

        setcookie('num', $card_num, time() + 3600, "/");
        echo "<h3>Cookies are set</h3>";
        echo "Card no: ", $_COOKIE['num'], "<br><br><br>";


        mysqli_close($conn);
        ?>
    </div>


</body>

</html>