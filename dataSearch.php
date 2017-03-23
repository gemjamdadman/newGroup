<?php
require 'head.php';
?>
<?php

function find($pdo, $table, $field, $value)
{
		$stmt = $pdo->prepare('SELECT * FROM ' . $table .  ' WHERE ' . $field . ' = :value');
		$criteria = ['value' => $value
								];
		$stmt->execute($criteria);
		return $stmt->fetch();
}

if (isset($_GET['bookCat'])){
        switch ($_GET['bookCat']) {

        case 'Databases':
        $results = $pdo->query('SELECT * FROM BOOK WHERE category = "Database"');
            foreach ($results as $row)
				{
					echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '"><div class = "dataSearch"><p>
				<ul><img class="resize" src= ' . $row['IMAGE'] . '>' .
					'<ul>Title: ' . $row['TITLE'] .
					'<ul>Author: ' . $row['AUTHOR'] . '</div></a>';
					//'<ul><a href="dataSearch.php?book=' . $row['ISBN'] . '">' . $row['TITLE'] . ' ' . $row['AUTHOR'] . '</a></div>';
				}
         break;

			case 'Networking':
			$results = $pdo->query('SELECT * FROM BOOK WHERE category = "Computer Communication"');
            foreach ($results as $row)
				{
					echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '"><div class = "dataSearch"><p>
					<ul><img class="bookResize" src= ' . $row['IMAGE'] . '>' .
					'<ul>Title: ' . $row['TITLE'] .
					'<ul>Author: ' . $row['AUTHOR'] . '</p></div></a>';
				}
         break;


			case 'Java':
			$results = $pdo->query('SELECT * FROM BOOK WHERE category = "Java"');
            foreach ($results as $row)
				{
					echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '"><div class = "dataSearch"><p>
					<ul><img class="resize" src= ' . $row['IMAGE'] . '>' .
					'<ul>Title: ' . $row['TITLE'] .
					'<ul>Author: ' . $row['AUTHOR'] . '</p></div></a>';
				}
         break;

			case 'Systems':
			$results = $pdo->query('SELECT * FROM BOOK WHERE category = "Operating Systems"');

            foreach ($results as $row)
				{
					echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '"><div class = "dataSearch"><p>
					<ul><img class="resize" src= ' . $row['IMAGE'] . '>' .
					'<ul>Title: ' . $row['TITLE'] .
					'<ul>Author: ' . $row['AUTHOR'] . '</p></div></a>';
				}
         break;

			case 'WebDesign':
			$results = $pdo->query('SELECT * FROM BOOK WHERE category = "WebDesign"');
            foreach ($results as $row)
				{
					echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '"><div class = "dataSearch"><p>
					<ul><img class="resize" src= ' . $row['IMAGE'] . '>' .
					'<ul>Title: ' . $row['TITLE'] .
					'<ul>Author: ' . $row['AUTHOR'] . '</p></div></a>';

				}
         break;


			case 'SoftEng':
			$results = $pdo->query('SELECT * FROM BOOK WHERE category = "Software Engineering"');
            foreach ($results as $row)
			  {
					echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '"><div class = "dataSearch"><p>
					<ul><img class="resize" src= ' . $row['IMAGE'] . '>' .
					'<ul>Title: ' . $row['TITLE'] .
					'<ul>Author: ' . $row['AUTHOR'] . '</p></div></a>';
				}
         break;

		case 'Problem':
			$results = $pdo->query('SELECT * FROM BOOK WHERE category = "Problem Solving"');
            foreach ($results as $row)
            {
					echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '"><div class = "dataSearch"><p>
					<ul><img class="resize" src= ' . $row['IMAGE'] . '>' .
					'<ul>Title: ' . $row['TITLE'] .
					'<ul>Author: ' . $row['AUTHOR'] . '</p></div></a>';
            }
         break;

		default:
          echo '<p class = "dataSearch">' . " Nothing found " . '</p>';
        break;

    }

}
if (isset($_POST['search']))
{
	if (isset($_POST['submit']))
	{

$bookSearch = ($_POST['search']);
$books = $pdo->prepare("SELECT * FROM BOOK WHERE TITLE LIKE :search || AUTHOR LIKE :search || ISBN LIKE :search");
$book = "%" . $bookSearch . "%";
// BINDPARAM IS A ONE->ONE RELATIONSHIP SO NEEDS TO BE SINGLE VARIABLE INSTEAD OF ARRAY - NET.PHP
$books->bindParam(':search', $book, PDO::PARAM_STR);

$books->execute();
$bookResults = $books->fetchAll(PDO::FETCH_ASSOC);


				foreach ($bookResults as $results)
				{
				echo '<a href="book_page.php?ISBN=' . $results['ISBN'] . '">
							<div class = "dataSearch">
								<p>
									<img class="resize" src= '
										. $results['IMAGE'] .
								 '>' . " "
										. $results['TITLE'] . " - "
										. $results['AUTHOR'] . " - "
										. $results['ISBN'] . " - £"
										. $results['PRICE'] .
							 '</p>
							</div>
					</a>';
				}


	}
}

?>

<?php
require 'foot.php';
 ?>
