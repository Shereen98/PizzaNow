<?php

class HomePage extends CI_Controller
{
    public $data = array();

    public function index()
    {
        $this->load->view('homepage');
    }

    public function menu()
    {

        // assign values to array
        $data['nonVegPizza'] = $this->menu->getAllPizza('NonVeg');
        $data['vegPizza'] = $this->menu->getAllPizza('Veg');
        $data['appetizer'] = $this->menu->getAllSides('Appetizer');
        $data['dessert'] = $this->menu->getAllSides('Dessert');
        $data['beverage'] = $this->menu->getAllSides('Beverage');
        $data['vegTopping'] = $this->menu->getAllToppings('Veg');
        $data['nonVegTopping'] = $this->menu->getAllToppings('NonVeg');
        $data['mealDeals'] = $this->menu->getAllDeals();

        $this->load->view('menupage', $data);
    }
}