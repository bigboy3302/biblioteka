<?php

class Database {

    private $pdo;

        //savienojamies ar datu bazi tikai vienreiz
    public function __construct($config)
    {
        

        $connection_string = "mysql:" . http_build_query($config, "", ";");

        $this->pdo = new PDO($connection_string);
        $this->pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
    }

            // execute vai query
    public function execute($query_string, $params) {
       
            // 1. sagatavo sql izpildei
        $query = $this->pdo -> prepare($query_string);
            // 2. izpildit sql
        $query -> execute($params);
            // 3. Atgriezt rezultatu
        return $query;
    }
}