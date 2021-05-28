<?php
include "connection.php";

//insert the data to table
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $slno=$_POST["slno"];
    $name = $_POST["name"];
    $number = $_POST["phoneno"];
    $sql_qry = "INSERT INTO `phone_book` (`name`, `phoneno`) VALUES ('$name', '$number')";
    $result_qry = mysqli_query($conn, $sql_qry);
    if ($result_qry) {
        echo "Added Successfully";
    } else {
        // echo mysqli_error($conn);
        echo "Sorry!,your entry was not Added succesfully.";
    }
}
//Delete the data
if (isset($_GET['slno'])) {
    // if($_SERVER['REQUEST_METHOD'] == 'GET') {
    // echo ($_GET['slno']);
    $dlt_id = $_GET["slno"];

    $dlt_sql = "DELETE FROM `phone_book` WHERE `phone_book`.`slno` = $dlt_id";
    $dlt_result = mysqli_query($conn, $dlt_sql);

    if ($dlt_result) {
        echo "Record Deleted Successfully";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Contact Book</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="/sandeep/contact/imgg.png" width="40">
        <a class="navbar-brand" href="/sandeep/contact/crud.php">Contact Book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
    </nav>
    <div class="container">
        <h5>Add New Contact</h5>
        <form action="/sandeep/contact/crud.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="phoneno">Phone Number</label>
                <input type="text" class="form-control" id="phoneno" name="phoneno">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form> <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //fetch the data from database
                $slt_sql = "SELECT * FROM `phone_book`";
                $slt_result = mysqli_query($conn, $slt_sql);
                //Display the records / rows returned by sql
                $sl_no=0;
                while ($rows = mysqli_fetch_assoc($slt_result)) {
                    $sl_no+=1;
                    echo "<tr>
                    <th scope='row'>" . $sl_no . "</th>
                    <td>" . $rows['name'] . "</td>
                    <td>" . $rows['phoneno'] . "</td>
                    <td><a href='/sandeep/contact/crud.php?slno= " . $rows['slno'] . "'>Delete</a>
                    <a href='/sandeep/contact/update.php?edit= " . $rows['slno'] . "'>Edit</a></td> 
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>