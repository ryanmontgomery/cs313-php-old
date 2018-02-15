<?php 
require 'model/database.php';
require 'model/patrons.php';
require 'model/authors.php';
require 'model/books.php';
require 'model/due_dates.php';
?>

<h1>Patron Function Tests</h1>
<?php
var_dump(get_patron(1)); echo '<br><br>';
var_dump(get_patron_list());  echo '<br><br>';
var_dump(search_patron_list('Montgomery')); echo '<br><br>';
?>

<h1>Authors Function Tests</h1>
<?php
var_dump(get_author_list()); echo '<br><br>';
var_dump(search_author_list('Sanderson'));  echo '<br><br>';
?>

<h1>Books Function Tests</h1>
<?php
var_dump(get_book(1)); echo '<br><br>';
var_dump(get_authors_books(1));  echo '<br><br>';
var_dump(book_by_title('The Way of Kings')); echo '<br><br>';
?>

<h1>Due Dates Function Tests</h1>
<?php
var_dump(get_overdue_books()); echo '<br><br>';
?>