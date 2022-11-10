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

    public function connecter($login, $mdp) {
        $req = PdoHackathons::$monPdo->prepare("SELECT login, mdp WHERE login = :login AND mdp = :mdp");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
		$req->execute();
        $user = $req->fetch();
        return $user;
    }

    public function getNbHackathons() {
        $req = PdoHackathons::$monPdo->prepare('SELECT COUNT(idHackathon) as nombre FROM hackathon');
		$req->execute();
		$leNombre = $req->fetch();
		return $leNombre;
    }
<<<<<<< HEAD
    
    public function connecter($login, $mdp) {
        $req = PdoHackathons::$monPdo->prepare("SELECT login, mdp WHERE login = :login AND mdp = :mdp");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
		$req->execute();
        $user = $req->fetch();
        return $user;
    }

    public function getNbHackathons() {
        $req = PdoHackathons::$monPdo->prepare('SELECT COUNT(idHackathon) as nombre FROM hackathon');
		$req->execute();
		$leNombre = $req->fetch();
		return $leNombre;
    }
=======
>>>>>>> master
}
