<?php
include 'header.php';
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $bookTitle = "%" . $_POST['title'] . "%";

    search_book($bookTitle);
}


?>
    <main>
        <div class="login-container">
            <form action="search_book.php" method="POST">
                <label for="title">
                    <input type="text" name="title" placeholder="Enter author or title of book" class="form-control"></label><br>
                <label for="submit"><button class="btn-primary
                btn-lg">search</button></label>
            </form>
            <label><button class="btn-lg
            btn-primary"><a href="dashboard.php">return to
                        dashboard</a></button></label>
        </div>
    </main>

<?php


include_once 'footer.php';
