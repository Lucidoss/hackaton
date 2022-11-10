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
        $req = PdoHackathons::$monPdo->prepare("SELECT login, mdp FROM participant WHERE login = :login AND mdp = :mdp");
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
		$req->execute();
        $user = $req->fetch();
        return $user;
    }
}
