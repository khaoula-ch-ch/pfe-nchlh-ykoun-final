<?php

$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
session_start();
$acc_dir = $_SESSION['acc_dir'];
$acc_dep = $_SESSION['acc_dep'];

if(!isset($acc_dep)){
   header('location:index.php');
};



?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet"  href="styleadmin.css">
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
</head>
<body>

    <div class="container">    
        <div class="naVbar"><br>
            <naV>
                <ul>
                <li> 
                 <a href="accueil.php" >
		   <img src="home.png" width="42" height="42" class="rounded-circle" >          
	</a>	         
              </li>
                  
              <li> 
			     <a href="deconnexion.php" >
		             <img src="eteindre.png" width="52" height="42" class="rounded-circle" >
		         </a>
              </li>
                  <li> 
                     <a href="profil.php" >
                         <img src="utilisateur-de-profil.png" width="42" height="42" class="rounded-circle" >
                     </a>
                  </li>
               </ul>
            </naV>
        </div>
        <div class="formulaire">
        <form method="post">
          <h2> Les Courriers Départs</h2>
            <br><br>
 
        <?php

$sql = "SELECT * FROM `courrierarrive` WHERE type='depart' AND etat='valider' ";

if ($result = mysqli_query($conn, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {?>
     <div class="wrapper">   
    <div class="outer">
      <div class="car" >
        <div class="content">
          <div class="img"><img src="en.jpg" alt=""></div>
          <div class="details"><a href="cour.php?id=<?php echo $row[0] ; ?>">
            <span class="name"><?php echo $row[6] ; ?></span>
            <p><?php echo $row[9] ; ?></p><br>
            <a href="pdf.php?id=<?php echo $row[0] ; ?>"><?php echo $row[12] ; ?>
          </div></a>
        </div>
        <h4><?php echo $row[4] ; ?></h4>
      </div></div></div><br>
    
   



 
  <?php
      }
    }
     
  mysqli_free_result($result);



         
?>

 </form>
    </div>







</body>
</html>