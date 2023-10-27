<?php
class Utilisateur
{
    protected $noms;
    protected $prenom;
    protected $email;
    protected $password;
    protected $telephone;
    protected $dateInscription;

    public function __construct($noms, $prenom, $email, $password, $telephone, $dateInscription)
    {
        $this->setNoms($noms);
        $this->setPrenom($prenom);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setTelephone($telephone);
        $this->dateInscription = $dateInscription;
    }

    /**
     * Get the value of noms
     */
    public function getNoms()
    {
        return $this->noms;
    }

    /**
     * Set the value of noms
     *
     * @return  self
     */
    public function setNoms($noms)
    {
        if (is_string($noms) && strlen($noms) > 2) {
            $this->noms = $noms;

            return $this;
        }
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        if (is_string($prenom)  && strlen($prenom) > 2) {
            $this->prenom = $prenom;

            return $this;
        }
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;

            return $this;
        }
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        if (strlen($password) > 7) {
            $this->password = $password;

            return $this;
        }
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */
    public function setTelephone($telephone)
    {
        if (substr(0, 2) == "77" || substr($telephone, 0, 2) == "70" || substr($telephone, 0, 2) == "78" || substr($telephone, 0, 2) == "76" || substr($telephone, 0, 2) == "75" && strlen($telephone) == 9) {
            $this->telephone = $telephone;

            return $this;
        }
    }

    /**
     * Get the value of dateInscription
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set the value of dateInscription
     *
     * @return  self
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }
}
