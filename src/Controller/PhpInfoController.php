<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class PhpInfoController
{
    public function Info()
    {
        $st = '';

        define('DB_NAME', 'hardtime');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'mysql_r_p');
        define('DB_HOST', 'host_ht:3306');


        $db = new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

        //$db = new \PDO("");
        //$db = new \PDO('mysql:host=localhost;dbname=hardtime', 'hduser', 'hdpassword');
        if ($db->getAttribute(\PDO::ATTR_DRIVER_NAME) == 'mysql') {

            $data = $db->query("SELECT * FROM new_table")->fetchAll();
            foreach ($data as $row) {
                $st = $st. $row['idnew_table']."<br />\n";
            }

            $stmt = $db->prepare('select * from new_table',

                array(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
        } else {
            return "приложение работает только с mysql; Следует использовать \$stmt->fetchAll() вместо этого";
        }
        return new Response($st);
    }

}
