<?php
class DB_connect
{

    private string $host = 'MySQL-8.2';
    private string $db_name = 'wonders_world';
    private string $username = 'root';
    private string $password = '';

    private string $dsn;

//    public function __construct($host, $db_name, $username, $password)
//    {
//        $this->$host = $host;
//        $this->$db_name = $db_name;
//        $this->$username = $username;
//        $this->password = $password;
//    }

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

    public function addWonder($name, $age, $description)
    {
        $statement = $this->ConnectDB()->prepare("INSERT INTO wonders (name, age, description) VALUES (:name, :age, :description)");
        return $statement->execute([":name" => $name, ":age" => $age, ":description" => $description]);
    }

    public function addComments($user_name, $comment_text, $wonder_name)
    {
        $pdo = $this->ConnectDB();
        $statement = $pdo->prepare("INSERT INTO comments (user_name, comment_text, wonder_name) VALUES (:name_user, :text_user, :id_wonder)");
        return $statement->execute([
            ":name_user" => $user_name,
            ":text_user" => $comment_text,
            ":id_wonder" => $wonder_name
        ]);
    }

    public function getAllComments()
    {
      $pdo = $this->ConnectDB();
      $statement = $pdo->prepare("SELECT * FROM comments");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public function getComments($wonder_name) : array
    {
        $pdo = $this->ConnectDB();
        $statement = $pdo->prepare("SELECT * FROM comments WHERE wonder_name=:wonder_name");
        $statement->execute([":wonder_name" => $wonder_name]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteComments($id) : bool|Exception
    {
        $result = null;
        try {
            $pdo = $this->ConnectDB();
            $statement = $pdo->prepare("DELETE FROM comments WHERE id=:id");
            $statement->execute([":id" => $id]);
            $result = true;

            if ($statement->rowCount() === 0) {
                throw new Exception("Комментарий с ID $id не найден");
            }
            return true;
        } catch (PDOException $e) {
            throw new Exception("Ошибка базы данных:" . $e->getMessage());
        }
        return $result;
    }
}
