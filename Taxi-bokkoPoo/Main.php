<?php
require_once 'Databases.php';
require_once 'utilisateur.php';
$db = new Databases();
if (isset($_POST)) {
    if (isset($_POST["inscription"])) {
        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
        $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
        $email = $_POST['email'];
        $pas = $_POST['motdepasse'];
        $verifpass = $_POST['confirmermotdepasse'];
        $tel = $_POST['telephone'];
        $mailNotExist = $db->VerificationMAil($email);
        $pattern = '/\d/';
        preg_match_all($pattern, $nom, $matches);
        preg_match_all($pattern, $prenom, $matchs);
        if ((count($matches[0]) == 0 && count($matchs[0]) == 0) && (strlen($nom) >= 2 && strlen($prenom) > 3)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (empty($mailNotExist)) {

                    if (strlen($pas) >= 8 && $pas == $verifpass) {

                        if (substr($tel, 0, 2) == "77" || substr($tel, 0, 2) == "70" || substr($tel, 0, 2) == "78" || substr($tel, 0, 2) == "76" || substr($tel, 0, 2) == "75" && strlen($tel) == 9) {
                            $passw = md5($pas);
                            $dateActuelle = date("Y-m-d");
                            $newuser = new Utilisateur($nom, $prenom, $email, $passw, $tel, $dateActuelle);
                            $db->ajouterUtilisateur($newuser);
                        }
                    }
                }
            }
        }
    } else {
        if (isset($_POST['connect'])) {
            $email = $_POST['email'];
            $pas = $_POST['motdepasse'];
            $verifcator = $db->VerificationMAil($email);
            if ($verifcator && md5($pas) === $verifcator[0]['motdepasse']) {
                $_SESSION['nom'] = $verifcator[0]["nom"];
                $_SESSION['prenom'] = $verifcator[0]["prenom"];
                echo '<style>body {
                    margin: 0;
                    padding: 0;
                    font-family: Arial, sans-serif;
                }
                
                .background {
                    background-image: url("background.jpg");
                    background-size: cover;
                    background-position: center;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                
                .profile {
                    background-color: white;
                    padding: 20px;
                    border-radius: 10px;
                    text-align: center;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                }
                
                .profile img {
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                }
                
                .profile h1 {
                    margin: 10px 0;
                    font-size: 24px;
                }
                
                .profile p {
                    font-size: 16px;
                    margin: 5px 0;
                }
                .btn-deconnexion {
                    background-color: #FF0000; /* Couleur rouge */
                    color: #fff; /* Couleur du texte en blanc */
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
                
                .btn-deconnexion:hover {
                    background-color: #FF3333; /* Couleur rouge légèrement plus foncée au survol */
                }
                
                </style>';
                echo '<!DOCTYPE html>
                <html lang="fr">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Profil Utilisateur</title>
                    <link rel="stylesheet" href="styles.css">
                </head>
                <body>
                    <div class="background">
                      <form method="post" action="FirstPage.php">
                        <div class="profile">
                            <img src="bla.jpg" alt="">
                            <h1>Hello Nous Somme Ravis De Vous Revoir</h1>
                            <h1>Nom: ' . $_SESSION["nom"] . '</h1>
                            <h1>prenom: ' . $_SESSION["prenom"] . '</h1>
                            
                        </div>
                        <button class="btn-deconnexion" name="leye">Déconnexion</button>
                        </form>
                    </div>
                </body>
                </html>
                ';
                if (isset($_POST['leye'])) {
                    session_unset();
                    header('location:FirstPage.php');
                }
            }
        }
    }
}
