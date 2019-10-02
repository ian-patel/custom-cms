<?php

namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class DB
{
    /**
     * db
     *
     * @var PDO
     */
    private $db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->loadEnv();
        try {
            $this->db = new PDO(
                'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
                getenv('DB_USERNAME'),
                getenv('DB_PASSWORD')
            );

            $this->db->query('SET NAMES utf8');
            $this->db->query('SET CHARACTER_SET utf8_unicode_ci');

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo ' ¯\_(ツ)_/¯ ' . $e->getMessage();
        }
    }

    /**
     *  Load .env file for database configs
     */
    private function loadEnv()
    {
        $dotEnv = Dotenv::create(__DIR__ . '/../../');
        $dotEnv->load();
    }

    /**
     * @param string $query
     * @return object
     */
    public function query(string $query)
    {
        $result = $this->db->query($query);
        return (object)$result->fetchAll();
    }
}