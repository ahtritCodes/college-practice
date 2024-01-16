<?php
include('./db_connect.php');
include('./filterData.php');
include('./showFaculties.php');

$paginationFlag = 1;
$recordsPerPage = 10;

$current_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;

$offset = ($current_page - 1) * $recordsPerPage;

$totalRecordsQuery = "SELECT COUNT(*) as total FROM faculty";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);

// get all the degrees
$sql = "SELECT DISTINCT degree FROM faculty";
$result = $conn->query($sql);
$degrees = $result->fetch_all();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Attendance System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-2 p-2">
        <h3 class="">Filter</h3>
        <form action="" method="post" class="form">
            <div class="d-flex w-50 mb-2">
                <select class="form-select" name="degree">
                    <option selected>Select Degree</option>
                    <?php
                    foreach ($degrees as $value) {
                        echo <<<OPTION
                    <option value="$value[0]">$value[0]</option>
                    OPTION;
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-success mx-3" name="apply">Apply</button>
            </div>
            <div class="d-flex w-50">
                <?php
                if (isset($_POST['asc'])) {
                    echo <<<BTN
                        <button type="submit" class="btn btn-outline-warning text-black mx-3" name="desc">Sort Descending</button>
                    BTN;
                } else {
                    echo <<<BTN
                        <button type="submit" class="btn btn-outline-warning text-black mx-3" name="asc">Sort Ascending</button>
                    BTN;
                }
                ?>

            </div>
        </form>
        <div class="my-5">
            <h2 class="text-center text-decoration-underline">Faculty Records</h2>
            <table class="table my-4">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Degree</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($_POST['apply'])) {
                        $degree = $_POST['degree'];
                        filterData($degree);
                        $paginationFlag = 0;
                    } else {
                        if (isset($_POST['asc'])) {
                            $order = "asc";
                            showFacultiesSorted($recordsPerPage, $offset, $order);
                        } else if (isset($_POST['desc'])) {
                            $order = "desc";
                            showFacultiesSorted($recordsPerPage, $offset, $order);
                        } else {
                            showFaculties($recordsPerPage, $offset);
                        }
                        $paginationFlag = 1;
                    }

                    ?>
                </tbody>
            </table>
            <?php
            if ($paginationFlag) {
                echo <<<PAGES
                <ul class="pagination w-50 m-auto mt-2">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                PAGES;
            ?>
            <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $current_page) {
                        echo <<<ITEM
                            <li class="page-item active"><a class="page-link" href="?page=$i">$i</a></li>
                            ITEM;
                    } else {
                        echo <<<ITEM
                            <li class="page-item"><a class="page-link" href="?page=$i">$i</a></li>
                            ITEM;
                    }
                }
                echo <<<PAGES
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
                PAGES;
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>