<?php
require_once 'utilisateur.php';
class Databases extends Utilisateur
{
    protected $host;
    protected $dbname;
    protected $username;
    protected $passwords;
    protected $conn;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'taxibokko';
        $this->username = 'root';
        $this->passwords = '';

        try {
            $this->conn  = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->passwords);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    public function ajouterUtilisateur(Utilisateur $utilisateur)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO utilisateurs (nom, prenom, email, motdepasse,telephone, dateInscription) VALUES (?, ?, ?, ?, ?,?)");
            $stmt->execute([
                $utilisateur->noms,
                $utilisateur->prenom,
                $utilisateur->email,
                $utilisateur->password,
                $utilisateur->telephone,
                $utilisateur->dateInscription,
            ]);
        } catch (PDOException $e) {
            die("Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage());
        }
    }
    public function VerificationMAil($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindValue(':email', $email);

        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public function AfficheP()
    {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs ");
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
}
