<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $isLogged = !empty($_SESSION['uid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My College!</title>
    <link rel="shortcut icon" href="logo.jpg" type="image/png"  >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet' href='style.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='jquery.min.js'></script>

</head>
<body>
<header>
    
    <nav>
        <ul>
            <img class="float-left" src="logo.jpg" width="110"  >
            <li class='logo'><a href=index.php>Logo</a></li>
            <?php if ($isLogged) { ?> <li class='school'><a href='school.php'>School</a></li> <?php } ?>
            <?php if ($isLogged) { ?> <li class='shows'><a href='showstudent.php'>Students</a></li> <?php } ?>       
            <?php if ($isLogged) { ?> <li class='showc'><a href='showcourses.php'>courses</a></li> <?php } ?>
            <?php if ($isLogged) { ?> <li class='showu'><a href='users.php'>useres</a></li> <?php } ?>                
            <?php if ($isLogged) { ?> <li class='logout'><a href='index.php?logout=1'>Logout</a></li> <?php } ?>
        </ul>
    </nav>
</header>
<hr>
<main class='container'>