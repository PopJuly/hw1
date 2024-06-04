<?php
// Inizio della sessione
session_start();

// Inclusione della configurazione del database
include 'database_configuration.php';

// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizzazione e validazione dei dati
    $username = $conn->real_escape_string(trim($_POST["nome_utente"]));
    $password = password_hash(trim($_POST["password_utente"]), PASSWORD_BCRYPT);

    // Query SQL per l'inserimento dei dati
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    // Preparazione della dichiarazione
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    // Bind dei parametri
    $stmt->bind_param("ss", $username, $password);

    // Esecuzione della dichiarazione
    if ($stmt->execute() === true) {
        // Recupera l'ID dell'utente appena inserito
        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;  
        header("Location: home.php");
        exit();
    } else {
        echo "Errore: " . $stmt->error;
    }

    // Chiusura della dichiarazione
    $stmt->close();
}

// Chiusura della connessione al database
$conn->close();
?>

 
 
 <!DOCTYPE html>
<html>
<head>
  <meta name="viewport"
content="width=device-width, initial-scale=1">
<title> Studium UniCT </title>
   <link rel="stylesheet" href="mhw4.css"/>
   <script src="mappa.js" defer></script>
   <script src="mhw4.js" defer></script>

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
             
    <br><p><strong>ANNO ACCADEMICO </strong> <h1></h1>

    <select name='anno_accademico'>
      <option value = '2023-24'>2023/2024</option>
      <option value = '2022-23'>2022/2023</option>
      <option value = '2021-22'>2021/2022</option>
      <option value = '2020-21'>2020/2021</option>
      <option value = '2019-20'>2019/2020</option>
      <option value = '2018-19'>2018/2019</option>
      <option value = '2017-18'>2017/2018</option>
      <option value = '2016-17'>2016/2017</option>
      <option value = '2015-16'>2015/2016</option>
      <option value = '2014-15'>2014/2015</option>
    </select>

    
      <div class="boxdipartimenti">
        <strong><p class="dipartimenti">DIPARTIMENTI</strong></p><h1></h1>
       <p class="dip2"><a class="dip2" href='agricoltura.php'><font>&#9654</font> AGRICOLTURA, ALIMENTAZIONE E AMBIENTE (Di3A)<br></a></p>
       <p class="dip2"><a class="dip2" href='alta_scuola.php'><font>&#9654</font> Alta Scuola di Formazione degli Insegnanti (ASFI)<br></a></p>       
       <p class="dip2"><a class="dip2" href='chirurgia.php'><font>&#9654</font> CHIRURGIA GENERALE E SPECIALITÀ MEDICO-CHIRURGICHE<br></a></p>
       <p class="dip2"><a class="dip2" href='economia.php'><font>&#9654</font> ECONOMIA E IMPRESA<br></a></p>
       <p class="dip2"><a class="dip2" href='fisica.php'><font>&#9654</font> FISICA E ASTRONOMIA "Ettore Majorana"<br></a></p>
       <p class="dip2"><a class="dip2" href='giurisprudenza.php'><font>&#9654</font> GIURISPRUDENZA<br></a></p>
       <p class="dip2"><a class="dip2" href='dicar.php'><font>&#9654</font> INGEGNERIA CIVILE E ARCHITETTURA (DICAR)<br></a></p>
       <p class="dip2"><a class="dip2" href='dieei.php'><font>&#9654</font> INGEGNERIA ELETTRICA ELETTRONICA E INFORMATICA<br></a></p>
       <p class="dip2"><a class="dip2" href='matematica.php'><font>&#9654</font> MATEMATICA E INFORMATICA<br></a></p>
       <p class="dip2"><a class="dip2" href='medicina.php'><font>&#9654</font> MEDICINA CLINICA E SPERIMENTALE<br></a></p>
       <p class="dip2"><a class="dip2" href='biologia.php'><font>&#9654</font> SCIENZE BIOLOGICHE, GEOLOGICHE E AMBIENTALI<br></a></p>
       <p class="dip2"><a class="dip2" href='biomedica.php'><font>&#9654</font> SCIENZE BIOMEDICHE E BIOTECNOLOGICHE<br></a></p>
       <p class="dip2"><a class="dip2" href='chimica.php'><font>&#9654</font> SCIENZE CHIMICHE<br></a></p>
       <p class="dip2"><a class="dip2" href='farmacia.php'><font>&#9654</font> SCIENZE DEL FARMACO E DELLA SALUTE<br></a></p>
       <p class="dip2"><a class="dip2" href='formazione.php'><font>&#9654</font> SCIENZE DELLA FORMAZIONE<br></a></p>
       <p class="dip2"><a class="dip2" href='mediche.php'><font>&#9654</font> SCIENZE MEDICHE, CHIRURGICHE E TECNOLOGIE AVANZATE G.F. INGRASSIA<br></a></p>
       <p class="dip2"><a class="dip2" href='politica.php'><font>&#9654</font> SCIENZE POLITICHE E SOCIALI<br></a></p>
       <p class="dip2"><a class="dip2" href='umanistica.php'><font>&#9654</font> SCIENZE UMANISTICHE<br></a></p>
       <p class="dip2"><a class="dip2" href='architettura.php'><font>&#9654</font> STRUTTURA DIDATTICA SPECIALE DI ARCHITETTURA, SEDE DECENTRATA DI SIRACUSA<br></a></p>
       <!-- Codice per mappa cittadella -->
       <p class="mappa"><strong>MAPPA</strong></p>
       <section id="album-view">
       </section>
      <section id="modal-view" class="hidden">
      </section><br>
      
      
    </div><br></p><br>

        <!-- ENTRARE NEL SITO-->
        <p><strong>REGISTRAZIONE UTENTE</strong>
       <img class='info' src="https://www.location-etudiant.fr/_assets/detail_crous_resultat/div-aide/info_512pxGREY.png"/>
       <h1></h1></p>
       <form name='login' method='post'>
        NOME UTENTE <br><input type='text' name='nome_utente'  <?php if(isset($_POST["nome_utente"])){echo "value=".$_POST["nome_utente"];} ?>><br><br>
        
        PASSWORD <br><input type='password' name='password_utente' <?php if(isset($_POST["password_utente"])){echo "value=".$_POST["password_utente"];} ?>><br>
        <br><input id='entra' type='submit' value='ENTRA'><br>
       </form>

    
   

    <p><strong>IN EVIDENZA</strong><h1></h1><br><br>
    <ol>  
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

  <span class="login"><strong>LOGIN STUDENTI</strong><br>il login degli studenti deve avvenire con le credenziali (Codice Fiscale e password) del nuovo portale studenti Smart_edu. Se non è stata impostata una password, fare accesso al portale studenti con SPID o CIE e impostarla tramite le impostazioni.</span><br>
<p><strong>APP MOBILE </strong> <h1></h1>
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

