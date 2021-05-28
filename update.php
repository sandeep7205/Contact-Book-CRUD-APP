<?php
include "connection.php";

//insert the data to table
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $slno=$_POST["slno"];
    $edit_id = $_GET['edit'];
    $e_name = $_POST["name"];
    $e_number = $_POST["phoneno"];
    $sql_qry = "UPDATE `phone_book` SET `name`='$e_name',`phoneno`='$e_number' WHERE `slno`='$edit_id'";
    $result_qry = mysqli_query($conn, $sql_qry);
    if ($result_qry) {
        header("location:crud.php");
        // echo "Update Successfully";
    } else {
        // echo mysqli_error($conn);
        echo "Sorry!,your entry was not Update succesfully.";
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
    </nav>
    <div class="container">
        <h5>Update Contact</h5>
        <?php
        if (isset($_GET['edit'])) {
            // echo ($_GET['edit']);
            $edit_id = $_GET['edit'];
            $slt_sql = "SELECT * FROM `phone_book` WHERE `slno`= '$edit_id'";
            $slt_result = mysqli_query($conn, $slt_sql);
            $rows = mysqli_fetch_assoc($slt_result);
            // echo $nm = $rows['name'], $ph = $rows['phoneno'];
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $rows['name']; ?>">
            </div>
            <div class="form-group">
                <label for="phoneno">Phone Number</label>
                <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?php echo $rows['phoneno']; ?>">
            </div>
            <button type=" submit" class="btn btn-primary" name="update">Update</button>
        </form> <br>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>