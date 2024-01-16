<?php
include './db_connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container p-2">
        <h1 class="text-center mt-4">Query Report</h1>
        <div class="container-fluid my-4">
            <div class="query my-3">
                <div class="fs-4"><b>Problem Statement:</b> <br>SQl query that prints details of students (name, course, year, subject, date of class) of "B.A." course with subjects "ENGLISH" and "ECONOMICS"</div>
            </div>
            <div class="solution">
                <div class="fs-4"><b>Result:</b> <br>
                    <table class="my-4 table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">Year</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Date of class</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = <<<QUERY
                                        SELECT s.sname AS Name,
                                        s.course AS Course,
                                        s.syear AS Year,
                                        a.subject AS Subject,
                                        a.date_of_class as "Date of class"
                                        FROM student s
                                        JOIN attendance a on s.sid = a.sid
                                        WHERE s.course LIKE 'B.A%'
                                        AND a.subject in ('ENGLISH', 'ECONOMICS');
                                        QUERY;

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ['Name'=>$name, 'Course'=>$course, 'Year'=>$year, 'Subject'=>$subject, 'Date of class'=>$date] = $row;
                                        echo <<<DATA
                                            <tr>
                                                <td>$name</td>
                                                <td>$course</td>
                                                <td>$year</td>
                                                <td>$subject</td>
                                                <td>$date</td>
                                            </tr>
                                        DATA;
                                    }
                                } else {
                                echo <<<NODATA
                                    <tr>
                                        <td colspan='5' class='text-center'>No data found</td>
                                    </tr>
                                    NODATA;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>