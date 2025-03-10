<?php

Class User{

    function login($_POST)
    {
        $DB = new Database();

        $_SESSION['errors'] = '';
        if(isset($_POST["username"]) && $_POST["password"])
        {
            $arr['username'] = $_POST['username'];
            $arr['password'] = $_POST['password'];

            $query = "SELECT * FROM users WHERE email = :email AND password= :password ";
            $data = $DB->read($query, $arr);

            if(is_array($data)){
                //logged in
                $_SESSION['username'] = $data['username'];
                $_SESSION['user_id'] = $data[0]->userid;
            }
        }

    }

    function signup($_POST)
    {
        $DB = new Database();
        $arr['username'] = $_POST['username'];
        $arr['password'] = $_POST['password'];
        $arr['email'] = $_POST['email'];

        $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $data = $DB->read($query, $arr);

    }

    function check_login($email,$password)
    {

    }
}
