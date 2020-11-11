<?php


class MenuPage extends CI_Controller
{

    public function index(){

       $this->load->view('menupage');
    }

    public function customizePizza($id){

        $data = array();
        $data['pizza'] = $this->menu->getPizza($id);
        $data['vegTopping'] = $this->menu->getAllToppings('Veg');
        $data['nonVegTopping'] = $this->menu->getAllToppings('NonVeg');
        $data['mealDeals'] = $this->menu->getAllDeals();
        $data['itemQuantity'] = 1;

       $this->load->view('customizepage',$data);
    }
}