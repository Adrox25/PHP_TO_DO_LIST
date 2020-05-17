<!DOCTYPE html>
<?php include 'db.php';


$page = (isset($_GET['page']) ? (int)$_GET['page']:1);
$perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$sql = "select * from tasks limit ".$start." , ".$perPage." ";
$total = $db->query("select * from tasks")->num_rows;
$pages = ceil($total/$perPage);
$rows = $db -> query($sql);
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
    <div class ="row"><h1>Lista To Do</h1>

        <div class="col-md-10 col-md-offset-1">

            <!-- Button trigger modal -->
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Dodaj zadanie
            </button>
            <button type="button" class="btn btn-new" onclick="print()">
                Drukuj
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="add.php">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Wpisz zadanie:</label>
                                    <input type="text" name = "task" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                    <button type="submit" name ="send" class="btn btn-primary">Dodaj</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Numer</th>
                <th scope="col">Zadanie</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php while($row = $rows->fetch_assoc()): ?>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-print">Edytuj</a</td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-success">Usuń</a></td>
            </tr>
<?php endwhile; ?>
            </tbody>
        </table>
            <ul class = "pagination">
                <?php for($i = 1; $i<= $pages; $i++): ?>

                <li><a href="?page=<?php echo $i;?>$per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            </ul>
        </div>
</div>
</div>
</body>
</html>