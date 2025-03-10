<?php

Class Upload extends Controller
{
    function index()
    {
        header("Location:". ROOT . "upload/image");
        die();
    }

    function image()
    {
        $user = $this->loadModel('user');
        $result =$user->check_logged_in();
        if(!$result)
        {
            header("Location:" .ROOT."login");
            die();
        }

        $data["page_title"] = "Image";
        $this->view("minima/upload", $data);
    }


}

