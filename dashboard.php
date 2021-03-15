<?php
include_once 'header.php';
echo "<h4>You are welcome ". $_SESSION['username'] . "</h4>";
?>
    <main>
        <div class="login-container">
            <button class="btn-primary btn-lg"><a href="add_book.php">Add books to database</a></button>
            <button class="btn-primary btn-lg"><a href="add_student.php">Add student to database</a></button><br>
            <button class="btn-primary btn-lg"><a href="search_book.php">Search for book</a></button>
            <button class="btn-primary btn-lg"><a href="add_borrower.php">Add Borrower Info</a></button><br>
            <button class="btn-primary btn-lg"><a href="remove_borrower.php">Remove Borrower Info</a></button>
            <button class="btn-primary btn-lg">Search books borrowed</button><br>
            <button class="btn-primary btn-lg">Search expired date books</button>
        </div>
    </main>

<?php
include_once 'footer.php';
