<?php
session_start();
require_once(".\database.php");
$erreur = array();

$auteur_ajoute = 0;
if(isset($_POST['nombre_auteur'])){
for($i=1;$i<$_POST['nombre_auteur'];$i++){

$case_nom = 'nom'.$i;
$case_prenom = 'prenom'.$i;
$case_laboratoire = 'laboratoire'.$i;
$case_organisation = 'organisation'.$i;

if(empty($_POST[$case_nom])) $erreur[$case_nom] = "Veuillez saisir le nom de l'auteur.";
if(empty($_POST[$case_prenom])) $erreur[$case_prenom] = "Veuillez saisir le prénom de l'auteur.";
if(empty($_POST[$case_laboratoire])) $erreur[$case_laboratoire] = "Veuillez chosir un laboratoire de recherche.";
if(empty($_POST[$case_organisation])) $erreur[$case_organisation] = "Veuillez saisir votre organisation.";


if(!empty($_POST[$case_nom])&&!empty($_POST[$case_prenom])&&!empty($_POST[$case_laboratoire])&&!empty($_POST[$case_organisation])){

$test_auteur_requete = 'Select * from chercheur where nom = "'.$_POST[$case_nom].'" and prenom ="'.$_POST[$case_prenom].
                       '" and laboratoire ="'.$_POST[$case_laboratoire].'" and organisation ="'.$_POST[$case_organisation].'"';
$test_auteur_resultat = mysqli_query($database, $test_auteur_requete);
$test_auteur = mysqli_fetch_array($test_auteur_resultat);

if(empty($test_auteur)){
    $insertion_auteur_requete = "insert into chercheur(nom,prenom,laboratoire,organisation) values('".$_POST[$case_nom]."','".$_POST[$case_prenom]."','"
                             .$_POST[$case_laboratoire]."','".$_POST[$case_organisation]."');";
    $insertion_auteur_resultat = mysqli_query($database, $insertion_auteur_requete);
    $auteur_ajoute = 1;
}
}
}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		 Ajouter des auteurs 
	</title>
</head>
       <?php
       if($auteur_ajoute==0||isset($erreur[$case_nom])||isset($erreur[$case_prenom])||isset($erreur[$case_laboratoire])||isset($erreur[$case_organisation])){
           print('<body style="background-color: #3498db">
   <div class ="container" style="padding-top: 10px">
       
       <h1 style="color: whitesmoke">Ajouter des auteurs</h1><br>
           <div  style="color:whitesmoke" text-align: left valign: center padding-right:20px>Indiquez les informations des auteurs puis validez de nouveau l\'ajout de la publication.</div><br>
   <form class ="form-horizontal" name ="inscription" method="post" action="nouveau_auteur.php?');
           foreach($_GET as $nom => $prenom){             if(!isset($chaine)) $chaine = $nom."=".$prenom;
            else $chaine .=  "&".$nom."=".$prenom;
           }
           echo $chaine;
           echo('">');
       $i=1;
       foreach($_GET as $nom => $prenom){
       $case_nom = 'nom'.$i;
       $case_prenom = 'prenom'.$i;
       $case_laboratoire = 'laboratoire'.$i;
       $case_organisation = 'organisation'.$i;
       print('
           <div class ="container">
           <table>
           <tbody>
           <h2 style="color: whitesmoke">Auteur '.$i .':</h1><br>
           <tr>
       <td class="libelle"><label for="label">Nom</label></td>
       <td><input class="form-control" name="nom'.$i.'" size="30" type="text" id = "nom" value="'.$nom.'"></input></td>
       <td><span class="erreur" id="erreur_nom">');
       if(isset($erreur[$case_nom])) echo $erreur[$case_nom];
       print('</span></td>
       </tr>
           
       <tr>
       <td class="libelle"><label for="label">Prénom</label></td>
       <td><input class="form-control" name="prenom'.$i.'" size="30" type="text" id = "prenom" value="'.$prenom.'"></input></td>
       <td><span class="erreur" id="erreur_prenom">');
       if(isset($erreur[$case_prenom])) echo $erreur[$case_prenom];
       print('</span></td>
       </tr>
           
       <tr>
       <td class="libelle"><label for="label">Laboratoire de recherche</label></td>
       <td><select class="form-control" name="laboratoire'.$i.'" id = "laboratoire">
       <option selected disabled="">Choisir
       <option>CREIDD
       <option>ERA
       <option>GAMMA3
       <option>LASMIS
       <option>LM2S
       <option>LNIO
       <option>LOSI
       <option>Tech-CICO</select></td>
       <td><span class="erreur" id="erreur_laboratoire">');
       if(isset($erreur[$case_laboratoire])) echo $erreur[$case_laboratoire];
       print('</span></td>
       </tr>

       <tr>
       <td class="libelle"><label for="label">Organisation</label> </td>
       <td><input class="form-control" name="organisation'.$i.'" size="30" type="text" id="organisation"></input></td>
       <td><span class="erreur" id="erreur_organisation">');
       if(isset($erreur[$case_organisation])) echo $erreur[$case_organisation];
       print('</span></td>
       </tr>
       </tbody>
       </table>
       </div>
       ');
       $i++;
       }
       print('</p><br>
       <input type = "hidden" name="nombre_auteur" value = "'.$i.'">
       <input class ="btn btn-outline btn-lg" type="submit" value="Ajouter les auteurs" >
       </form>');
       }
       else print('<body style="background-color: #3498db">
               <div class ="container"><h2 style="color: whitesmoke">Les auteurs ont été ajoutés</h2>
               <center><button type="button" class = "btn btn-outline btn-lg" onClick="window.close();" >Fermer</button></center></div>
               </body>');
       ?>
    
<!-- #global --></body>
</html>