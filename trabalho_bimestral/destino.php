<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pag 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background-color: #2F4F4F; /* Fundo escuro com tom azul */
            color: #ecf0f1; /* Texto claro */
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #2F4F4F /* Fundo semi-transparente */
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 90%;
            width: 90%; /* Ajuste de largura */
            text-align: center;
        }

        .image-container {
            display: flex;
            flex-direction: row; /* Alinha as imagens horizontalmente */
            justify-content: center; /* Centraliza as imagens */
            overflow-x: auto; /* Adiciona rolagem horizontal se necessário */
            gap: 10px;
        }

        img {
            width: 300px; /* Largura fixa para todas as imagens */
            height: 300px; /* Altura fixa para todas as imagens */
            object-fit: cover; /* Mantém a proporção e corta o excesso, se necessário */
            border: 3px solid #ecf0f1;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #0000; /* Azul claro */
            border: none;
            color: #ecf0f1; /* Texto claro */
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #006400; /* Azul escuro ao passar o mouse */
            transform: scale(1.05);
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(41, 128, 185, 0.5); /* Sombra azul ao focar */
        }

        h1 {
            margin: 20px 0;
            font-size: 24px;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php
        // Array contendo as imagens
        $imagens = [
            'img/bar.png',
            'img/sp.png',
            'img/san.png',
            'img/milan.png',
            'img/fla.png'
        ];       

        // Conta quantos valores há no array
        $countArray = count($imagens);
    ?>

    <div class="container p-5 mt-5 text-center">
        <div class="image-container">
            <?php

if (isset($_POST['exibir'])) {
    for ($i = 0; $i < $countArray; $i++) {
        $numImage = $imagens[$i];
        echo "<img src='$numImage' alt='Imagem'>";
    }
}


            if (isset($_POST['excluir'])) {
                array_pop($imagens);
                $countArray--; // Atualiza o número de imagens restantes
                for ($i = 0; $i < $countArray; $i++) {
                    $numImage = $imagens[$i];
                    echo "<img src='$numImage' alt='Imagem'>";
                }
            }

            if (isset($_POST['revert'])) {
                $array_invertido = array_reverse($imagens, false);
                for ($i = 0; $i < $countArray; $i++) {
                    $numImage = $array_invertido[$i];
                    echo "<img src='$numImage' alt='Imagem'>";
                }
            }

            if (isset($_POST['randomizar'])) {
                shuffle($imagens);
                for ($i = 0; $i < $countArray; $i++) {
                    $numImage = $imagens[$i];
                    echo "<img src='$numImage' alt='Imagem'>";
                }
            }

            if (isset($_POST['voltar'])) {
                header('Location: index.php');
                exit;
            }
            ?>
        </div>
        <form method="POST">
            <button type="submit" name="exibir">MOSTRAR</button>
            <button type="submit" name="adicionar">ESCONDER</button>
            <button type="submit" name="revert">INVERTER</button>
            <button type="submit" name="randomizar">ALEATORIZAR</button>
            <button type="submit" name="excluir">EXCLUIR</button>
            <button type="submit" name="voltar">VOLTAR</button>
        </form>
    </div>
</body>
</html>
