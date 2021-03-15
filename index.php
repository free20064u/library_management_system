<?php
require_once 'connect.php';
include_once 'function.php';
include_once 'header.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    admin_verify($username, $password);
}

?>
    <main>
        <div class="login-container" >
            <form action="index.php" method="post">
                <div>
                    <label for="username"><input type="text" name="username" class="form-control" placeholder="username" required></label><br>
                    <label for="password"><input type="password" name="password" class="form-control" placeholder="password" required></label><br>
                    <label for="submit"><button class="btn btn-primary " value="submit">submit</button></label>
                </div>
            </form>
        </div>
    </main>
    <div>
        <?php
            include_once 'footer.php';
        ?>
    </div>
