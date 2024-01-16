<?php
// include('./db_connect.php');

function filterData($degree)
{
    global $conn;

    $sql = "SELECT * FROM faculty WHERE degree = '$degree'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $fid = $row['fid'];
        $fname = $row['fname'];
        $age = $row['age'];
        $degree = $row['degree'];
        echo <<<DATA
        <tr>
            <td>$fid</td>
            <td>$fname</td>
            <td>$age</td>
            <td>$degree</td>
        </tr>
        DATA;
    }
}
