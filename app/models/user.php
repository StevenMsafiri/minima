<?php

Class User{

    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = '';
        if(isset($POST["username"]) && $POST["password"])
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];

            $query = "SELECT * FROM users WHERE username = :username AND password = :password ";
            $data = $DB->read($query, $arr);

            if(is_array($data)){
                //logged in
                $_SESSION['username'] = $data[0]->username;
                $_SESSION['id'] = $data[0]->id;
                $_SESSION['user_url'] = $data[0]->url_address;

                header("Location: " . ROOT . "home");
            }else
            {
                $_SESSION['errors'] = "Wrong username or password";
            }
        }else
        {
            $_SESSION['errors'] = "Please enter username and password";
        }

    }

    function signup($POST)
    {
        $DB = new Database();

        $_SESSION['errors'] = '';
        if(isset($POST["username"]) && $POST["password"] && $POST["email"])
        {

            $arr['url_address'] = get_random_string_max(60);
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $arr['email'] = $POST['email'];
            $arr['date'] = date("Y-m-d H:i:s");

            $query = "INSERT INTO users (url_address, username, password, email, date ) 
                      VALUES (:url_address, :username, :password, :email, :date)";
            $data = $DB->write($query, $arr);

            if($data)
            {
                header("Location: " . ROOT . "login");
            }

        }
        else
        {
            $_SESSION['errors'] = "Please enter username and password";
        }
    }

    function check_logged_in()
    {
        $DB = new Database();

        if(isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];

            $query = "SELECT * FROM users WHERE url_address = :user_url limit 1 ";
            $data = $DB->read($query, $arr);
            if(is_array($data)){
                $_SESSION['username'] = $data[0]->username;
                $_SESSION['id'] = $data[0]->id;
                $_SESSION['user_url'] = $data[0]->url_address;

                return true;
            }
        }

        return false;
    }

    function logout()
    {
        unset( $_SESSION['username']);
        unset( $_SESSION['user_url']);
        unset($_SESSION['id']);

        header("Location: " . ROOT . "login");
        die();
    }
}
