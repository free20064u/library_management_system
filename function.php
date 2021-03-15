<?php
require_once 'connect.php';

//function for verification of admin
function admin_verify($username, $password)
{
    global $connection;
    $sql = $connection->prepare("SELECT * FROM `admin_access` WHERE `username` = ? ");
    $sql->execute(array($username));
    if ($sql->rowCount() != 0){
        foreach ($sql->fetchAll() as $row){
            #checking if password entered matches the one in the database.
            if ($row['password'] == $password){
                $_SESSION['username'] = $username;
                header("Location:dashboard.php");
            } else{
                echo 'Your password is incorrect';
            }        
        };
    }else{
        echo "You have entered a wrong username";
    }
}

//function to add a new book to the database.
function add_book($isbn,$title, $author, $date_published, $category)
{
    global $connection;
    $sql = $connection->prepare("INSERT INTO books (isbn, title, author, date_published, category) VALUES (?,?,?,?,?)");
    $sql->execute(array($isbn, $title, $author, $date_published, $category));

    if ($sql){
        echo "<h4>Data inserted successfully</h4><br>";
        echo "<h4>Book with title " . $title . " has been added to the database.</h4>";
    }else{
        echo "Error: could not insert data";
    }
}

//function to search through book
function search_book($bookTitle){
    global $connection;
    $title = "title";

    $sql = $connection->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ? OR category LIKE ? ");
    $sql->execute(array($bookTitle , $bookTitle, $bookTitle));

    foreach($sql->fetchAll() as $row){
        echo "Title: ". $row['title'] . " Written By: " . $row['author'] . " Category: " . $row['category'];
        echo "<br>";
    }

}

//function to add student to the database.
function add_student($name,$program, $class)
{
    global $connection;
    $sql = $connection->prepare("INSERT INTO student (`name`, `program`, class) VALUES (?,?,?)");
    $sql->execute(array($name, $program, $class));

    if ($sql){
        echo "<h4>Data inserted successfully</h4><br>";
        echo "<h4>A student with name " . $name . " has been added to the database.</h4>";
    }else{
        echo "Error: could not insert data";
    }
}


#function to add detail of student borrowing a book.
function add_student_borrower(){
    global $connection;

    $sql = $connection->query("SELECT `student_id`,`name`  FROM `student`");
    echo '<select name="student_id" class="btn-lg">
            <option>Select students name</option>';

    foreach($sql->fetchAll() as $row){
    
        echo '<option value="' . $row['student_id'] . '">' . $row['student_id'] . '.  ' . $row['name']. '</option>';     
    }
    echo '</select>';
}

#function to add book borrowed by student.
function add_book_borrowed(){
    global $connection;

    $sql = $connection->query("SELECT `book_id`, `isbn`,`title`, `author`  FROM `books`");
    echo '<select name="book_id" class="btn-lg">
            <option>Select a book</option>';

    foreach($sql->fetchAll() as $row){
    
        echo '<option value="' . $row['book_id'] . '">' . $row['author'] . '\'s.  ' . $row['title']. '</option><br>'; 
        $_SESSION['title'] = $row['title'] ;
    }
    echo '</select>';
}

# function to add borrowers detail to borrower table
function add_borrowers_detail($date_borrowed, $date_to_return, $book_id, $student_id){
    global $connection;
    $sql = $connection->prepare("INSERT INTO borrowers (`date_borrowed`, `date_to_return`, `book_id`, `student_id`) VALUES (?,?,?,?)");
    $sql->execute(array($date_borrowed, $date_to_return, $book_id, $student_id));


    if ($sql){
        echo "<h4>Data inserted successfully</h4><br>";
        echo "<h4>". get_name($student_id) . " has borrowed book with title " . get_book_title($book_id) . " and have to return it by " . $date_to_return . ".</h4>";
    }else{
        echo "Error: could not insert data";
    }
}
# function to get name of the student who have borrowed a book
function get_name($student_id){
    global $connection;
    $sql = $connection->query("SELECT `name` FROM `student` WHERE `student_id` = $student_id");
    foreach($sql->fetchAll() as $row){
        return $row['name'];
    }
}
# functino to get the title of book borrowed
function get_book_title($book_id){
    global $connection;
    $sql = $connection->query("SELECT `title` FROM `books` WHERE `book_id` = $book_id");
    foreach($sql->fetchAll() as $row){
        return $row['title'];
    }
}
    



//function to update book information in database.
function update_book(){}

//function to insert borrower info into book when a book is borrowed.
function insert_borrower_info(){}

//function to remove borrower info after a book had been returned.
function remove_borrower_info(){}

//function to retrieve books that has been borrowed
function retrieve_books_borrowed(){}

//function to retrieve books borrowed and have expired date of return
function borrowed_expiry_date(){}