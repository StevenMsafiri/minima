<?php
Class Upload_file
{
    function upload($POST, $FILES)
    {
        $DB = new Database();
        $_SESSION['error'] = "";
        show($POST);
        if(isset($POST["title"]) && isset($FILES["file"]))
        {
            //UPLOAD FILE
            $allowed[] = "image/jpeg";
            $allowed[] = "image/png";

            if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0 && in_array($FILES['file']['type'], $allowed))
            {


                $folder = "uploads/";
                if(!file_exists($folder))
                {
                    mkdir($folder,0777,true);

                }

                $destination = $folder . $FILES['file']['name'];

                move_uploaded_file($FILES['file']['tmp_name'], $destination);
            }else{
                $_SESSION['error'] = "This file could not be uploaded";
            }

            if($_SESSION['error'] == "")
            {
                move_uploaded_file($FILES['file']['tmp_name'], $destination);

                //SAVE TO DB
                $arr['title'] = $POST["title"];
                $arr['description'] = $POST["description"];
                $arr['image'] = $destination;
                $arr['url_address'] = get_random_string_max(60);
                $arr['date'] = date("Y-m-d H:i:s");

                $query = "INSERT INTO images (url_address, title, date, description )
                      VALUES (:url_address, :title,:date,:description)";
                $data = $DB->write($query, $arr);

                if($data)
                {
                    header("Location: " . ROOT . "home");
                }
            }

        }

    }
}
