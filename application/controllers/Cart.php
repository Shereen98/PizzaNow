<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function index()
    {
//        $data['pizza'] = array_values(unserialize($this->session->userdata('pizzaCart')));
        $data['side'] = array_values(unserialize($this->session->userdata('sideCart')));
//        $data['total'] = $this->total();
        $this->load->view('cart', $data);
    }

    public function addPizza($pizza_id,$topping_id,$qty,$pizza_price)
    {
        $pizza = $this->menu->getPizza($pizza_id);
        $topping = $this->menu->getTopping($topping_id);
        $item = array(
            'id' => $pizza->pizza_id,
            'name' => $pizza->pizza_name,
            'description' => $pizza->pizza_description,
            'image' => $pizza->pizza_image,
            'pizza_price' => $pizza_price,
            'topping_id' => $topping->topping_id,
            'topping_name' => $topping->topping_name,
            'topping_price' => $topping->price,
            'quantity' => $qty
        );
        if(!$this->session->has_userdata('pizzaCart')) {
            $cart = array($item);
            $this->session->set_userdata('pizzaCart', serialize($cart));
        } else {
            $index = $this->exists($pizza_id);
            $cart = array_values(unserialize($this->session->userdata('pizzaCart')));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata('pizzaCart', serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata('pizzaCart', serialize($cart));
            }
        }
        redirect('cart');
    }

    public function addSide(){

        $id = $this->input->post('id');
        $qty = $this->input->post('qty');

        $product = $this->menu->getSide($id);
        $item = array(
            'id' => $product['side_id'],
            'name' => $product['side_name'],
            'description' => $product['side_description'],
            'image' => $product['side_image'],
            'price' => $product['price'],
            'portion' => $product['side_portion'],
            'quantity' => $qty
        );

        if(!$this->session->has_userdata('sideCart')) {
            $cart = array($item);
            $this->session->set_userdata('sideCart', serialize($cart));
        } else {
            $index = $this->exists($id);
            $cart = array_values(unserialize($this->session->userdata('sideCart')));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata('sideCart', serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata('sideCart', serialize($cart));
            }
        }
//        $this->load->view('cart');
        redirect('cart');
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('sideCart')));
        unset($cart[$index]);
        $this->session->set_userdata('sideCart', serialize($cart));
        redirect('cart');

//        session_destroy();
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('sideCart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function pizzaPrice(){
        $pizza_data = array_values(unserialize($this->session->userdata('pizzaCart')));
        $price = 0;

        if(!empty($pizza_data)){
            foreach ($pizza_data as $pizza) {
                if (!empty($pizza['topping_id'])) {
                    $price += ($pizza['pizza_price'] + $pizza['topping_price']) * $pizza['quantity'];
                } else {
                    $price += $pizza['pizza_price'] * $pizza['quantity'];
                }
            }
            return $price;
        }
    }

    public function sidePrice(){
        $sides = array_values(unserialize($this->session->userdata('sideCart')));
        $price = 0;

        if(!empty($sides)){
            foreach ($sides as $side) {
                $price += $side['price'] * $side['quantity'];
            }
            return $price;
        }
    }

    private function total($pizza_price,$side_price) {

        $total_price = 0;

        if(!empty($pizza_price) && !empty($side_price)){
            $total_price += ($pizza_price+$side_price);
        }else{
            $total_price = !empty($pizza_price)?$pizza_price:$side_price;
        }

        return $total_price;
    }
}