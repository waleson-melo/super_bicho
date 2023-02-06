<?php
    include("conexao.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username e password enviado do formuçário
    
    $myusername = mysqli_real_escape_string($conn,$_POST['login_user']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['senha_user']); 
    
    $sql = "SELECT * FROM usuario WHERE login = '$myusername' and senha = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    //Se o resultado corresponder a $myusername e $mypassword, a linha da tabela deve ter 1 linha
        
    if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        
        header("location: src/view/dashboard.php");
    }else {
        $error = "Dados de Login Invalidos";
        header("location: index.php");
    }
    }

?>