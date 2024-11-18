<?php
class Conexao {
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            $dbHost = 'localhost';
            $dbUsername = 'root';
            $dbPassword = 'Carolaine22'; // retirar a senha 
            $dbName = 'biblioteca';

            try {
                self::$instance = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                if (self::$instance->connect_errno) {
                    throw new Exception("Erro na conexão com o banco de dados: " . self::$instance->connect_error);
                }
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        return self::$instance;
    }

    private function __clone() {}

    public function __destruct() {
        self::$instance->close();
    }
}
?>
