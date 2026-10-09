<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "titi books";
$connection = new mysqli($servername,$username,$password , $dbname);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- <link rel="stylesheet" href="&7.css"> -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
/* ===== admin.css : written for the ORIGINAL HTML structure ===== */

:root {
    --card: #ffffff;
    --text: #1f2933;
    --muted: #6b7280;
    --price: #0a7a3d;
    --accent: #2ba5c4;
    --danger: #d64545;
}

*, *::before, *::after { box-sizing: border-box; }

/* body is the grid: header stuff spans the full row, .books cards fill the columns */
body {
    margin: 0;
    padding: 24px 24px 100px;
    font-family: "Poppins", sans-serif;
    background-color: rgba(43, 165, 196, 0.55);
    color: var(--text);
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(min(220px, 100%), 1fr));
    gap: 20px;
    align-items: stretch;
}

/* everything that is NOT a book card takes the whole row */
body > *:not(.books) { grid-column: 1 / -1; }

body > br { display: none; }

/* ---------- header area ---------- */
body > h2 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    overflow-wrap: anywhere;
}

/* <button><a>Log out</a></button> */
body > button {
    justify-self: start;
    padding: 0;
    border: 0;
    background: var(--text);
    border-radius: 999px;
    cursor: pointer;
    transition: background .2s;
}
body > button a {
    display: block;
    padding: 8px 18px;
    font-family: inherit;
    font-size: .9rem;
    font-weight: 500;
    color: #fff;
    text-decoration: none;
}
body > button:hover { background: var(--danger); }

h1 {
    margin: 8px 0 0;
    text-align: center;
    font-family: "Playfair Display", serif;
    font-size: clamp(1.3rem, 4vw, 2rem);
}

/* "Total books" / "Total users" */
center {
    justify-self: center;
    padding: 8px 20px;
    font-weight: 600;
    color: var(--price);
    background: var(--card);
    border-radius: 999px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
}

/* floating "Add new book" link (direct child <a> of body) */
body > a {
    position: fixed;
    right: 24px;
    bottom: 24px;
    z-index: 40;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 22px;
    font-weight: 600;
    color: #222;
    text-decoration: none;
    background: linear-gradient(135deg, #fff, #e8f6fa);
    border-radius: 999px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, .25);
    transition: transform .2s;
}
body > a:hover { transform: translateY(-2px); }

/* ---------- book card ---------- */
.books {
    min-width: 0;
    display: flex;
}

.book {
    position: relative;
    flex: 1;
    display: flex;
    flex-direction: column;
    padding: 14px;
    background: var(--card);
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
    overflow-wrap: anywhere;
    width:fit-content;
    border-width:40%;
    transition: transform .2s, box-shadow .2s;
}
.book:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, .14);
}

.book img {
    display: block;
    width: 100%;
    height: auto;
    aspect-ratio: 3 / 4;
    object-fit: cover;
    border-radius: 8px;
    background: #e5e7eb;
    margin-bottom: 12px;
}

.book h3 {
    margin: 0 0 4px;
    font-size: 1rem;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.book h4 {
    margin: 0 0 8px;
    font-size: .85rem;
    font-weight: 500;
    color: var(--muted);
}
.book p { margin: 2px 0; font-size: .85rem; }
.book p:nth-of-type(1) { font-weight: 600; color: var(--price); }

/* ---------- edit icon: first form in the card ---------- */
.book form { margin: 0; }
.book form a {
    position: absolute;
    top: 22px;
    right: 22px;
    width: 34px;
    height: 34px;
    display: grid;
    place-items: center;
    background: rgba(255, 255, 255, .92);
    color: #333;
    border-radius: 50%;
    text-decoration: none;
    box-shadow: 0 1px 4px rgba(0, 0, 0, .2);
    transition: background .2s, color .2s;
}
.book form a:hover { background: var(--text); color: #fff; }

/* ---------- delete button: last form in the card, pinned to the bottom ---------- */
.book form:last-of-type {
    margin-top: auto;
    padding-top: 12px;
}
.book form:last-of-type button {
    width: 100%;
    padding: 8px 12px;
    font-family: inherit;
    font-size: .85rem;
    font-weight: 600;
    color: var(--danger);
    background: transparent;
    border: 1.5px solid var(--danger);
    border-radius: 8px;
    cursor: pointer;
    transition: background .2s, color .2s;
}
.book form:last-of-type button:hover { background: var(--danger); color: #fff; }

/* ---------- phones: 2 cards per row ---------- */
@media (max-width: 480px) {
    body { padding: 14px 14px 90px; gap: 12px; grid-template-columns: repeat(2, 1fr); }
    .book { padding: 10px; }
    .book form a { top: 16px; right: 16px; }
    body > a { right: 14px; bottom: 14px; padding: 10px 16px; }
}
 </style>  
</head>
<body>
  <center>Hi  <?php echo $_SESSION['name'];?></center>
    <h1>BOOKS for you.....</h1>
    <a href="login.php">Log out from account</a>
      <?php
    $select = mysqli_query($connection,"SELECT * FROM books ");
    $i = 1;
if(mysqli_num_rows($select) >0 ){
    
    while($row = mysqli_fetch_array($select)){
?>

<div class = "books">
    <div class = "book">
        
<img src="image/<?php echo $row['pictute']?>" alt="" width = "200px" height = "200px">
<h3>TITLE: <?php echo $row['title']?></h3>
<h4>AUTHOR: <?php echo $row['author']?></h4>
<p>PRICE: $<?php echo $row['price']?></p>

  <form method="post">
        <input type="hidden" name="cart" value = "<?php echo $row['id']?>">
         <a href="cart.php?id=<?php echo $row['id'];  ?>" name="car"><i class="fa-solid fa-file-lines" ></i></a>
    </form>
 
<?php
    }
}

// if(isset($_POST["editt"])){
//     $id = $_POST["edit"];
//     header("location:edit.php");
//
if(isset($_POST["cart"])){
    $id = $_POST["car"];
    header("location:cart.php");
    // $_SESSION['Id'] = $id;
}
?>
</div>

</body>
</html>
