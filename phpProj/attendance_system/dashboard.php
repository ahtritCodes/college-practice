<?php
include('./db_connect.php');
$sid = $_REQUEST['sid'];
$sname = $_REQUEST['sname'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="./dashboard.php">Dashboard</a>
            <ul class="d-flex w-50 m-auto" style="list-style-type: none;">
                <li class="mx-3"><a class="text-decoration-none text-black fs-5" href="./home.php">Add</a></li>
                <li class="mx-3"><a class="text-decoration-none text-black fs-5" href="./students.php?sid=<?php echo $sid; ?>">View</a></li>
                <li class="mx-3"><a class="text-decoration-none text-black fs-5" href="./update.php?sid=<?php echo $sid; ?>">Update</a></li>
                <li class="mx-3"><a class="text-decoration-none text-black fs-5" href="./delete.php?sid=<?php echo $sid; ?>">Delete</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="mt-4">
            <h1 class="text-center">Welcome, <?php echo $sname; ?></h1>
        </div>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Student Id</th>
                        <th scope="col">Faculty</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Date of class</th>
                        <th scope="col">No of class</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT f.fname as fname, a.sid as sid, a.subject as subject, a.date_of_class as date_of_class, a.no_of_class as no_of_class FROM attendance a JOIN faculty f ON a.fid = f.fid WHERE sid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $sid);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $fname = $row['fname'];
                            $sid = $row['sid'];
                            $subject = $row['subject'];
                            $date_of_class = $row['date_of_class'];
                            $no_of_class = $row['no_of_class'];

                            echo <<<DATA
                                <tr>
                                    <td>$sid</td>
                                    <td>$fname</td>
                                    <td>$subject</td>
                                    <td>$date_of_class</td>
                                    <td>$no_of_class</td>
                                </tr>
                            DATA;
                        }
                    } else {
                        echo <<<NODATA
                            <tr>
                                <td colspan='5' class='text-center'>No data found for required student id</td>
                            </tr>
                        NODATA;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="container my-4">
            <button class="btn btn-outline-warning">
                <a href="./report.php" class="text-decoration-none text-black">Query Report</a>
            </button>
            <button class="btn btn-outline-info">
                <a href="./faculty.php" class="text-decoration-none text-black">Faculty Records</a>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>