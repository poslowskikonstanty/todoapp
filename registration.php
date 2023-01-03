<?php
session_start();

        $login = ($_POST['login']) ?? null;
        $haslo1 = ($_POST['haslo1']) ?? null;
        $haslo2 = ($_POST['haslo2']) ?? null;

        $blad = [];
        
        // sprawdzamy czy login nie jest już w bazie
    if($login != null && $haslo1 != null && $haslo2 != null){

        $db = new PDO('mysql:host=localhost;dbname=2p1', 'root', '');

        
            if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
            {
                $stmt = $db->query("INSERT INTO `users` (`login`, `password`) VALUES ('".$login."', '".md5($haslo1)."');");
                
                $blad[] = "Konto zostało utworzone!";
            }
            else if($haslo1 != $haslo2) {
                $blad[] = "Hasła nie są takie same";
            } else {
                $blad[] = "Podany login jest już zajęty.";
            }
        }   
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List / Rejestracja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <nav class="navbar">
        <h2 class="navbar-tittle">todo_list</h2>
    </nav>

    <div class="col order-5">
    <div class="login">
        <h1>REJESTRACJA</h1>
        <?php if(!empty($blad)): ?>
        <p></p><?= implode("<br>", $blad); ?></p>
        <?php endif; ?>
        <form method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="login" id="floatingInput" placeholder="Login">
        <label for="floatingInput">Login</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="haslo1" id="floatingPassword" placeholder="Hasło">
        <label for="floatingPassword">Hasło</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="haslo2" id="floatingPassword" placeholder="Potwierdź hasło">
        <label for="floatingPassword">Potwierdź hasło</label>
      </div>
      <input type="submit" class="btn btn-outline-primary mb-3" value="Potwierdź"> 
      </form>
            <p>Masz już konto? <a href="login.php">Zaloguj się!</a></p>
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