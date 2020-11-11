<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    const CART_SESSION = "cart";
    const PIZZA_SESSION = "pizzaCart";
    const SIDE_SESSION = "sideCart";

    public function index()
    {
        $this->getCart();
        $data['cart'] = $this->getSessions(self::CART_SESSION);
        $data['pizza'] = $this->getSessions(self::PIZZA_SESSION);
        $data['side'] = $this->getSessions(self::SIDE_SESSION);

        $this->load->view('cart', $data);
    }

    public function getCart(){
        $item = array(
            'quantity' => $this->getQuantity(self::PIZZA_SESSION)+$this->getQuantity(self::SIDE_SESSION),
            'price' => $this->getTotalPrice(self::PIZZA_SESSION)+$this->getTotalPrice(self::SIDE_SESSION)
        );
        $cart = array($item);
        $this->session->set_userdata(self::CART_SESSION, serialize($cart));
    }

    public function addPizza()
    {
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');

        $pizza = $this->menu->getPizza($id);

        $item = array(
            'id' => $pizza['pizza_id'],
            'name' => $pizza['pizza_name'],
            'description' => $pizza['pizza_description'],
            'image' => $pizza['pizza_image'],
            'price' => $price,
            'quantity' => $qty
        );
        if(!$this->session->has_userdata(self::PIZZA_SESSION)) {
            $cart = array($item);
            $this->session->set_userdata(self::PIZZA_SESSION, serialize($cart));
        } else {
            $index = $this->exists($id,self::PIZZA_SESSION);
            $cart = array_values(unserialize($this->session->userdata(self::PIZZA_SESSION)));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata(self::PIZZA_SESSION, serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata(self::PIZZA_SESSION, serialize($cart));
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

        if(!$this->session->has_userdata(self::SIDE_SESSION)) {
            $cart = array($item);
            $this->session->set_userdata(self::SIDE_SESSION, serialize($cart));
        } else {
            $index = $this->exists($id,self::SIDE_SESSION);
            $cart = array_values(unserialize($this->session->userdata(self::SIDE_SESSION)));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata(self::SIDE_SESSION, serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata(self::SIDE_SESSION, serialize($cart));
            }
        }
//        $this->load->view('cart');
        redirect('cart');
    }

    public function getSessions($session_name){
        $cart_session = '';

        if($this->session->has_userdata($session_name)) {
            $cart_session = array_values(unserialize($this->session->userdata($session_name)));
        }
        return $cart_session;
    }

    public function getQuantity($session_name){
        $quantity = 0;


        if($this->session->has_userdata($session_name)){
            $cart = array_values(unserialize($this->session->userdata($session_name)));
            for ($i = 0; $i < count($cart); $i ++) {
                $quantity +=$cart[$i]['quantity'];
            }
            return $quantity;
        }
        return $quantity;
    }

    public function getTotalPrice($session_name){
        $price = 0;

        if($this->session->has_userdata($session_name)){
            $cart = array_values(unserialize($this->session->userdata($session_name)));
            for ($i = 0; $i < count($cart); $i ++) {
                $price +=$cart[$i]['price'];
            }
            return $price;
        }
        return $price;
    }

    public function removeSide($id)
    {
        $index = $this->exists($id,self::SIDE_SESSION);
        $cart = array_values(unserialize($this->session->userdata(self::SIDE_SESSION)));
        unset($cart[$index]);
        $this->session->set_userdata(self::SIDE_SESSION, serialize($cart));
        redirect('cart');

//       session_destroy();
    }

    public function removePizza($id){
        $index = $this->exists($id,self::PIZZA_SESSION);
        $cart = array_values(unserialize($this->session->userdata(self::PIZZA_SESSION)));
        unset($cart[$index]);
        $this->session->set_userdata(self::PIZZA_SESSION, serialize($cart));
        redirect('cart');
    }

    private function exists($id,$session_name)
    {
        $cart = array_values(unserialize($this->session->userdata($session_name)));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function pizzaPrice(){
        $pizza_data = array_values(unserialize($this->session->userdata(self::PIZZA_SESSION)));
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