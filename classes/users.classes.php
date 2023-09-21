<?php

class User extends Dbh
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;

    public function __construct(string $first_name = '', string $last_name = '', string $email = '', string $password = '')
    {
        $this->set_first_name($first_name);
        $this->set_last_name($last_name);
        $this->set_email($email);
        $this->set_password($password);
    }

    public function set_first_name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function set_last_name($last_name)
    {
        $this->last_name = $last_name;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }

    public function add_user()
    {
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $email = $this->email;
        $password = $this->password;
        $hashed_password = $this->hash_password($password);

        $sql = "INSERT INTO users(first_name, last_name, email, password) VALUES (?, ?, ?, ?);";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        // Execute query
        if (!$stmt->execute([$first_name, $last_name, $email, $hashed_password])) {
            $stmt = null;
            header("location: /shopco/shop");
            exit();
        }

        $user_id = $conn->lastInsertId();

        session_start();
        $_SESSION['user_id'] = $user_id;

        header("location: /shopco/profile");
    }

    public function get_user($user_id)
    {
        $sql = "SELECT * FROM users WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$user_id])) {
            $stmt = null;
            header('location: /shopco/shop');
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    public function check_email($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$email])) {
            $stmt = null;
            header("location: /shopco/shop");
            exit();
        }

        $email = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($email) === 0) {
            return true;
        } else {
            return false;
        }
    }

    public function authorize_user($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([$email])) {
            $stmt = null;
            header("location: /shopco/shop");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($user) === 0) {
            $error = "User with this email does not exist.";
            header("Location: /shopco/shop/?loginerrors=$error");
            exit();
        }

        if (password_verify($password, $user[0]['password'])) {
            session_start();
            $_SESSION['user_id'] = $user[0]['id'];

            header("location: /shopco/profile");
        } else {
            $error = "User with this email does not exist.";
            header("Location: /shopco/shop/?loginerrors=$error");
            exit();
        }
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
