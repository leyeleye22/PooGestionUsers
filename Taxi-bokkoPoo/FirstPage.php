<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription et Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: black !important;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .form-group2 .half-width {
            width: 48%;
        }

        .form-group input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            width: 100%;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .facebook-button {
            text-align: center;
            margin-top: 20px;
        }

        .facebook-link {
            background-color: #1877f2;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><b>Inscription</b></h2>
        <form action="Main.php" method="post">
            <div class="form-group1">
                <div class="half-width">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="half-width">
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group2">
                <div class="half-width">
                    <label for="motdepasse">Mot de passe:</label>
                    <input type="password" id="motdepasse" name="motdepasse" required>
                </div>
                <div class="half-width">
                    <label for="confirmermotdepasse">Confirmer le mot de passe:</label>
                    <input type="password" id="confirmermotdepasse" name="confirmermotdepasse" required>
                </div>
            </div>
            <div class="form-group">
                <label for="telephone">Numéro de téléphone:</label>
                <div class="input-group">
                    <span class="input-group-addon">+221:</span>
                    <input type="tel" id="telephone" name="telephone" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="S'inscrire" name="inscription">
            </div>
            <div class="signup-link">
                <p>Vous avez un compte ? <a href="#">Se Connecter</a></p>
            </div>
            <div class="facebook-button">
                <a href="#" class="facebook-link">S'inscrire avec Facebook</a>
            </div>
        </form>
    </div>

    <div class="container">
        <h2><b>Connexion</b></h2>
        <h3>Votre chauffeur en un clic!</h3>
        <form action="Main.php" method="post">
            <div class="form-group">
                <a href="" target="_blank" class="facebook-button">
                    <i class="fab fa-facebook"></i> Continuer Avec Facebook
                </a>
            </div>
            <div class="container_line">
                <div class="div1"></div>
                <span class="ou">ou</span>
                <div class="div2"></div>
            </div>

            <div class="form-group">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="motdepasse">Mot de passe :</label>
                <input type="password" id="motdepasse" name="motdepasse" required>
            </div>
            <div class="form-group1">
                <button type="submit" class="login-button" name="connect">
                    <span>Se connecter</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </form>
        <div class="signup-link">
            <p>Vous n'avez pas de compte ? <a href="Inscription.php">S'inscrire</a></p>
        </div>
    </div>
</body>

</html>