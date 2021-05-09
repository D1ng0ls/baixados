<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <title>Baixados</title>
</head>

<body>
    <header>
        <div class="cabecao">
            <h1>DOWNLOAD</h1>
            <h2>Baixar arquivos:</h2>
        </div>
    </header>

    <div class="arquivos">
        <?php
            $path = "../uploads/";

            // Loop que gera registros
            foreach (new DirectoryIterator($path) as $fileInfo) {

                if($fileInfo->isDot()) continue;

                // Imprime linhas de registros
                echo "<a href='".$path.$fileInfo->getFilename()."' download='".$path.$fileInfo->getFilename()."'<h3>".$fileInfo->getFilename()."</h3></a><br>";
            }
        ?>
    </div>

    <div class="aulas">
        <form action="baixar.php" method="post">
            <input type="submit" id="btn2" name="apagar" value="Apagar tudo">
        </form>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['apagar']))
        {
            ApagaDir("../uploads");
        }

        function ApagaDir($dir) {
            if($objs = glob($dir."/*")){
                foreach($objs as $obj) {
                is_dir($obj)? ApagaDir($obj) : unlink($obj);
                }
            }
            rmdir($dir);
        }
        
        mkdir("../uploads");
    ?>
        
</body>

</html>