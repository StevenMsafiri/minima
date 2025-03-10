<?php

Class Signup extends Controller
{
    function index()
    {
        $data['page_title'] = "Sign-Up";

        $this->view("minima/signup", $data);

    }
}
