<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> PHP </title>
</head>
<body>
<div id="wrapper">
<div id="header">
                    <br>
            <center> <h1> <i> <u> How can we help ? </u> </i> </h1> 
            <form method="POST" action="script.php">
            <input type="text" placeholder="Search with the keyword..." name="search" id="box">
            <button type="submit"> <i class="fa fa-search"> </i> </button> <br> <br>
        <a href="faq.html"> <h3> <i> <u> FAQ's by Categories </u> </i> </h3> </a>
        </center>
    </form>
             </div>
    </div>
    <br>
        <br>
    <?php
    // declaring some variables
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbName = "newproject";
    $Question = "";
    $Answer = "";

    $Search = $_POST["search"];
    
    //Connect to the Server+Select DB
    $con = mysqli_connect($host, $user, $password, $dbName)
    or die("Connection is failed");

    //Search
    //if(isset($_POST['search']))
    // $Question = $_POST['question'];
    $query = "SELECT * FROM `project` WHERE `Question` like '%$Search%'";
    $result = mysqli_query($con, $query) or die (mysqli_error($con));

        $rowcount = mysqli_num_rows($result);

        if ($rowcount < 1){
            echo "<h3> record not found </h3>";
        }


        while ($row = mysqli_fetch_row($result)) {
       echo "<b> Category </b> <br> $row[0] <br> <hr>";
       echo "<b> Question </b> <br> $row[2] <br> <hr>";
       echo "<b> Answer </b> <br> $row[3] <br> <hr> <hr> <br> <br>";
    }


    // //Retrieve All
    // $query = "SELECT * FROM `project`";
    // $result = mysqli_query($con, $query) or die ("query is failed" . mysqli_error($con));
    // echo "<table border='1' >";
    // echo "<tr><th>Name</th><th>City</th><th>Email</th></tr>";
    // while (($row = mysqli_fetch_row($result)) == true) {
    // echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
    // }
    // echo "</table>";

    mysqli_close($con);

    ?>
</body>
</html>