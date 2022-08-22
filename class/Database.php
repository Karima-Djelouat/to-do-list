<?php


class Database 

{
    private SQLite3 $db;

    public function __construct(string $fileName)
    {
        $this->db = new SQLite3($fileName);
    }


    public function initiliaze(): void
    {
        $query = "CREATE TABLE IF NOT EXISTS task 
                    (
                        id INTEGER NOT NULL, 
                        done BOOLEAN NOT NULL, 
                        name VARCHAR(255) NOT NULL, 
                        PRIMARY KEY('id' AUTOINCREMENT)
                    );";
        
        $this->exec($query);
    }

    public function addTask(string $name): void
    {
        $query = "INSERT INTO task (`done`, `name`) VALUES (false, '$name')";

        $this->exec($query);
    }

    public function getDatabase(): SQLite3
    {
        return $this->db;
    }

    private function exec(string $query): void
    {
        $this->db->prepare($query);
        $this->db->exec($query);

    }

}

?>