<?php

/**
 * Classe d'accès aux données.
 *
 * PHP Version 7
 *
 * @category  G4
 * @package   Forum
 * @author    leochastagnac@gmail.com romainsantiago@gmail.com
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */

/**
 * Classe d'accès aux données.
 *
 * Utilise les services de la classe PDO
 * pour l'application forum
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monPdoForum qui contiendra l'unique instance de la classe
 *
 * PHP Version 7
 *
 * @category  Projet
 * @package   Forum 
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */
class PdoForum
{

    // private static $serveur = 'mysql:host=localhost';
    // private static $bdd = 'dbname=forum';
    // private static $user = 'root';
    // private static $mdp = '';
    // private static $monPdo;
    // private static $monPdoForum = null;


    private static $serveur = 'mysql:host=mysql-foum.alwaysdata.net';
    private static $bdd = 'dbname=foum_forum';
    private static $user = 'foum';
    private static $mdp = 'azertyuioproot123';
    private static $monPdo;
    private static $monPdoForum = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        PdoForum::$monPdo = new PDO(
            PdoForum::$serveur . ';' . PdoForum::$bdd,
            PdoForum::$user,
            PdoForum::$mdp
        );
        PdoForum::$monPdo->query('SET CHARACTER SET utf8');
    }

    /**
     * Méthode destructeur appelée dès qu'il n'y a plus de référence sur un
     * objet donné, ou dans n'importe quel ordre pendant la séquence d'arrêt.
     */
    public function __destruct()
    {
        PdoForum::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoForum = PdoForum::getPdoForum();
     *
     * @return l'unique objet de la classe PdoForum
     */
    public static function getPdoForum()
    {
        if (PdoForum::$monPdoForum == null) {
            PdoForum::$monPdoForum = new PdoForum();
        }
        return PdoForum::$monPdoForum;
    }

    /**
     * Retourne les informations d'un compte
     *
     * @param String $Email  Mail du compte
     * @param String $mdp   Mot de passe du compte
     * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
     */
    public function getInfosCompte($email, $mdp)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'SELECT compte.id AS id, compte.nom AS nom, '
                . 'compte.prenom AS prenom, compte.mail AS mail, '
                . 'compte.role AS role, compte.xp AS xp '
                . 'FROM compte '
                . 'WHERE compte.mail = :unMail AND compte.mdp = :unMdp'
        );
        $requetePrepare->bindParam(':unMail', $email, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }

    function updateXp($idCompte, $nb)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'UPDATE `compte` SET `xp`= compte.xp + :nb WHERE compte.id = :idCompte'
        );
        $requetePrepare->bindParam(':idCompte', $idCompte, PDO::PARAM_INT);
        $requetePrepare->bindParam(':nb', $nb, PDO::PARAM_INT);
        $requetePrepare->execute();
    }

    /**
     * Retourne les informations d'un compte
     *
     * @param String $id   id du compte
     *
     * @return l'id, le nom, le prénom, le mail, le mdp et la date de création sous la forme d'un tableau associatif
     */
    public function getInfosCompteById($idCompte)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'SELECT compte.id AS id, compte.nom AS nom, '
                . 'compte.prenom AS prenom, compte.mail AS mail, '
                . 'compte.mdp AS mdp, '
                . 'compte.role AS role, compte.xp AS xp '
                . 'FROM compte '
                . 'WHERE compte.id = :unId'
        );
        $requetePrepare->bindParam(':unId', $idCompte, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }


  

    /**
     * Retourne chaque topiics dans un tableau associative
     *
     *
     * @return null
     */
    public function getTopics()
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'SELECT topics.id AS id, topics.id_categ AS idcategorie, topics.id_auteur AS idcompte, '
                . 'topics.sujet AS sujet, '
                . 'topics.question AS question, '
                . 'topics.date_creation AS datecreation '
                . 'FROM topics '
                . 'ORDER BY datecreation'
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
        $topics = array();
        while ($laLigne = $requetePrepare->fetch()) {
            $id = $laLigne['id'];
            $sujet = $laLigne['sujet'];
            $idcategorie = $laLigne['idcategorie'];
            $idcompte = $laLigne['idcompte'];
            $description = $laLigne['description'];
            $question = $laLigne['question'];
            $datecreation = $laLigne['datecreation'];
            $topics[] = array(
                'id'            => $id,
                'sujet'         => $sujet,
                'idcategorie'   => $idcategorie,
                'idcompte'      => $idcompte,
                'question'       => $question,
                'description'   => $description,
                'datecreation'  => $datecreation,
            );
        }
        return $topics;
    }

       /**
     * Retourne les informations de tous les comptes
     *
     *
     * @return l'id, le nom, le prénom, le mail, le mdp et la date de création sous la forme d'un tableau associatif
     */
    public function getAllAccounts()
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'SELECT * '
                . 'FROM compte '
                . 'ORDER BY id'
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
        $comptes = array();
        while ($laLigne = $requetePrepare->fetch()) {
            $id = $laLigne['id'];
            $prenom = $laLigne['prenom'];
            $nom = $laLigne['nom'];
            $mail = $laLigne['mail'];
            $role = $laLigne['role'];
            $xp = $laLigne['xp'];
            $comptes[] = array(
                'id'         => $id,
                'prenom'     => $prenom,
                'nom'        => $nom,
                'mail'       => $mail,
                'role'       => $role,
                'xp'         => $xp,
            );
        }
        return $comptes;
    }
   

   

    /**
     * Retourne chaque topic dans un tableau associative
     *
     *
     * @return null
     */
    public function getComment($id)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'SELECT reponses.id AS id, reponses.id_auteur AS idcompte, '
                . 'reponses.commentaire AS commentaire, reponses.date_creation AS date '
                . 'from reponses where reponses.id_topics = :unIdTopic'
        );
        $requetePrepare->bindParam(':unIdTopic', $id, PDO::PARAM_INT);
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
        $commentaires = array();
        while ($laLigne = $requetePrepare->fetch()) {
            $id = $laLigne['id'];
            $idcompte = $laLigne['idcompte'];
            $idTopic = $laLigne['idfiche'];
            $commentaire = $laLigne['commentaire'];
            $date = $laLigne['date'];
            $commentaires[] = array(
                'id'            => $id,
                'idcompte'      => $idcompte,
                'id_topics'     => $idTopic,
                'commentaire'   => $commentaire,
                'date'          => $date
            );
        }
        return $commentaires;
    }

    

    

    /**
     * Retourne 1 topic dans un tableau associative
     *
     * @return null
     */
    public function getTopicById($idTopic)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'SELECT * FROM topics '
                . 'WHERE topics.id = :idTopic '
                . 'ORDER BY topics.date_creation'
        );
        $requetePrepare->bindParam(':idTopic', $idTopic, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }

    /**
     * Permets de créer une topic par un utilisateur
     *
     * @return null
     */
    function insertTopic($idCategorie, $idCompte, $sujet, $question)
    {
        $idCompte = $_SESSION['idCompte'];
        $requetePrepare = PdoForum::$monPdo->prepare(
            'INSERT INTO `topics`(`id`, `id_categ`, `id_auteur`, `sujet`, `question`, `date_creation`) '
                . 'VALUES (DEFAULT, :idcategorie, :idCompte, :sujet, :question, "2022-04-24")'
        );
        $requetePrepare->bindParam(':idcategorie', $idCategorie, PDO::PARAM_INT);
        $requetePrepare->bindParam(':idCompte', $idCompte, PDO::PARAM_INT);
        $requetePrepare->bindParam(':sujet', $sujet, PDO::PARAM_STR);
        $requetePrepare->bindParam(':question', $question);
        $requetePrepare->execute();
    }

    /**
     * Enregistre le compte dans la base de donnée
     *
     * @param String $nom        Nom du compte
     * @param String $prenom     Prénom du compte
     * @param String $mdp        Mdp du compte
     * @param String $mail        mail du compte
     * @param String $dateCreation        Mdp du compte
     *
     * @return null
     */
    function insertComment($idTopic, $idAuteur, $commentaire)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'INSERT INTO `reponses`(`id`, `id_topics`, `id_auteur`, `commentaire`, `date_creation`) '
                . 'VALUES (DEFAULT, :idTopic, :idAuteur, :commentaire, NOW())'
        );
        $requetePrepare->bindParam(':idTopic', $idTopic, PDO::PARAM_INT);
        $requetePrepare->bindParam(':idAuteur', $idAuteur, PDO::PARAM_INT);
        $requetePrepare->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $requetePrepare->execute();
    }


    /**
     * Enregistre le compte dans la base de donnée
     *
     * @param String $nom        Nom du compte
     * @param String $prenom     Prénom du compte
     * @param String $mdp        Mdp du compte
     * @param String $mail        mail du compte
     * @param String $dateCreation        Mdp du compte
     *
     * @return null
     */
    function register($prenom, $nom, $mdp, $mail)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'INSERT INTO `compte`(`id`, `prenom`, `nom`, `mdp`, `mail`,`role`,`xp`) '
                . 'VALUES (DEFAULT, :unPrenom, :unNom, :unMdp, :unMail, DEFAULT, DEFAULT)'
        );
        $requetePrepare->bindParam(':unPrenom', $prenom, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unNom', $nom, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMail', $mail, PDO::PARAM_STR);
        $requetePrepare->execute();
    }




    /**
     * Supprime une topic en base de donnée
     *
     * @param String $idtopic       id de la topic
     *
     * @return null
     */
    function deleteTopic($idTopic)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'DELETE from topics where topics.id = :idTopic'
        );
        $requetePrepare->bindParam(':idTopic', $idTopic, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

    /**
     * Supprime un commentaire en base de donnée
     *
     * @param String $idtopic       id de la topic
     *
     * @return null
     */
    function deleteComm($idcom)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'DELETE from reponses where reponses.id = :idcom'
        );
        $requetePrepare->bindParam(':idcom', $idcom, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

 /**
     * Supprime un compte en base de donnée
     *
     * @param String $idtopic       id de la topic
     *
     * @return null
     */
    function deleteCompte($idCompte)
    {
        $requetePrepare = PdoForum::$monPdo->prepare(
            'DELETE from compte where compte.id = :idCompte'
        );
        $requetePrepare->bindParam(':idCompte', $idCompte, PDO::PARAM_STR);
        $requetePrepare->execute();
    }



    /**
     * Hash les mots de passe non hashé des comptes en bdd
     */
    public static function hashPasswordsCompte()
    {
        if (PdoForum::$monPdoForum == null) {
            PdoForum::$monPdoForum = new PdoForum();
        }

        $sql = "SELECT * FROM `compte`";
        $requetePrepare = PdoForum::$monPdo->prepare($sql);
        $requetePrepare->execute();
        $tableauResult = $requetePrepare->fetchALL(PDO::FETCH_ASSOC);
        foreach ($tableauResult as $ligne) {
            if (strlen($ligne["mdp"]) !== 64) {
                $pwdHashed = hash("sha256", $ligne["mdp"]);
                $sql = "update compte set mdp = '" . $pwdHashed
                    . "' where id = '" . $ligne["id"] . "'";
                $requetePrepare = PdoForum::$monPdo->prepare($sql);
                $requetePrepare->execute();
                echo "Compte hashé <br>";
            }
        }

        echo "Compte c'est hashé <br>";
    }
}
