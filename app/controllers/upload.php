<?php

Class Upload extends Controller
{
    function index()
    {
        $data["page_title"] = "Upload";
        $this->view("minima/upload", $data);
    }

    function image()
    {
        $data["page_title"] = "Image";
        $this->view("minima/upload", $data);
    }


}

