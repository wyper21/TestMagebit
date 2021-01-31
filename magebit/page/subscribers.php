<?php
ob_start();
include_once "../php/functions.php";
$obj = new connect_db();

if(isset($_REQUEST['del_email']))
{
    if($obj->deleteData($_REQUEST['del_email']))
    {
        echo "Email successfully deleted";
    }
}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscribers</title>
</head>
<body>
<button id="sort">Sort By Email</button>
<div class="table" id="table1">
    <table width="750" border="1">
        <tr class="success">
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        <?php
        foreach($obj->showData() as $value)
        {
            extract($value);
            echo <<<show
    
            <tr class="success"  style="text-align: center">
                <td>$email</td>
                <td>$date</td>
                <td><button class="btn"><a href="subscribers.php?del_email=$id">Delete</a></button></td>
                </tr>
show;
        }
        ?>
    </table>
</div>
<div class="table" id="table2" style="display: none">
    <table width="750" border="1">
        <tr class="success">
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        <?php
        foreach($obj->sort() as $value)
        {
            extract($value);
            echo <<<show
    
            <tr class="success" style="text-align: center">
                <td>$email</td>
                <td>$date</td>
                <td><button class="btn"><a href="subscribers.php?del_email=$id">Delete</a></button></td>
                </tr>
show;
        }
        ?>
    </table>
</div>
<script src="../js/sort.js"></script>
</body>
</html>
