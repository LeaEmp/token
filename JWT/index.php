<?php
    //require_once("functions.php"); 
    //echo generateToken();
?>

<form method="POST" action="login_func.php">
        <div class="container">
            <input type="text" placeholder="Username" name="username" required>
            <br>
            <br>
            <input type="password" placeholder="Password" name="password" required>
            <br>
            <br>
            <input id="button" type="submit" name="submit" value="Login">
        </div>
</form>
