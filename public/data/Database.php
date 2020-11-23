<?php 

require_once(__DIR__ . '/../../env.php');

class Database
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $PDO;
    private $statementHandle; 

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
        $this->dbname = getenv('DB_NAME');

        # Attempt connection
        try
        {
            $this->PDO = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'Connected to the database.';
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function run(string $sql_statement, array $params=[])
    {
        try 
        {
            $this->statementHandle = $this->PDO->prepare($sql_statement);
            $this->statementHandle->execute($params);
            return $this->statementHandle;
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    }

    public function getLastInsertedId()
    {
        return $this->PDO->lastInsertId();
    }

    public function __destruct()
    {
        # Disconnect from db
        $this->PDO = null;
        //echo 'Successfully disconnected from the database!';
    }
}

?>