<?php

// database connection
include('./db_connect.php');

if (isset($_POST["submit"])) {
    $sid = $_POST["sid"];
    $sname = $_POST["sname"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $phone = $_POST["phone"];
    $pass = $_POST["password"];

    $sql = "INSERT INTO student (sid, sname, course, syear, phone, pass) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiss", $sid, $sname, $course, $year, $phone, $pass);
    if ($stmt->execute()) {
        // echo "<script>alert('Record inserted successfully');</script>";
        sleep(1);
        header("location: ./students.php?sid=$sid");
    } else {
        echo "<script>alert('error occurred');</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Record Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Student Attendance System</h1>
        <h3>Student Record Form</h3>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="sid" name="sid" autocomplete="off" title="src/01" required>
                <label>Id</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="sname" name="sname" autocomplete="off" required>
                <label>Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="course" name="course" autocomplete="off" required>
                <label>Course</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" min="1" max="4" class="form-control" id="floatingInput" placeholder="year" name="year" autocomplete="off" required>
                <label>Year</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="phone" name="phone" autocomplete="off" required>
                <label>Phone</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" autocomplete="off" required>
                <label>Password</label>
            </div>
            <div class="form-floating my-2">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
        <button type="submit" class="btn btn-outline-warning" name="view">
            <a href="./students.php?sid=" class="text-decoration-none text-black">View Records</a>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>