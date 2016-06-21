<?php
session_start();
require_once("espace_membre/database.php");
$erreur_connection = "";
if(isset($_POST['deconnexion'])){
if($_POST['deconnexion']==1) {
    session_destroy ();
    header('Location:publications.php');
}}

if(!empty($_POST['email'])&&!empty($_POST['mdp'])){
        
        $connexion_requete= "select nom, prenom, email from compte, chercheur where mdp = '".$_POST['mdp']."' AND email = '".$_POST['email']."' AND id_chercheur = id_compte;";
        $connexion_resultat = mysqli_query($database, $connexion_requete);
        $connexion = mysqli_fetch_array($connexion_resultat);
        
        if(!empty($connexion['nom'])){
        $_SESSION['nom'] = $connexion['nom'];
        $_SESSION['prenom'] = $connexion['prenom'];
        $_SESSION['email'] = $connexion['email'];
        }
        else $erreur_connection = "<label for='label'>Mot de passe incorrect</label>";
        }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Publications - Institut Charles Delaunay</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <script>
$(document).ready(function(){
    $('#connexion_bouton').popover({
        container:'body',
        html: true,
        content: $('#connexion').html()})
});
</script>
    
</head>


<body>
    
<div class="container hide" id = "connexion">
    <?php if(empty($_SESSION['nom'])&&empty($_SESSION['prenom'])&&empty($_SESSION['email'])){
    print('<form  name ="connexion" method="post" action="index.php">
    <tbody>
    <tr>
    <td><label for="label">Email</label></td>
    <td><input maxlength="30" class="form-control" name="email" size="50" type="text" id = "email"></input></td>
    </tr>
    <tr>
    <td><label for="label">Mot de passe:</label></td>
    <td><input maxlength="20" class="form-control" name="mdp" size="50" type="password" id = "mdp"></input></td>
    </tr>
    <tr><span class="erreur">');
    if($erreur_connection!="") echo $erreur_connection;
    print('</span><br>
    <td><button class ="btn btn-success btn-sm" type="submit">Connexion</button></td>
    <td><a href="espace_membre/inscription.php">
    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Inscription</button></td></a>
    </tr> 
    </tbody>
    </table></form>');}
    else print('<form  name ="connexion" method="post" action="index.php"><tbody><tr>
                <input type="hidden" name = "deconnexion" value = 1></input>
                <a href="espace_membre/mon_compte.php">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Mon Compte</button></td></a></tr>
                <tr><button class ="btn btn-success btn-sm" type="submit">Déconnexion</button></tr>'); ?></div>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./index.php">Institut Charles Delaunay</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
<form class="navbar-form" name ='recherche'> 
  <ul class="nav navbar-nav">
     <li><input type="text" class="form-control" placeholder="Auteur" name="auteur"></li>
     
     <li><select class="form-control" name="laboratoire" id = "laboratoire">
       <option selected disabled="">Laboratoire
       <option>CREIDD
       <option>ERA
       <option>GAMMA3
       <option>LASMIS
       <option>LM2S
       <option>LNIO
       <option>LOSI
       <option>Tech-CICO</select></li>
       
       <li><a href="#">Depuis</a></li>
       
       <li><select class="form-control" name="laboratoire" id = "Année">
       <option selected disabled="">Année
       <option>CREIDD
       <option>ERA
       <option>GAMMA3
       <option>LASMIS
       <option>LM2S
       <option>LNIO
       <option>LOSI
       <option>Tech-CICO</select></li>
       
       <li style="padding-top: 18px; padding-left: 10px"><input class ="checkbox" type="checkbox" name="date_tri"></li>
       
       <li><a href="#">Trier par date</a></li>
       
       <li><button class ="btn" type="submit">Rechercher</button></li>
       
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recherche avancée <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Collaborations extérieurs <br>du chercheur choisi</a></li>
          <li><a href="#">Co-auteurs du chercheur <br>choisi</a></li>          
        </ul>
      </li>
      <li>
      <a href="#" data-placement="bottom" id="connexion_bouton">
      <?php if(empty($_SESSION['nom'])&&empty($_SESSION['prenom'])&&empty($_SESSION['email'])) echo "Connexion";
      else echo "Mon compte";?></a>
      </li>     
    </ul>
  </form>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container" style="padding-top: 140px">                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Auteurs</th>
        <th>Titre</th>
        <th>Catégorie</th>
        <th>Label</th>
        <th>Année</th>
        <th>Lieu</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>      <tr>
        <td>Anna</td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

<!-- #global --></body>
</html>