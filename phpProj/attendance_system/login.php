<?php
include('./db_connect.php');

if (isset($_POST['login'])) {
    $inp_sid = $_POST['sid'];
    $inp_pass = $_POST['pass'];

    $sql = "SELECT sid, pass, sname FROM student WHERE sid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $inp_sid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_all();
        $sid = $data[0][0];
        $spass = $data[0][1];
        $sname = $data[0][2];
        if ($spass == $inp_pass) {
            // redirect
            echo "<script>alert('login successfull..');</script>";
            echo "<script>window.open('./dashboard.php?sid=$inp_sid&sname=$sname', '_self');</script>";
        } else {
            // wrong password
            echo "<script>alert('incorrect password..');</script>";
        }
    } else {
        // student id doesn't exist
        echo "<script>alert('student id donot exist..');</script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container p-2 d-flex flex-column justify-content-center">
        <div>
            <h1 class="text-center mt-4 fw-bold">STUDENT ATTENDANCE SYSTEM</h1>
        </div>
        <div class="w-75 m-auto my-4 border border-dark border-2 rounded p-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Student Id</label>
                    <input type="text" class="form-control" name="sid" placeholder="src/xx">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-4" name="login">Login</button>
            </form>
        </div>
    </div>
    <div class="container-fluid text-center">
        <button class="btn btn-warning fs-6 fw-bold">
            <a href="./home.php" class="text-decoration-none text-black">Add Student</a>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>