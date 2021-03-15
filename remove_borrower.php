<?php
include_once 'header.php';
require_once 'function.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

    $book_id = htmlspecialchars(trim($_POST['book_id']));
    $student_id = htmlspecialchars(trim($_POST['student_id']));
    $date_to_return = htmlspecialchars(trim($_POST['date_to_return']));
    $date_borrowed = htmlspecialchars(trim($_POST['date_borrowed']));


    add_borrowers_detail($date_borrowed, $date_to_return, $book_id, $student_id)

    ?> 
    
    <div class="container">
            <button class="btn-primary btn-lg"><a href="remove_borrower.php">Remove borrower from database</a></button>
            <button class="btn-lg btn-primary"><a href="dashboard.php">return to
            dashboard</a></button>
    <?php

}else{
    ?>
    <main>
        <div class="login-container">
            <form action="remove_borrower.php" method="POST" class="form">
                <h4>Remove borrower information.</h4>
                <?php add_student_borrower(); ?>
                <?php add_book_borrowed(); ?>
                <br>
                
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
