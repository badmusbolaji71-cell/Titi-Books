
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "titi books";
$connection = new mysqli($servername,$username,$password , $dbname);

$title = $author = $img= $category = $price  = $fill = $quantity = $author= $date =$nameerror = $picerror =$dateerror = $priceerror = $categoryerror = $authorerror=$quantityerror= $titleerror ="";
if(isset($_POST["submit"])){
$img = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
move_uploaded_file($tmp,"image/" .$img);
$title = $_POST["title"];
$author = $_POST["author"];
$category = $_POST["category"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$date = $_POST["date"];
$isvalid = true;

if(empty($img) || empty($title) || empty($author) || empty($category) || empty($price) || empty($quantity) || empty($date)){
    $fill = "*All must be filled";
    $isvalid = false;
}
if(empty($img)){
    $picerror = "*insert book's image";
    $isvalid = false;
}

if(empty($title)){
    $titleerror = "*input book's title";
    $isvalid = false;
}
// elseif(!preg_match("/^[A-Z],[a-z-]*$/",$title)){
//      $titleerror = "*only letters and white space are allowed";
// }
if( empty($author)){
    $authorerror = "*input Author's name";
    $isvalid = false;
}
elseif(!preg_match("/^[A-Za-z-\s]*$/",$author)){
     $authorerror = "*only letters and white space are allowed";
}
if(empty($category) ){
    $categoryerror = "*choose catgory";
    $isvalid = false;
}
if(empty($price) ){
    $priceerror = "*input price";
    $isvalid = false;
}
elseif(!preg_match("/^[0-9]*$/",$price)){
   $priceerror = "*input valid price";
     $isvalid = false;
}
// elseif($price <= 0){
  
//     $isvalid = false;
// }
if(empty($quantity) ){
    $quantityerror = "*input quantity";
    $isvalid = false;
}
elseif(!preg_match("/^[0-9]*$/",$quantity)){
 $quantityerror = "*input valid quantity";
     $isvalid = false;
}
// elseif($quantity <= 0){
   
//     $isvalid = false;
// }
if(empty($date) ){
    $dateerror = "*input date";
    $isvalid = false;
}
if ($isvalid) {
    $id = $_POST['id']; // or $_GET['id'], depending on how you send it

    $stmt = mysqli_prepare($connection,
        "UPDATE books
         SET pictute = ?, title = ?, author = ?, category = ?,
             price = ?, quantity = ?, date_of_release = ?
         WHERE id = ?");

    // s = string, d = decimal, i = integer
    mysqli_stmt_bind_param($stmt, "ssssdisi",
        $img, $title, $author, $category, $price, $quantity, $date, $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <style>
         body{
            background-color:rgba(105, 78, 226, 0.55);
        }
        #form{
            justify-self:center;
            align-items:center;
            display:grid;
            gap:40px;
            border:2px solid grey;
            border-radius:15px;
            padding-top:20px;
            padding:20px;
            background-color:rgba(43, 165, 196, 0.55);
        }
        a{
  position: fixed;
  right: 24px;
  bottom: 24px;
  z-index: 40;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 22px;
  font-weight: 600;
  color: var(--card-text);
  background: linear-gradient(135deg, var(--card-bg), #ffffff);
  border-radius: 999px;
  box-shadow: var(--shadow-card);
}
       input{
    height:30px;
    border:2px solid white;
    border-radius:15px;
 background-color: #444f92;
}
j{
    color:green;
}
    </style>
</head>
<body>
         <?php
      $bookId = $_GET['id'];
    $select = mysqli_query($connection,"SELECT * FROM books WHERE id = '$bookId' ");
   
    $i = 1;
if(mysqli_num_rows($select) >0 ){
    
    while($row = mysqli_fetch_array($select)){
?>
<center>VIEW BOOK INFO....</center>
<a href="index_of_user.php">Back to home</a>
    <form  method="post" enctype = "multipart/form-data" id = "form">
        <input type="hidden" name ="id" value = "<?php echo $row['id']?>">
        <label>
        
             <img src="image/<?php echo $row['pictute']?>" alt="" width = "200px" height = "200px">
             <br>
             <br>
             <!-- <input type="file" name="file" id=""> -->
             <!-- <small><?php echo $picerror; ?></small> -->
        
            <!-- </form> -->
        </label>
        <label for="">Title:
           <?php echo $row['title']?>
            
        </label>
        <label for="">Author :
     <?php echo $row['author'] ?>
           
                  
        </label>
        <label for="">Category:
      <?php echo $row['category'] ?>
        </label>
        <label for="">Price:
           <j>$<?php echo $row['price'] ?></j> 
        </label>
        <label for="">Quantity/Quantities Available:
        <?php echo $row['quantity'] ?>
        </label>
        <label for="">Date of Release:
            <?php echo $row['date_of_release'] ?>
        </label>
         <input type="hidden" name="upd" value = "<?php echo $row['id']?>">
        <!-- <button type="submit"  name = "submit">Update <i class = "fa-solid fa-pen"></i></button>
       <small><?php echo $fill; ?></small> -->
    </form>
    <?php
    }
}
    ?>
</body>
</html>
