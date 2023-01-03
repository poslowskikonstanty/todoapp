<?php
require './isLogged.php';
require './connection.php';
$query_string = "SELECT tasks.id,
                        tasks.description,
                        tasks.status
                   FROM tasks
                  WHERE tasks.user_id = {$_SESSION['userId']};";
$query = $conn->query($query_string);
$result = $query->fetchAll();
$conn = NULL;

$login = $_POST['login'] ?? NULL;
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar">
        <h2 class="navbar-tittle">todo_list</h2>
    </nav>


    <div class="todo">
        <h1 class="todo-h1">ToDo_List</h1>
        <h2 class="todo-h2">Witaj <?= $login ?></h2>
    </div>

    <?php foreach($result as $d): ?>
    
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true"><h4>ZADANIE</h4></li>
        <li class="list-group-item"><h5><?= $d[1] ?></h5><?= $d[2] ? "zrobione" : "niezrobione" ?></li>
        <li class="list-group-item">
        <a href="delete.php?id=<?= $d[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 24 24"
style="fill:#FA5252;">
<path d="M 10.3125 -0.03125 C 8.589844 -0.03125 7.164063 1.316406 7 3 L 2 3 L 2 5 L 6.96875 5 L 6.96875 5.03125 L 17.03125 5.03125 L 17.03125 5 L 22 5 L 22 3 L 17 3 C 16.84375 1.316406 15.484375 -0.03125 13.8125 -0.03125 Z M 10.3125 2.03125 L 13.8125 2.03125 C 14.320313 2.03125 14.695313 2.429688 14.84375 2.96875 L 9.15625 2.96875 C 9.296875 2.429688 9.6875 2.03125 10.3125 2.03125 Z M 4 6 L 4 22.5 C 4 23.300781 4.699219 24 5.5 24 L 18.59375 24 C 19.394531 24 20.09375 23.300781 20.09375 22.5 L 20.09375 6 Z M 7 9 L 8 9 L 8 22 L 7 22 Z M 10 9 L 11 9 L 11 22 L 10 22 Z M 13 9 L 14 9 L 14 22 L 13 22 Z M 16 9 L 17 9 L 17 22 L 16 22 Z"></path>
</svg></a> <a href="edit.php?id=<?= $d[0] ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 24 24">
    <path d="M 16.9375 1.0625 L 3.875 14.125 L 1.0742188 22.925781 L 9.875 20.125 L 22.9375 7.0625 C 22.9375 7.0625 22.8375 4.9615 20.9375 3.0625 C 19.0375 1.1625 16.9375 1.0625 16.9375 1.0625 z M 17.3125 2.6875 C 18.3845 2.8915 19.237984 3.3456094 19.896484 4.0214844 C 20.554984 4.6973594 21.0185 5.595 21.3125 6.6875 L 19.5 8.5 L 15.5 4.5 L 16.9375 3.0625 L 17.3125 2.6875 z M 4.9785156 15.126953 C 4.990338 15.129931 6.1809555 15.430955 7.375 16.625 C 8.675 17.825 8.875 18.925781 8.875 18.925781 L 8.9179688 18.976562 L 5.3691406 20.119141 L 3.8730469 18.623047 L 4.9785156 15.126953 z"></path>
</svg></a>
        </li>
        
    </ul>
    <?php endforeach; ?>
    

<div class="buttons">
    <a href="./create.php"><button type="button" class="btn btn-outline-primary btn-lg">Dodaj zadanie</button></a>
    <br>
    <br>
    <a href="log_out.php"><button type="button" class="btn btn-outline-danger">Wyloguj się</button></a>
</div>
    

    <div class="custom-shape-divider-bottom-1671031241">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
    
    <footer>
        <p> © 2023 <a href="https://github.com/poslowskikonstanty">poslowskikonstanty</a></p>
    </footer>
</body>

</html>