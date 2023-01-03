<?php
require './isLogged.php';
$description = $_POST['description'] ?? NULL;
$status = $_POST['status'] ?? NULL;
if (isset($description) and isset($status)) {
    require './connection.php';
    $query_string = "INSERT INTO tasks (id, description, status, user_id) VALUES (NULL, '{$description}', '{$status}', '{$_SESSION['userId']}')";
    $query = $conn->query($query_string);
    $conn = NULL;
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List / Tworzenie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
        <h2 class="navbar-tittle">todo_list</h2>
    </nav>


    <div class="col order-5">
    <div class="login">
        <h1>DODAJ ZADANIE</h1>
        <form method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="description" placeholder="Opis" name="description" required>
        <label for="floatingInput">Opis</label>
      </div>
      <div class="form-floating mb-3">
        <span>Nie zrobione: </span>
	<input class="form-check-input" type="radio" name="status" id="status" value="0">
 	<label class="form-check-label" for="flexRadioDefault1">
  	</label>
	<span>Zrobione: </span>
	<input class="form-check-input" type="radio" name="status" id="status" value="1">
 	<label class="form-check-label" for="flexRadioDefault1">
  	</label>
      <br>
      <br>
      <input class="btn btn-primary" type="submit" value="Dodaj"> 
    </form>
    <br>
    <br>
        <p>Rozmyśliłeś się? <br><a href="index.php">Wróć do listy zadań!</a></p>
    </div>
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