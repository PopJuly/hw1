<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'database_configuration.php';

$articles = [
    ["name" => "BIOCHIMICA DEL METABOLISMO PRIMARIO E SECONDARIO DELLE PIANTE - Curriculum unico - Anno: 1 - Primo semestre", "docente" => "9797481 - VANELLA LUCA"],
    ["name" => "BIOTECNOLOGIE DELLE COLTURE ERBACEE - Curriculum unico - Anno: 2 - Primo semestre", "docente" => "1001774 - TESTA GIORGIO"],
    ["name" => "BIOTECNOLOGIE DELLE PRODUZIONI ANIMALI - AUTENTICAZIONE DEI PRODOTTI DI ORIGINE ANIMALE - Curriculum unico - Anno: 1 - Primo semestre", "docente" => "9796785 - BIONDI LUISA"],
    ["name" => "BIOTECNOLOGIE DELLE PRODUZIONI ANIMALI - GENETICA E GENOMICA NEL MIGLIORAMENTO DELLE PRODUZIONI ANIMALI - Curriculum unico - Anno: 1 - Primo semestre", "docente" => "9796785 - TUMINO SERENA"]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aggiungi_insegnamento'])) {
    $userId = $_SESSION['user_id'];
    $itemName = $_POST['item_name'];
    $docente = $_POST['nome_docente'];

    $stmt = $conn->prepare("INSERT INTO insegnamenti (user_id, nome_insegnamento, nome_docente) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $itemName, $docente);

    if ($stmt->execute()) {
        //echo "Preferito aggiunto con successo!";
        header("Location: gestione_agricoltura.php");
    } else {
        echo "Errore: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studium UniCT</title>
    <link rel="stylesheet" href="gestione_insegnamenti.css"/>
</head>
<body>
    <nav></nav>
    <div class='red'></div>
    <article>
        <div class="container">
            <img class='studium' src="https://studium.unict.it/dokeos/2024/main/css/dokeos2_unict/studiumbanner2013_1.png" />  
            <img class='studenti' src="https://studium.unict.it/dokeos/2024/main/css/dokeos2_unict/studiumbanner2013_2.jpg" />
        </div>
        
        <section>
            <div class='barra_controllo'>
                <a class='barra_controllo' href='home.php'>Home</a>
                <a class='barra_controllo' href='profilo.php'>Profilo</a>
            </div><br>
          
            <div class='avviso'>
                Nel caso in cui un insegnamento non sia presente, non sia ancora stato attivato dal docente o in caso di insegnamenti omonimi/che 
                differiscono solo per il Curriculum, prima di iscriversi chiedere al docente circa l'insegnamento corretto.
            </div><br>

            <h1>Categorie degli insegnamenti</h1>

            <a class='insegnamenti' href='gestione_agricoltura.php'>Risali di una categoria</a>


            <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <p><?php echo htmlspecialchars($article['name']); ?><br><?php echo htmlspecialchars($article['docente']); ?></p>

                <form method="POST" action="gestione_agricoltura1.php">
                    <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($article['name']); ?>">
                    <input type="hidden" name="nome_docente" value="<?php echo htmlspecialchars($article['docente']); ?>">
                    <button type="submit" name="aggiungi_insegnamento">Isciviti</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
          
            <br><br>
        </section>
        <footer>
            <div class='blank'><br>
                <strong>Amministratore: <a class='ammin' href='http://www.dieei.unict.it'>Studium.UniCT Amministratore</a></strong>
            </div>
            <div class='redfooter'></div>
        </footer>
    </article> 
</body>
</html>