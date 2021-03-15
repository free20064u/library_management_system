<?php
include_once 'header.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'function.php';

    $name = htmlspecialchars(trim($_POST['fullname']));
    $program = htmlspecialchars(trim($_POST['program']));
    $class = htmlspecialchars(trim($_POST['class']));

    add_student($name, $program, $class);

    ?> 
    
    <div class="container">
            <button class="btn-primary btn-lg"><a href="add_student.php">Add student to database</a></button>
            <button class="btn-lg btn-primary"><a href="dashboard.php">return to
            dashboard</a></button>
    <?php

}else{
    ?>
    <main>
        <div class="login-container">
            <h3>Add student to database.</h3>
            <form action="add_student.php" method="POST" class="form">
                <label for="fullname"><input type="text" placeholder="Fullname" class="form-control btn-lg" name="fullname" required></label>
                <label for="program"><input type="text" placeholder="Program of study" class="form-control btn-lg" name="program" required></label>
                <label for="class"><input type="text" placeholder="Class" class="form-control btn-lg" name="class" required></label>
                <br>
                <label for="submit"><button class="btn-primary
                btn-lg">submit</button></label>
            </form>
            <label><button class="btn-lg
            btn-primary"><a href="dashboard.php">return to
                        dashboard</a></button></label>
        </div>
    </main>

<?php

}



include_once 'footer.php';
