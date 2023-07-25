<?php require_once('./database/connection.php');?>
<?php

$sql = "SELECT * FROM `liabrary`";
$result = $conn->query($sql);

$books = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.css">
</head>

<body class="bg-warning ">
    <div class="container">
        <div class="row">
            <h3 class="text-center mt-5 text-primary mb-5 font-monospace">Books In Library !</h3>

            <div class="col-md-12 text-end"><a href="./create.php">
                <button class="btn btn-success mb-5 " readonly>Add New Book</button></a>
            </div>
            <table>
                <thead class="mb-5">
                    <tr class="border-1 bg-light p-5 bold ">
                        <th>S.No</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Publishing Year</th>
                        <th>Publisher</th>
                        <th>Action's</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($books){

                        foreach($books as $book){
                        ?>
                    <tr class="border-1 border-light  bg-dark text-light font-monospace">
                        <td><?php echo $book['s_no'];?></td>
                        <td><?php echo $book['name'];?></td>
                        <td><?php echo $book['author'];?></td>
                        <td><?php echo $book['price'];?> Rs</td>
                        <td><?php echo $book['quantity'];?></td>
                        <td><?php echo $book['publish'];?></td>
                        <td><?php echo $book['publisher'];?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $book['id'];?>"><input type="button" class="btn btn-primary" value="Edit" readonly></a>
                            <a href="delete.php?id=<?php echo $book['id'];?>"><input type="button" class="btn btn-danger" value="Delete" readonly></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="./bootstrap.js"></script>
</body>

</html>