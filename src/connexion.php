<?php

class Connexion
{
    protected static  $bdd;
    protected static  $dbname = "dutinfopw201613";
    protected static  $dbhost = "database-etudiants.iut.univ-paris8.fr";
    protected static  $dbuser = "dutinfopw201613";
    protected static  $dbpasswd = "hymunupy";

    public function __construct() {
        // Appel à initConnexion lors de l'instanciation de la classe
        self::initConnexion();
    }

    public static function initConnexion(): void
    {
        try {
            self::$bdd = new PDO('mysql:host=' . self::$dbhost . ';dbname=' . self::$dbname . ";charset=utf8;", self::$dbuser, self::$dbpasswd);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $Exception) {
            echo "ici";
            echo $Exception->getMessage();
        }
    }

    public static function getBdd(){
        return self::$bdd;
    }
}

