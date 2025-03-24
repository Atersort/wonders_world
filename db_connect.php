<?php


class DB_connect
{

    private string $host = 'MySQL-8.2';
    private string $db_name = 'wonders_world';
    private string $username = 'root';
    private string $password = '';

    private string $dsn;

    public function ConnectDB()
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->db_name";
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        return $pdo;
    }

    public function singIn($user_log, $user_pass)
    {
        $statement = $this->ConnectDB()->prepare("SELECT * FROM users WHERE login=:login AND password=:password ");
        $statement->execute([':login' => $user_log, ':password' => $user_pass]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
