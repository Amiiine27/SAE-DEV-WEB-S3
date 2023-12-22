<?php

class Connexion
{
    protected static PDO $bdd;
    protected static string $dbname = "dutinfopw201613";
    protected static string $dbhost = "database-etudiants.iut.univ-paris8.fr";
    protected static string $dbuser = "dutinfopw201613";
    protected static string $dbpasswd = "hymunupy";

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
}

