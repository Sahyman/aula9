<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mega-Sena</title>
    <style>
        body {
            background-image: url("https://www.portaldebeltrao.com.br/storage/uploads/OTGTR8PagJp0O0TFr7wuhYXMnWKd73MXxelK3rpJ.jpg");
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            color:rgb(14, 84, 155);
        }
        label{
            color: white
        }
        .numeros {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            flex-wrap: wrap;
            justify-content: center;
        }
        .bola {
            background-color: #27ae60;
            color: white;
            font-size: 1.5em;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 2px 2px 6px rgba(11, 233, 89, 0.65);
        }
        .btn-sortear {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-sortear:hover {
            background-color: #3498db;
        }
        input[type="number"] {
            padding: 5px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 60px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .erro {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Sorteio da Mega-Sena</h1>

    <div class="numeros">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $quantidade = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 6;

                if ($quantidade >= 6 && $quantidade <= 10) {
                    $numeros = range(1, 60);
                    shuffle($numeros);
                    $resultado = array_slice($numeros, 0, $quantidade);
                    sort($resultado);

                    foreach($resultado as $numero){
                        echo "<div class='bola'>$numero</div>";
                    }
                } else {
                    echo "<p class='erro'>Por favor, escolha entre 6 e 10 números.</p>";
                }
            }
        ?>
    </div>

    <form method="POST">
        <label for="quantidade">Quantidade de números (6 a 10):</label>
        <input type="number" name="quantidade" id="quantidade" min="6" max="10" value="6" required>
        <button class="btn-sortear" type="submit">Sortear</button>
    </form>

</body>
</html>