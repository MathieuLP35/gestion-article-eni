<?php

class Utilisateur
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $mot_de_passe;

    public function __construct($id = "",$nom = "", $prenom = "", $email = "", $mot_de_passe = "")
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
    }

    public function getId(): mixed
    {
        return $this->id;
    }

    public function setId(mixed $id): void
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe): void
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    public function save()
    {
        $connexion = connectBDD();
        $r = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
        $r->bindParam(':nom', $this->nom);
        $r->bindParam(':prenom', $this->prenom);
        $r->bindParam(':email', $this->email);
        $r->bindParam(':mot_de_passe', $this->mot_de_passe);
        $r->execute();
        header("Location: /");
    }

    public function login()
    {
        $connexion = connectBDD();
        $r = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $r->bindParam(':email', $this->email);
        $r->execute();
        $user = $r->fetch(PDO::FETCH_ASSOC);

        if($user){
            if(password_verify($this->mot_de_passe, $user["mot_de_passe"])){
                $_SESSION["user"] = $user;
                header("Location: /");
            } else {
                $errors["password"] = "Le mot de passe est incorrect";
            }
        } else {
            $errors["email"] = "L'email n'existe pas";
        }
    }



}