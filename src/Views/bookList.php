<html>

<?php
    require_once("Components/layout.php");
?>

<body>

<?php
    require_once("Components/header.php");
?>

<a href="?action=create">
    <button type="button" class="btn btn-primary">crear nuevo libro</button>
</a>


 
<main class='container'>

<?php
    foreach($data["books"] as $book){
        $id = $book->getId();
        $bookname = $book->getBookname();
        $author= $book->getAuthor();
        $isbn = $book->getIbsn();
        $price = $book->getPrice();
        $bookstate = $book->getBookstate();
        
        echo  "
            <div class='card mb-3' style='max-width: 18rem;'>
                <div class='card-header'>
                    <h3>$bookname</h3>
                    <p class='card-data'>$author</p>
                    <p class='card-data'>$isbn</p>
                    <a href='?action=edit&id=$id'>
                         <button type='button' class='btn btn-primary'>m</button>
                    </a>

                    <a href='?action=delete&id=$id'>
                        <button type='button' class='btn btn-primary'>D</button>
                    </a>
                </div> 
                <div class='card-body '> 
                    <p class='card-text'>$price</p>

                    <p class ='card-date'>$bookstate</p>

                </div>
            </div>  
      
        
        ";
       

    };
?>
</main>

    <footer></footer>
</body>

</html>