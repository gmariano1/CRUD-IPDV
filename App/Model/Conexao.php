<?php
namespace App\Model;
use Dotenv;
class Conexao
{
    private static $instance;

    public function seeConn(){
        require_once './constants.php';
        $dotenv = Dotenv\Dotenv::createImmutable(ABSPATH);
        $dotenv->safeLoad();
        $host = $_ENV['HOST'];
        $dbname = $_ENV['DATABASE'];
        $user = $_ENV['USER'];
        $password = $_ENV['PASSWORD'];
        $charset = $_ENV['CHARSET'];
        $conn = "mysql:host=". $host .";dbname=".$dbname.";charset=".$charset;
        $aa = [
            "conn" => $conn,
            "user" => $user,
            "password" => $password
        ];
        return $aa;
    }

    public static function getConnection()
    {
        require_once './constants.php';
        $dotenv = Dotenv\Dotenv::createImmutable(ABSPATH);
        $dotenv->safeLoad();
        $host = $_ENV['HOST'];
        $dbname = $_ENV['DATABASE'];
        $user = $_ENV['USER'];
        $password = $_ENV['PASSWORD'];
        $charset = $_ENV['CHARSET'];

        if(!isset(self::$instance))
        {
            $conn = "mysql:host=". $host .";dbname=".$dbname.";charset=".$charset;
            return self::$instance = new \PDO($conn, $user, $password);
        }else{
            return self::$instance;
        }
    }
}