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

    public function getHackathons() {
        $req = "select * from hackathon";
        $res = PdoHackathons::$monPdo->prepare($req);
        $res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;
    }

    // public function getHackathonsTri($Tri) {
    //     $req = "select * from hackathon order by :tri";
    //     $res = PdoHackathons::$monPdo->prepare($req);
    //     $res->bindParam(':tri', $Tri, PDO::PARAM_STR);
    //     $res->execute();
	// 	$lesLignes = $res->fetchAll();
	// 	return $lesLignes;
    // }

}
