<?php
include('./db_connect.php');

if (isset($_POST['search'])) {
    if ($_POST['stu_id'] != null) {
        $sid = $_POST['stu_id'];
    } else {
        $sid = null;
    }
} else {
    $sid = $_REQUEST['sid'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container m-4">
        <button class="btn btn-warning fs-6 fw-bold">
            <a href="./home.php" class="text-decoration-none text-black">Add Student</a>
        </button>
        <form action="" method="post">
            <div class="w-50 d-flex flex-row justify-content-center align-items-center mt-3">
                <input type="text" class="form-control" name="stu_id" placeholder="search student id">
                <button type="submit" class="btn btn-primary mx-4" name="search">Search</button>
            </div>
        </form>
        <div class="my-5">
            <h2 class="text-center text-decoration-underline">Student Records</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Year</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if ($sid == null) {
                        $result = $conn->query("SELECT * FROM student LIMIT 21 OFFSET 20");
                    } else {
                        $sql = "SELECT sid, sname, course, syear, phone FROM student WHERE sid = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $sid);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['sid'];
                            $name = $row['sname'];
                            $course = $row['course'];
                            $year = $row['syear'];
                            $phone = $row['phone'];

                            echo <<<DATA
                                <tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$course</td>
                                    <td>$year</td>
                                    <td>$phone</td>
                                    <td>
                                        <button class="btn btn-outline-info"><a class="text-decoration-none text-dark" href="./update.php?sid=$id">Update</a></button>
                                        <button class="btn btn-outline-danger"><a class="text-decoration-none text-dark" href="./delete.php?sid=$id">Delete</a></button>
                                    </td>
                                </tr>
                            DATA;
                        }
                    } else {
                        echo <<<NODATA
                            <tr>
                                <td colspan='6' class='text-center'>No data found for required student id</td>
                            </tr>
                        NODATA;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>