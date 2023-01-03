<?php
require './isLogged.php';
if (!$_GET['id']) {
    header("Location: index.php");
} else {
    require './connection.php';
    $query_string = "SELECT tasks.description,
                            tasks.status
                       FROM tasks
                      WHERE tasks.id = {$_GET['id']};";
    $query = $conn->query($query_string);
    $result = $query->fetch();
}
$description = $_POST['description'] ?? NULL;
$status = $_POST['status'] ?? NULL;
if (isset($description) and isset($status)) {
    $query_string = "UPDATE tasks SET `description` = '{$description}', `status` = '{$status}' WHERE `tasks`.`id` = {$_GET['id']};";
    $query = $conn->query($query_string);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List / Edycja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
        <h2 class="navbar-tittle">todo_list</h2>
    </nav>


    <div class="col order-5">
    <div class="login">
        <h1>EDYTUJ ZADANIE</h1>
        <form method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Opis" name="description" value="<?= $result[0] ?>" required>
        <label for="floatingInput">Opis</label>
	  <?php if ($result[1] == 0): ?>
      </div>
      <div class="form-floating mb-3">
        <span>Nie zrobione: </span>
	<input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
 	<label class="form-check-label" for="flexRadioDefault1">
  	</label>
	<span>Zrobione: </span>
	<input class="form-check-input" type="radio" name="status" id="status" value="1">
 	<label class="form-check-label" for="flexRadioDefault1">
  	</label>
	<?php else: ?>
	<span>Nie zrobione: </span>
      <input class="form-check-input" type="radio" name="status" id="status" value="0">
	<label class="form-check-label" for="flexRadioDefault1">
  	</label>
      <span>Zrobione: </span>
      <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
	<label class="form-check-label" for="flexRadioDefault1">
  	</label>
      <?php endif; ?>
      <br>
      <br>
      <input class="btn btn-primary" type="submit" value="Edytuj"> 
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