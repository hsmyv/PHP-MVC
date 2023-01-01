<?php


//connect to the database and execute a query
class Database {
    public $connection;
    public $statement;
    public function __construct($config, $username = 'root', $password = '')
    {

      
        $dsn = 'mysql:' . http_build_query($config, '', ';'); //example.com/host=localhost&port=3306&dbname=php-mvc
        
        //this is same like upper
        //$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        
         
        $this->connection = new PDO($dsn, $username, $password, [PDO::FETCH_ASSOC]);
    }


    public function query($query, $params = []) 
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return  $this;
    }


    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();

        if(!$result){
            abort(Response::NOT_FOUND);
        }
        return $result;
    }
}