
<?php echo"nee";
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
        <h2> registreet je voor het meldingsysteem</h2>
        <form action="backend/registerController.php" method="POST">
        <div class="form-group">
            
            <label for="username">email:</label>
            <input type="text" name="email" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password check:</label>
            <input type="password" name="password_check" id="password_check" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="log in" class="btn btn-primary">
        </form>
        

    </div>

</body>

</html>
