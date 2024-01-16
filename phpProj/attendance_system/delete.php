<?php

include('./db_connect.php');
$sid = $_REQUEST['sid'];

if (isset($_POST['confirm'])) {
    echo <<<ALERT
    <script>
        alert('Student will be deleted.. ');
    </script>
    ALERT;
    $sql = "DELETE FROM student WHERE sid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $sid);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo <<<MSG
        <script>
            alert('Student Deleted Successfully.. ');
            window.open('./home.php', '_self');
        </script>
        MSG;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <form action="" method="post">
            <button type="submit" name="confirm" class="btn btn-danger">Confirm Deletetion</button>
        </form>
        <button type="submit" name="cancel" class="btn btn-warning mt-4">
            <a class="text-decoration-none text-black" href="./home.php">Cancel Deletetion</a>
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>