
<?php

$results = $pdo->query('SELECT * FROM BOOK order by RAND() LIMIT 1 ');
    foreach ($results as $row)
{

  echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '">
            <div class = "feature">
                <div class = "featureHead"><p>
                    Featured Book</p>
                </div>
                <div class = "mainFeature"><img class="resize" src= '
                                      . $row['IMAGE'] . '>
                </div>
                <div class = "featureBlurb">'
                                      . $row['SYNOPSIS'] . '
                </div>
                <div class = "bookWriter">Title: '
                                      . $row['TITLE'] . '</br>Author: '
                                      . $row['AUTHOR'] . '</p>
                </div>
            </div>
         </a>';

}

$results = $pdo->query('SELECT * FROM BOOK order by RAND() LIMIT 3 ');
    foreach ($results as $row)
{
  echo '<a href="book_page.php?ISBN=' . $row['ISBN'] . '">
              <div class = "side">
                  <img class="sideResize" src= ' . $row['IMAGE'] . '>

                  <div class = sideTitle">
                            ' . $row['TITLE'] . '<p>
                            ' . $row['AUTHOR'] . '
                  </div>
              </div>
        </a>';

}

?>
