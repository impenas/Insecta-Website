<?php

include("connect.php");

$id=$_POST['id'];

$query = mysqli_query($conn, "SELECT * FROM menu_almoco WHERE id=$id");

while($result = mysqli_fetch_array($query)){
    $ementa = $result['ementa'];
    $preco = $result['preço'];
}

$conn->close();

?>

<html>
    <body>
        <a href="menu_almoco.php"> Menu </a>
        <form method="POST" action="update_almoco.php">
            <p>ID: <?php echo $_POST['id']; ?> </p>
            Ementa: <input type="text" name= "ementa" value="<?php echo $ementa; ?>"><br><br>
            Preço <input type="text" name="preço" value="<?php echo $preco;?>"><br><br>
            <input type="hidden" name="id" value=<?php echo $_POST['id'];?> >
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>