<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <title>Baixados</title>
</head>

<body>
    <header>
        <div class="cabecao">
            <h1>UPLOAD</h1>
            <h2>Enviar arquivos:</h2>
        </div>
    </header>

    <div class="aulas">
        <a href="pages/baixar.php">
            <h3>Baixar arquivos salvos</h3>
        </a>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <br>
            <h3>Adicionar arquivos:</h3>
            <input type="file" name="arquivo">
            <br><br>
            <input type="submit" id="btn2" name="enviar" value="Enviar">
        </form>
    </div>
    
    <?php 
        $dir = "uploads"; 

        $file = $_FILES["arquivo"]; 

        if(isset($_POST["enviar"])){
            if (move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])) {
                echo "<script> alert('Arquivo enviado com sucesso!');</script>";
            } else { 
                echo "<script> alert('Erro! O arquivo não pode ser enviado.');</script>";
            }
        }
    ?>
</body>

</html>