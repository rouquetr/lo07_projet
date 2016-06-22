<!DOCTYPE html>
<?php
session_start();
$erreur_connection = "";
if(isset($_POST['deconnexion'])){
if($_POST['deconnexion']==1) {
    session_destroy ();
    header('Location:index.php');
}}

if(!empty($_POST['email'])&&!empty($_POST['mdp'])){
    
        require_once("espace_membre/database.php");
        
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Accueil - Institut Charles Delaunay</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

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

<body id="page-top" class="index">
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
                <tr><button class ="btn btn-success btn-sm" type="submit">Déconnexion</button></tr></tbody>
    </table></form>'); ?></div>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Institut Charles Delaunay</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#labo">Nos Labos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Publications</a>
                    </li>
                    <li>
                        <a href="#" data-placement="bottom" id="connexion_bouton">
                        <?php if(empty($_SESSION['nom'])&&empty($_SESSION['prenom'])&&empty($_SESSION['email'])) echo "Connexion";
                              else echo "Bonjour ".$_SESSION['prenom'];?></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header style="background-image:url(img/utt.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"> 
                    <div class="intro-text">
                        <span class="name">Bienvenue</span>
                        <hr class="star-light">
                        <span class="skills">Site des publications de l'ICD</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="labo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Nos Laboratoires de recherche</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal1" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/CREIDD.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal2" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/ERA.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal3" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/GAMMA3.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal4" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/LASMIS.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal5" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/LM2S.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal6" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/LNIO.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal7" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/LOSI.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 labo-item">
                    <a href="#laboModal8" class="labo-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/labs/TechCICO.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Publications</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
                </div>
                <div class="col-lg-4">
                    <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="publications.php" class="btn btn-lg btn-outline">
                     Accéder aux publications
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>Nous localiser</h3>
                        <p>Institut Charles Delaunay, UMR CNRS 6281<br>Université de Technologie de Troyes<br>12 Rue Marie Curie<br>CS 42060 - 10004 Troyes CEDEX</p>
                    </div>
                    <!--<div class="footer-col col-md-5">
                    </div>-->
                    <div class="footer-col col-md-6">
                        <h3>Nous contacter</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="tel:0351591166" class="btn-social btn-outline"><i class="fa fa-fw fa-phone"></i></a>
                            </li>
                            <li>
                                <a href="mailto:pascal.royer@utt.fr" class="btn-social btn-outline"><i class="fa fa-fw fa-envelope"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="http://icd.utt.fr" class="btn-social btn-outline"><i class="fa fa-fw fa-at"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Lefeuvre & Rouquet 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="labo-modal modal fade" id="laboModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>CREIDD</h2>
                            <hr class="star-primary">
                            <img src="img/labs/CREIDD.png" width=400 class="img-responsive img-centered" alt="">
                            <p>Créé en septembre 2001, le Centre de Recherches et d'Etudes Interdisciplinaires sur le Développement Durable s’est donné pour fin de concourir à la mise en oeuvre du développement durable. Il s’agit en particulier de conduire des recherches sur certaines stratégies de découplage entre dynamisme socio-économique des sociétés humaines et croissance continue des flux de matière et d’énergie.</p>
                            <!--<ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>-->
                            <br/>
                            <a href = "./publications.php?laboratoire=CREIDD"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="labo-modal modal fade" id="laboModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>ERA</h2>
                            <hr class="star-primary">
                            <img src="img/labs/ERA.png" width=400 class="img-responsive img-centered" alt="">
                            <p>L’équipe « Environnement de Réseaux Autonomes » a été créée en janvier 2008. Elle a depuis développé une forte compétence dans le domaine des réseaux et de leur pilotage ainsi qu’une compétence reconnue dans les technologies multi-agents. Cette double compétence est sans conteste la force de l’équipe d’autant plus qu’elle s'appuie sur tout un ensemble d’outils de test et de simulation.</p>
                            <br/>
                            <a href = "./publications.php?laboratoire=ERA"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="labo-modal modal fade" id="laboModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>GAMMA3</h2>
                            <hr class="star-primary">
                            <img src="img/labs/GAMMA3.png" width=400 class="img-responsive img-centered" alt="">
                            <p>Créée en 2010, l’équipe-projet GAMMA3 (commune à l’UTT et à l’INRIA) étudie et développe des algorithmes de génération automatique de maillages, des outils pour la modélisation géométrique, ainsi que des méthodologies adaptatives avancées pour la simulation numérique.</p>
                            <br/>
                            <a href = "./publications.php?laboratoire=GAMMA3"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="labo-modal modal fade" id="laboModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>LASMIS</h2>
                            <hr class="star-primary">
                            <img src="img/labs/LASMIS.png" width=400 class="img-responsive img-centered" alt="">
                            <p>Le Laboratoire des Systèmes Mécaniques et d'Ingénierie Simultanée a été créé en septembre 1994, en même temps que l'Université de Technologie de Troyes. L'objectif du LASMIS est de développer des outils d'ingénierie mécanique pour la conception et la fabrication de composants critiques pour la sécurité et la sureté de fonctionnement. </p>
                            <br/>
                            <a href = "./publications.php?laboratoire=LASMIS"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="labo-modal modal fade" id="laboModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>LM2S</h2>
                            <hr class="star-primary">
                            <img src="img/labs/LM2S.png" width=400 class="img-responsive img-centered" alt="">
                            <p>Le Laboratoire de Modélisation et Sûreté des Systèmes a été créé en 1995. Il regroupe au sein d’une même équipe, des spécialistes en sûreté de fonctionnement et en surveillance des systèmes. Ce laboratoire est fortement impliqué dans le transfert de technologies, notamment avec PSA Peugeot-Citroën, Renault, Michelin, SNECMA, EDF, CEA, INERIS, …</p>
                            <br/>
                            <a href = "./publications.php?laboratoire=LM2S"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="labo-modal modal fade" id="laboModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>LNIO</h2>
                            <hr class="star-primary">
                            <img src="img/labs/LNIO.png" width=400 class="img-responsive img-centered" alt="">
                            <p>Créée en 1994, l’équipe du Laboratoire de Nanotechnologie et Instrumentation Optique utilise la lumière pour étudier, observer, manipuler, structurer la matière à l’échelle nanométrique. Ses recherches trouvent une application directe dans les nano-capteurs, l’étude du vivant (membrane cellulaire)...</p>
                            <br/>
                            <a href = "./publications.php?laboratoire=LNIO"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="labo-modal modal fade" id="laboModal7" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>LOSI</h2>
                            <hr class="star-primary">
                            <img src="img/labs/LOSI.png" width=400 class="img-responsive img-centered" alt="">
                            <p>Créé en 1996, le Laboratoire d’Optimisation des Systèmes Industriels est le laboratoire de l’UTT spécialisé dans l’étude des systèmes logistiques et de production. Son objectif est de développer des outils d'aide à la décision pour améliorer ces systèmes complexes, de la conception à l'exploitation, en termes d'efficacité et de compétitivité.</p>
                            <br/>
                            <a href = "./publications.php?laboratoire=LOSI"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="labo-modal modal fade" id="laboModal8" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>TechCICO</h2>
                            <hr class="star-primary">
                            <img src="img/labs/TechCICO.png" width=400 class="img-responsive img-centered" alt="">
                            <p>Créée en 1998, l’équipe Tech-CICO articule sciences humaines et sociales & sciences et techno- logies de l'information et de la communication. Les travaux de cette équipe portent sur l'analyse, la modélisation et l’instrumentation des activités coopératives.</p>
                            <br/>
                            <a href = "./publications.php?laboratoire=Tech-CICO"><button type="button" class="btn btn-default"><i class="fa fa-search"></i> Voir les publications</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

</body>

</html>
