<?php

class MenuModel extends CI_Model
{

    public function __construct()
    {
        $this->pizza = 'Pizza';
        $this->sides = 'Sides';
        $this->toppings = 'Toppings';
        $this->deals = 'Deals';
    }

    //fetch all the pizza records from db
    public function getAllPizza($pizzaType)
    {

        if (!empty($pizzaType)) {
            $this->db->select('*');
            $this->db->from($this->pizza);
            $this->db->where('pizza_type', $pizzaType);
            $this->db->order_by('pizza_name', 'asc');

            $query = $this->db->get();
            $result = $query->result_array();
        } else {
            $result = '';
        }

        return !empty($result) ? $result : false;
    }

    //fetch all the side records from db
    public function getAllSides($sideType)
    {
        if (!empty($sideType)) {
            $this->db->select('*');
            $this->db->from($this->sides);
            $this->db->where('side_type', $sideType);
            $this->db->order_by('side_name', 'asc');

            $query = $this->db->get();
            $result = $query->result_array();
        } else {
            $result = '';
        }

        return !empty($result) ? $result : false;
    }

    //fetch all the topping records from db
    public function getAllToppings($toppingType)
    {
        if (!empty($toppingType)) {
            $this->db->select('*');
            $this->db->from($this->toppings);
            $this->db->where('topping_type', $toppingType);
            $this->db->order_by('topping_name', 'asc');

            $query = $this->db->get();
            $result = $query->result_array();
        } else {
            $result = '';
        }

        return !empty($result) ? $result : false;
    }

    //fetch all the meal deal records from db
    public function getAllDeals()
    {

        $this->db->select('*');
        $this->db->from($this->deals);

        $query = $this->db->get();
        $result = $query->result_array();

        return !empty($result) ? $result : false;
    }

    // get single pizza record
    public function getPizza($id)
    {

        $this->db->select('*');
        $this->db->from($this->pizza);

        if ($id) {
            $this->db->where('pizza_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $result = '';
        }

        return !empty($result) ? $result : false;
    }

    // get single side record
    public function getSide($id)
    {

        $this->db->select('*');
        $this->db->from($this->sides);

        if ($id) {
            $this->db->where('side_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $result = '';
        }

        return !empty($result) ? $result : false;
    }

    // get single topping record
    public function getTopping($id)
    {

        $this->db->select('*');
        $this->db->from($this->toppings);

        if ($id) {
            $this->db->where('topping_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $result = '';
        }

        return !empty($result) ? $result : false;
    }

    // get single meal deals record
    public function getMeal($id)
    {

        $this->db->select('*');
        $this->db->from($this->deals);

        if ($id) {
            $this->db->where('deal_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $result = '';
        }

        return !empty($result) ? $result : false;
    }

}