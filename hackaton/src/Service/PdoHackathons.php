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

    public function getHackathons() {
        $req = "select * from hackathon";
        $res = PdoHackathons::$monPdo->prepare($req);
        $res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;
    }

    public function getHackathonsTri($Tri) {
        $req = "select * from hackathon order by :tri";
        $res->bindParam(':tri', $Tri, PDO::PARAM_STR);
        $res = PdoHackathons::$monPdo->prepare($req);
        $res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;
    }

=======
>>>>>>> master
}
