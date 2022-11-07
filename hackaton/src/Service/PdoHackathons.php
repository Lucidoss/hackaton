<?php

namespace App\Service;

use PDO;

class PdoHackathons
{
    private static $monPdo;
    public function __construct($serveur, $bdd, $user, $mdp)
    {
        PdoHackathons::$monPdo = new PDO($serveur . ';' . $bdd, $user, $mdp);
        PdoHackathons::$monPdo->query("SET CHARACTER SET utf8");
    }
<<<<<<< HEAD
    
    public function inscrire($nom, $prenom, $dateNaissance, $ville, $rue, $cp, $email, $login, $mdp, $sel) {
        $req = PdoHackathons::$monPdo->prepare("INSERT INTO participant(nom, prenom, dateNaissance, ville, rue, cp, email, login, mdp, sel) VALUES (:nom, :prenom, :dateNaissance, :ville, :rue, :cp, :email, :login, :mdp, :sel)");
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
        $req->bindValue(':ville', $ville, PDO::PARAM_STR);
        $req->bindValue(':rue', $rue, PDO::PARAM_STR);
        $req->bindValue(':cp', $cp, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $req->bindValue(':sel', $sel, PDO::PARAM_STR);
		$req->execute();
    }
=======
>>>>>>> master

    public function getNbHackathons() {
        $req = PdoHackathons::$monPdo->prepare('SELECT COUNT(idHackathon) as nombre FROM hackathon');
		$req->execute();
		$leNombre = $req->fetch();
		return $leNombre;
    }
}
