<?php
include_once 'header.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'function.php';

    $isbn = htmlspecialchars(trim($_POST['isbn']));
    $title = htmlspecialchars(trim($_POST['title']));
    $author = htmlspecialchars(trim($_POST['author']));
    $date_published = htmlspecialchars(trim($_POST['date_published']));
    $category = htmlspecialchars(trim($_POST['category']));

    add_book($isbn, $title, $author, $date_published, $category);

    ?> 
    
    <div class="container">
            <button class="btn-primary btn-lg"><a href="add_book.php">Add books to database</a></button>
            <button class="btn-lg btn-primary"><a href="dashboard.php">return to
            dashboard</a></button>
    <?php

}else{
    ?>
    <main>
        <div class="login-container">
            <form action="add_book.php" method="POST" class="form">
                <label for="ISBN"><input type="text" placeholder="ISBN" class="form-control btn-lg" name="isbn" required></label>
                <label for="title"><input type="text" placeholder="Title" class="form-control btn-lg" name="title" required></label>
                <label for="author"><input type="text" placeholder="Author" class="form-control btn-lg" name="author" required></label>
                <label for="date_published"><input type="date" placeholder="Date_published" class="form-control
                btn-lg" name="date_published" required></label>
                <label for="category"><input type="text" placeholder="Category" class="form-control btn-lg" name="category" required ></label><br>
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
