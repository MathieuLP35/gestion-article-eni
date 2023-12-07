<?php

class Commentaire
{
    private $id;
    private $id_article;
    private $pseudo;
    private $commentaire;
    private $date_commentaire;

    public function __construct($id = "", $id_article = "", $pseudo = "", $commentaire = "", $date_commentaire = "")
    {
        $this->id = $id;
        $this->id_article = $id_article;
        $this->pseudo = $pseudo;
        $this->commentaire = $commentaire;
        $this->date_commentaire = $date_commentaire;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdArticle()
    {
        return $this->id_article;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getDateCommentaire()
    {
        return $this->date_commentaire;
    }

    public function getSignaler()
    {
        return $this->signaler;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function setDateCommentaire($date_commentaire)
    {
        $this->date_commentaire = $date_commentaire;
    }


    // CRUD

    public function create()
    {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Europe/Paris'));

        $bdd = connectBDD();
        $query = $bdd ->prepare("INSERT INTO commentaire (id_article, pseudo, commentaire, date_commentaire) VALUES (:id_article, :pseudo, :commentaire, :date_commentaire)");
        $query->execute([
            "id_article" => $this->getIdArticle(),
            "pseudo" => $this->getPseudo(),
            "commentaire" => $this->getCommentaire(),
            "date_commentaire" => $date->format('Y-m-d H:i:s')
        ]);
    }

    public function find()
    {
        $bdd = connectBDD();
        $query = $bdd->prepare("SELECT * FROM commentaire WHERE id_article = :id");
        $query->bindParam(":id", $this->id_article);
        $query->execute();
        $commentaire = $query->fetchAll();
        $bdd = null;
        return $commentaire;
    }

    public function findAll()
    {
        $bdd = connectBDD();
        $query = $bdd->prepare("SELECT * FROM commentaire");
        $query->execute();
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

}