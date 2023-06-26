<?php
$filePath = 'form_data.txt';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $data = "Name: $name, Email: $email" . PHP_EOL;

    file_put_contents($filePath, $data, FILE_APPEND | LOCK_EX);

    echo "Data successfully added.";
}
$data = file_get_contents($filePath);
$dataArray = explode(PHP_EOL, $data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>
    <h2>Add User</h2>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>User List</h2>
    <?php
    if (!empty($dataArray)) {
        foreach ($dataArray as $item) {
            echo $item . "<br>";
        }
    } else {
        echo "No users found.";
    }
    ?>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(0,212,255,1) 100%);
        }
    </style>
</body>
</html>
