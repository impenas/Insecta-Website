<?php

include("connect.php");

$email = $_POST['email'];
$pass = $_POST['pass'];
$pessoas = $_POST['pessoas'];
$contacto = $_POST['contacto'];
$horario = $_POST['horario'];
$data = $_POST['data'];

$result = mysqli_query($conn, "SELECT * FROM clientes WHERE email='" . $_POST["email"] . "'
  and pass = '" . $_POST["pass"] ."'");
$row = mysqli_fetch_array($result);

    if(is_array($row)){
        $query = "INSERT INTO reservas(email,pessoas,contacto,horario,data) VALUES ('$email','$pessoas','$contacto','$horario','$data')";
            if (mysqli_query($conn, $query)){
                echo 
                "<script>     
                alert('Reserva feita com sucesso!');
                window.location.replace('../index.php#reservas');
                </script>";
            }
            else{
        
            echo "Error Inserting record: " . $conn->error;
        }


    }

    else{
        
        echo "<script>     
        alert('Registe-se no site ou verifique se a password está correcta!')
        window.location.replace('../index.php#reservas');
        </script>";

    }
    
$conn->close();

?>