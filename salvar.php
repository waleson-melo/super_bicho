<?php

if ((isset($_POST['nome_user']))&&(!empty($_POST['nome_user']))){

    //porta, usuário, senha, nome data base
    //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
    $conexao = mysqli_connect("localhost", "root", "", "bd_superbicho") or die("Erro na conexão com banco de dados " . mysqli_error($conexao));
 
   //Abaixo atribuímos os valores provenientes do formulário pelo método POST
   $nome = $_POST['nome_user'];
   $email = $_POST['email_user'];
 
    $string_sql = "INSERT INTO usuario (nome, email) VALUES ('{$nome}','{$email}')";
    $insert_member_res = mysqli_query($conexao, $string_sql);
    if(mysqli_affected_rows($conexao)>0){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo "<p>Dados do usuário salvos com sucesso</p>";
        echo '<a href="index.php">Voltar para formulário de cadastro</a>'; //Apenas um link para retornar para o formulário de cadastro
    } else {
        echo "Erro, não foi possível inserir no banco de dados";
    }
    mysqli_close($conexao); //fecha conexão com banco de dados
 }else{
     echo "Por favor, preencha os dados";
 }
 ?>