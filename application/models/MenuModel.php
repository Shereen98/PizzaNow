<?php

class MenuModel extends CI_Model
{
    private $itemQuantity = 0;

    public function __construct()
    {
        $this->pizza = 'Pizza';
        $this->sides = 'Sides';
        $this->toppings = 'Toppings';
    }

    function setItemQuantity($quantity) {
        $this->$itemQuantity = $quantity;
    }

    function getItemQuantity() {
        return $this->itemQuantity;
    }

    public function incrementQty($qty){
        if(!empty($qty)){
            $quantity = $qty + 1;
            $this->setItemQuantity($quantity);
        }else{
            $quantity = $this->itemQuantity+1;
        }

        return !empty($quantity)?$quantity:false;
    }

    public function getAllPizza($pizzaType){
        if(!empty($pizzaType)){
            $this->db->select('*');
            $this->db->from($this->pizza);
            $this->db->where('pizza_type', $pizzaType);
            $this->db->order_by('pizza_name', 'asc');

            $query = $this->db->get();
            $result = $query->result_array();
        }else{
            $result = '';
        }

        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function getAllSides($sideType){
        if(!empty($sideType)){
            $this->db->select('*');
            $this->db->from($this->sides);
            $this->db->where('side_type', $sideType);
            $this->db->order_by('side_name', 'asc');

            $query = $this->db->get();
            $result = $query->result_array();
        }else{
            $result = '';
        }

        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function getAllToppings($toppingType){
        if(!empty($toppingType)){
            $this->db->select('*');
            $this->db->from($this->toppings);
            $this->db->where('topping_type', $toppingType);
            $this->db->order_by('topping_name', 'asc');

            $query = $this->db->get();
            $result = $query->result_array();
        }else{
            $result = '';
        }

        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function getPizza($id){
        $this->db->select('*');
        $this->db->from($this->pizza);
        if($id){
            $this->db->where('pizza_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $result = '';
        }

        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function getSide($id){
        $this->db->select('*');
        $this->db->from($this->sides);
        if($id){
            $this->db->where('side_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $result = '';
        }

        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function getTopping($id){
        $this->db->select('*');
        $this->db->from($this->toppings);
        if($id){
            $this->db->where('topping_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $result = '';
        }

        // Return fetched data
        return !empty($result)?$result:false;
    }
}