<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'database_configuration.php';

$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT nome_insegnamento, nome_docente FROM insegnamenti WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$favorites = [];
while ($row = $result->fetch_assoc()) {
    $favorites[] = $row;
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Studium UniCT </title>
    <link rel="stylesheet" href="profilo.css"/>
  </head>
  
    <nav></nav>
    <div class='red'></div>
    <body>
      <article>
    
        <div class="container">
        <img class='studium' src="https://studium.unict.it/dokeos/2024/main/css/dokeos2_unict/studiumbanner2013_1.png" />  
        <img class='studenti' src="https://studium.unict.it/dokeos/2024/main/css/dokeos2_unict/studiumbanner2013_2.jpg" />
        </div>

       <section>
          <br><p><strong>UTENTE</strong><h1></h1>
          <ol class='utente'><br>
          <p class='dip3'><font>&#9654</font><a href='gestione_insegnamenti.php'>Gestione degli insegnamenti</a></p><br>
          <p class='dip3'><font>&#9654</font><a href='logout.php'>Logout</a></p>
          </ol>
          </p>
         
          <p><strong>APP MOBILE </strong><h1></h1>
            <a href='https://play.google.com/store/apps/details?id=unict.cea.studium&hl=it&pli=1'><img class='googleplay' src="https://en.logodownload.org/wp-content/uploads/2019/06/get-it-on-google-play-badge.png" /></a><br>
            <a href='https://apps.apple.com/it/app/studium-unict/id1510024640'><img class='appstore' src="https://logos-download.com/wp-content/uploads/2016/06/Download_on_the_App_Store_logo.png" /></a><br><br><br><br>
          </p>

       <div class='container2'>   
       <ul>
       <p><strong>INSEGNAMENTI</strong></p><br>
           <?php foreach ($favorites as $favorite): ?>
              <li>
                <p class='insegnamenti'><?php echo htmlspecialchars($favorite['nome_insegnamento']);?> <br> <?php echo htmlspecialchars($favorite['nome_docente']); ?>
                </p><br>
              </li>
              <?php endforeach; ?>
           </ul>
        </div>
       </section>
        
        <footer><div class='blank'><br> <strong>Amministratore: <a class='ammin' href='http://www.dieei.unict.it'>Studium.UniCT Amministratore</a></strong></div>
          <div class='redfooter'></div>
        </footer>
    </article>
  </body>
</html>

