<?php


class About extends Controller
{
    function index()
    {
        $data['page_title'] = "About";
        $this->view("../views/minima/about-us", $data);
    }
}