<?php require_once './database/connection.php';?>


<?php  
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
}else{
    header('Location, ./index.php');
}
// print_r($_GET['id']);
// die();


$sql = "SELECT * FROM `liabrary` WHERE `id` = $id";

$result = $conn->query($sql);
$book = $result->fetch_assoc();

$error = '';
$success = '';
$sno = $book['s_no'];
$name = $book['name'];
$author = $book['author'];
$price = $book['price'];
$quantity = $book['quantity'];
$publish = $book['publish'];
$publisher = $book['publisher'];

if(isset($_POST['submit'])){
    $sno = htmlspecialchars($_POST['sno']);
    $name = htmlspecialchars($_POST['name']);
    $author = htmlspecialchars($_POST['author']);
    $price = htmlspecialchars($_POST['price']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $publish = htmlspecialchars($_POST['publish']);
    $publisher = htmlspecialchars($_POST['publisher']);


    if (empty($sno)) {
        $error = "Enter S.No";
    } elseif (empty($name)) {
        $error = "Enter Book Name";
    } elseif (empty($author)) {
        $error = "Enter Book Author";
    } elseif (empty($price)) {
        $error = "Enter Book Price";
    } elseif (empty($quantity)) {
        $error = "Enter Book Quantity";
    } elseif (empty($publish)) {
        $error = "Enter Publishing Year";
    } elseif (empty($publisher)) {
        $error = "Enter Book Publisher";
    } else {

        $sql = "SELECT * FROM `liabrary` WHERE `s_no` = '$sno' AND `id` != $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {

            $sql = "UPDATE `liabrary` SET `s_no`='$sno',`name`='$name',`author`='$author',`price`='$price',`quantity`='$quantity',`publish`='$publish',`publisher`='$publisher' WHERE `id` = $id";
            $result = $conn->query($sql);

            if ($result) {
                $success = "Book Successfuly Added !";
            } else {
                $error = "Book has been failed to add !";
            }
        } else {
            $error = "S.No already exist!";
        }
}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit | library</title>
    <link rel="stylesheet" href="./bootstrap.css">
</head>

<body class="bg-warning font-monospace">
    <div class="container">
        <div class="row">
            <h3 class="text-center mt-5 text-primary font-monospace">Edit <?php echo $name?></h3>
            <div>
                <div class="text-center bg-danger text-light fw-bolder m-auto col-md-2"><b><?php echo $error ?></b></div>
            </div>
            <div>
                <div class="text-center bg-success text-light fw-bolder m-auto col-md-2"><b><?php echo $success ?></b></div>
            </div>


        </div>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>?id=<?php echo $id; ?>" method="post">
        <div class="col-md-6 m-auto mt-5 fw-bolder ">
            <label for="sno">S.No</label>
            <input type="number" name="sno" class="form-control col-md-6 border-secondary-subtle" value="<?php echo $sno; ?>" placeholder="Enter the Serial No">


            <label for="name">Book name</label>
            <input type="text" name="name" class="form-control col-md-6 border-secondary-subtle" value="<?php echo $name; ?>" placeholder="Enter the Book name">

            <label for="author">Author</label>
            <input type="text" name="author" class="form-control col-md-6 border-secondary-subtle" value="<?php echo $author; ?>" placeholder="Enter the Author of the book">

            <label for="price">Price Rs</label>
            <input type="number" name="price" class="form-control col-md-6 border-secondary-subtle" value="<?php echo $price; ?>" placeholder="Enter the Price">

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control col-md-6 border-secondary-subtle" value="<?php echo $quantity; ?>" placeholder="How much books there have?">

            <label for="publish">Publishing year</label>
            <input type="text" name="publish" class="form-control col-md-6 border-secondary-subtle" value="<?php echo $publish; ?>" placeholder="Enter the publishing year.">

            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" class="form-control col-md-6 border-secondary-subtle" value="<?php echo $publisher; ?>" placeholder="who published this book">

            <div class="col-md-12 text-center mt-5">
                <input type="submit" name="submit" class="btn btn-primary" value="update">
                <a href="./index.php"><input class="btn btn-success col-md-1" value="Back" readonly></a>
            </div>
        </div>
    </form>







    <script src="./bootstrap.js"></script>
</body>

</html>