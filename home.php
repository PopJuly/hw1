<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
      header("Location: index.php");
      exit();
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Studium UniCT </title>
    <link rel="stylesheet" href="home.css"/>
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
          <p class='dip3'><font>&#9654</font><a href='profilo.php'>Profilo di <?php echo htmlspecialchars($_SESSION['username']); ?></a></p><br>
          <p class='dip3'><font>&#9654</font><a href='logout.php'>Logout</a></p>
          </ol>
          </p>

          <p class='evidenza'><strong>IN EVIDENZA</strong></p><h1></h1>
          <ol><br>
          <p class='dip3'><font>&#9654</font> <a href='https://studium.unict.it/dokeos/tutorial_teams_integration.pdf'>Collegamento insegnamenti con Teams </a></p> <br><br>
          <p class='dip3'><font>&#9654</font> <a href='https://studium.unict.it/dokeos/tutorial_docenti_17-18.pdf'>Attivazione insegnamenti </a></p><br> 
          <p class='dip3'><font>&#9654</font> <a href='https://www.unict.it/'>Portale UniCT </a></p><br>
          <p class='dip3'><font>&#9654</font> <a href='https://studenti.smartedu.unict.it/Login?ReturnUrl=%2f'>Portale Studenti </a></p><br> 
          <p class='dip3'><font>&#9654</font> <a href='https://cas.unict.it/cas/login?service=https%3a%2f%2fdocenti.smartedu.unict.it%2fWorkFlow2011%2fLogon%2fLogon.aspx%3fReturnUrl%3d6a5b0c54-c925-45ff-a7ff-4067ee2f8b0c'>Portale Docenti</a></p><br>
          <p class='dip3'><font>&#9654</font> <a href='https://studium.unict.it/dokeos/tutorial_studenti.pdf'>Tutorial Studenti </a></p><br>
          <p class='dip3'><font>&#9654</font> <a href='https://studium.unict.it/dokeos/tutorial_docenti.pdf'>Tutorial Docenti </a></p><br>
          <p class='dip3'><font>&#9654</font> <a href='https://studium.unict.it/dokeos/Studium%20(export%20e%20import%20materiale%20didattico).pdf'>Tutorial export e import materiale didattico </a></p><br><br>
          <p class='dip3'><font>&#9654</font> <a href='https://studium.unict.it/dokeos/tutorial_prenotazioni.pdf'>Tutorial prenotazioni </a></p><br>
          </ol>

         
          <p><strong>APP MOBILE </strong><h1></h1>
            <a href='https://play.google.com/store/apps/details?id=unict.cea.studium&hl=it&pli=1'><img class='googleplay' src="https://en.logodownload.org/wp-content/uploads/2019/06/get-it-on-google-play-badge.png" /></a><br>
            <a href='https://apps.apple.com/it/app/studium-unict/id1510024640'><img class='appstore' src="https://logos-download.com/wp-content/uploads/2016/06/Download_on_the_App_Store_logo.png" /></a><br><br><br><br>
          </p>
       </section>
        
        <footer><div class='blank'><br> <strong>Amministratore: <a class='ammin' href='http://www.dieei.unict.it'>Studium.UniCT Amministratore</a></strong></div>
          <div class='redfooter'></div>
        </footer>
    </article>
  </body>
</html>
