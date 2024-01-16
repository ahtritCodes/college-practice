<?php

// database connection
include('./db_connect.php');

// fetch data of the given sid
$sid = $_REQUEST['sid'];

$sql = "SELECT * FROM student WHERE sid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $sid);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

// get individual data
$sid = $data['sid'];
$sname = $data['sname'];
$course = $data['course'];
$syear = $data['syear'];
$phone = $data['phone'];


if (isset($_POST["submit"])) {
    $sid = $_POST["sid"];
    $sname = $_POST["sname"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $phone = $_POST["phone"];

    $sql = "UPDATE student SET sname=?, course=?, syear=?, phone=? WHERE sid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $sname, $course, $year, $phone, $sid);
    if ($stmt->execute()) {
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
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Student Attendance System</h1>
        <h3>Update Student Records</h3>
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="sid" name="sid" autocomplete="off" value=<?php echo $sid; ?> readonly>
                <label>Id</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="sname" name="sname" autocomplete="off" value=<?php echo $sname; ?>>
                <label>Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="course" name="course" autocomplete="off" value=<?php echo $course; ?>>
                <label>Course</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" min="1" max="4" class="form-control" id="floatingInput" placeholder="year" name="year" autocomplete="off" value=<?php echo $syear; ?>>
                <label>Year</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="phone" name="phone" autocomplete="off" value=<?php echo $phone; ?>>
                <label>Phone</label>
            </div>
            <div class="form-floating my-2">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
        </form>
        <button class="btn btn-outline-info">
            <a class="text-decoration-none text-black" href="./students.php?sid=<?php echo $sid; ?>">Go Back</a>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>