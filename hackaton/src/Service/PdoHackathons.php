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

    public function getNbHackathons() {
        $req = PdoHackathons::$monPdo->prepare('SELECT COUNT(idHackathon) as nombre FROM hackathon');
		$req->execute();
		$leNombre = $req->fetch();
		return $leNombre;
    }
}
