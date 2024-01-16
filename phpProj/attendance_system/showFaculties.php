<?php

function showFaculties($recordsPerPage, $offset)
{
    global $conn;

    $sql = "SELECT * FROM faculty LIMIT $recordsPerPage OFFSET $offset";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['fid'];
            $name = $row['fname'];
            $age = $row['age'];
            $degree = $row['degree'];

            echo <<<DATA
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$age</td>
                    <td>$degree</td>
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
}
function showFacultiesSorted($recordsPerPage, $offset, $order)
{
    global $conn;

    $sql = "SELECT * FROM faculty ORDER BY age $order LIMIT $recordsPerPage OFFSET $offset";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['fid'];
            $name = $row['fname'];
            $age = $row['age'];
            $degree = $row['degree'];

            echo <<<DATA
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$age</td>
                    <td>$degree</td>
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
}
