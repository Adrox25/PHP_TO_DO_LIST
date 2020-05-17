<!DOCTYPE html>
<?php include 'db.php';

$id = (int)$_GET['id'];
$sql = "select * from tasks where id='$id'";

$rows = $db -> query($sql);

$row = $rows-> fetch_assoc();
if(isset($_POST['send'])){
$task = htmlspecialchars($_POST['task']);
var_dump($row);
$sql2 ="update tasks set name='$task' where id='$id'";
$db->query($sql2);
header('location: index.php');
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>To do list</title>


</head>
<body>
<div class="container">
    <div class ="row"><h1>Aktualizuj</h1>

        <div class="col-md-10 col-md-offset-1">


                            <form method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Edytuj zadanie:</label>
                                    <input type="text" name = "task" value="<?php echo $row['name'];?>" "class="form-control" id="recipient-name">

                                    <button type="submit" name ="send" class="btn btn-primary">Aktualizuj</button>
                                    <a href="index.php" class="btn btn-warning">Powrót</a>
                                </div>
                            </form>

        </div>
    </div>
</div>
</body>
</html>