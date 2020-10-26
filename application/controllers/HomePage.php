<?php

class HomePage extends CI_Controller
{
    public function index(){
        $this->load->view('homepage');
    }

    public function menu(){
        $this->load->view('menupage');
    }
}