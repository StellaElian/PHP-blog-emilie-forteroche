<?php

/**
 * Classe qui permet de se connecter à la base de données.
 * Singleton : une seule instance de connexion.
 */
class DBManager
{
    private static ?DBManager $instance = null;
    private PDO $db;

    private function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
                DB_USER,
                DB_PASS
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base : " . $e->getMessage());
        }
    }

    // Récupérer l’instance unique
    public static function getInstance(): DBManager
    {
        if (!self::$instance) {
            self::$instance = new DBManager();
        }
        return self::$instance;
    }

    // Récupérer l’objet PDO
    public function getPDO(): PDO
    {
        return $this->db;
    }

    // Exécuter une requête SQL (avec ou sans paramètres)
    public function query(string $sql, ?array $params = null): PDOStatement
    {
        if ($params === null) {
            return $this->db->query($sql);
        } else {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        }
    }
}
