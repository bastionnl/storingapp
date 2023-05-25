<?php
session_start()?>
<!doctype html>
<html lang="nl">

<head>
    <title>Instagram - Home</title>
    <?php require_once 'head.php'; ?>
</head>

<body>

    <?php require_once 'header.php'; ?>
    
    <div class="container home">
    <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>
        <form action="backend/loginController.php" method="POST">
        <div class="form-group">
            <h2> login</h2>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="log in" class="btn btn-primary">
        </form>
        

    </div>

</body>

</html>
