<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    const CART_SESSION = "cart";
    const PIZZA_SESSION = "pizzaCart";
    const SIDE_SESSION = "sideCart";
    const MEAL_SESSION = "mealCart";
    const DELIVERY_CHARGE = 150.00;

    public function index()
    {
        $this->addToCart();

        $data['cart'] = $this->getSessions(self::CART_SESSION);
        $data['pizza'] = $this->getSessions(self::PIZZA_SESSION);
        $data['side'] = $this->getSessions(self::SIDE_SESSION);
        $data['meal'] = $this->getSessions(self::MEAL_SESSION);

        $this->load->view('cart', $data);
    }

    public function checkout(){

        $data['cart'] = $this->getSessions(self::CART_SESSION);
        $data['pizza'] = $this->getSessions(self::PIZZA_SESSION);
        $data['side'] = $this->getSessions(self::SIDE_SESSION);
        $data['meal'] = $this->getSessions(self::MEAL_SESSION);

        $this->load->view('checkoutpage', $data);

    }

    public function addToCart(){
        $item = array(
            'quantity' => $this->getQuantity(self::PIZZA_SESSION)+$this->getQuantity(self::SIDE_SESSION),
            'price' => $this->getTotalPrice(),
            'sub_total' => $this->getSubTotal(),
            'delivery_charge' => self::DELIVERY_CHARGE
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
            'quantity' => $qty,
            'sub_total' => $price*$qty
        );

            $pizza_cart = array($item);
            $this->session->set_userdata(self::PIZZA_SESSION, serialize($pizza_cart));
    }


    public function addSide(){

        $id = $this->input->post('id');
        $qty = $this->input->post('qty');

        $side = $this->menu->getSide($id);
        $item = array(
            'id' => $side['side_id'],
            'name' => $side['side_name'],
            'description' => $side['side_description'],
            'image' => $side['side_image'],
            'price' => $side['price'],
            'portion' => $side['side_portion'],
            'quantity' => $qty,
            'sub_total' => $side['price']*$qty
        );

            $side_cart = array($item);
            $this->session->set_userdata(self::SIDE_SESSION, serialize($side_cart));
    }

    public function addMeal(){

        $id = $this->input->post('id');
        $qty = $this->input->post('qty');

        $meal = $this->menu->getMeal($id);
        $item = array(
            'id' => $meal['deal_id'],
            'name' => $meal['deal_name'],
            'description' => $meal['deal_description'],
            'image' => $meal['deal_image'],
            'price' => $meal['price'],
            'quantity' => $qty,
            'sub_total' => $meal['price']*$qty
        );

        $meal_cart = array($item);
        $this->session->set_userdata(self::MEAL_SESSION, serialize($meal_cart));
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

    public function removeSide($id)
    {
        $session_index = $this->isItemAvailable($id,self::SIDE_SESSION);
        $side_cart = array_values(unserialize($this->session->userdata(self::SIDE_SESSION)));
        unset($side_cart[$session_index]);
        $this->session->set_userdata(self::SIDE_SESSION, serialize($side_cart));
        redirect('index.php/cart');
    }

    public function removePizza($id){
        $session_index = $this->isItemAvailable($id,self::PIZZA_SESSION);
        $pizza_cart = array_values(unserialize($this->session->userdata(self::PIZZA_SESSION)));
        unset($pizza_cart[$session_index]);
        $this->session->set_userdata(self::PIZZA_SESSION, serialize($pizza_cart));
        redirect('index.php/cart');
    }

    public function removeMeal($id){
        $session_index = $this->isItemAvailable($id,self::MEAL_SESSION);
        $meal_cart = array_values(unserialize($this->session->userdata(self::MEAL_SESSION)));
        unset($meal_cart[$session_index]);
        $this->session->set_userdata(self::MEAL_SESSION, serialize($meal_cart));
        redirect('index.php/cart');
    }

    private function isItemAvailable($id,$session_name)
    {
        $cart_content = array_values(unserialize($this->session->userdata($session_name)));
        for ($i = 0; $i < count($cart_content); $i ++) {
            if ($cart_content[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function getPrice($session_name){

        $price = 0;

        if($this->session->has_userdata($session_name)) {
            $data = array_values(unserialize($this->session->userdata($session_name)));
            if (!empty($data)) {
                foreach ($data as $item) {
                    $price += $item['price'] * $item['quantity'];
                }
                return $price;
            }
        }
        return $price;
    }

    public function getSubTotal(){
        $pizza_price = $this->getPrice(self::PIZZA_SESSION);
        $side_price = $this->getPrice(self::SIDE_SESSION);
        $meal_price = $this->getPrice(self::MEAL_SESSION);

        return $pizza_price+$side_price+$meal_price;
    }

    public function getTotalPrice(){
        return $this->getSubTotal() + self::DELIVERY_CHARGE;
    }

    public function updatePizzaCart($id,$updateType){

        if($this->session->has_userdata(self::PIZZA_SESSION)){
            $cart = array_values(unserialize($this->session->userdata(self::PIZZA_SESSION)));

            for ($i = 0; $i < count($cart); $i ++) {
                if($cart[$i]['id'] == $id ){
                    if($updateType == 'increment'){

                        $cart[$i]['quantity'] += 1;
                        $cart[$i]['sub_total'] += $cart[$i]['price'];
                        $this->session->set_userdata(self::PIZZA_SESSION, serialize($cart));


                    }else {
                        if ($cart[$i]['quantity'] > 1) {
                            $cart[$i]['quantity'] = $cart[$i]['quantity'] - 1;
                            $cart[$i]['sub_total'] = $cart[$i]['sub_total'] - $cart[$i]['price'];
                            $this->session->set_userdata(self::PIZZA_SESSION, serialize($cart));
                        }
                    }
                }

            }
        }
        redirect('index.php/cart');
    }

    public function updateSideCart($id,$updateType){

        if($this->session->has_userdata(self::SIDE_SESSION)){
            $cart = array_values(unserialize($this->session->userdata(self::SIDE_SESSION)));
            for ($i = 0; $i < count($cart); $i ++) {
                if($cart[$i]['id'] == $id ){
                    if($updateType == 'increment'){

                        $cart[$i]['quantity'] += 1;
                        $cart[$i]['sub_total'] +=  $cart[$i]['price'];
                        $this->session->set_userdata(self::SIDE_SESSION, serialize($cart));

                    }else{
                        if($cart[$i]['quantity']>1){
                            $cart[$i]['quantity'] = $cart[$i]['quantity'] - 1;
                            $cart[$i]['sub_total'] = $cart[$i]['sub_total'] - $cart[$i]['price'];
                            $this->session->set_userdata(self::SIDE_SESSION, serialize($cart));
                        }
                    }
                }
            }
        }
        redirect('index.php/cart');
    }

    public function updateMealCart($id,$updateType){

        if($this->session->has_userdata(self::MEAL_SESSION)){
            $cart = array_values(unserialize($this->session->userdata(self::MEAL_SESSION)));
            for ($i = 0; $i < count($cart); $i ++) {
                if($cart[$i]['id'] == $id ){
                    if($updateType == 'increment'){

                        $cart[$i]['quantity'] += 1;
                        $cart[$i]['sub_total'] +=  $cart[$i]['price'];
                        $this->session->set_userdata(self::MEAL_SESSION, serialize($cart));

                    }else{
                        if($cart[$i]['quantity']>1){
                            $cart[$i]['quantity'] = $cart[$i]['quantity'] - 1;
                            $cart[$i]['sub_total'] = $cart[$i]['sub_total'] - $cart[$i]['price'];
                            $this->session->set_userdata(self::MEAL_SESSION, serialize($cart));
                        }
                    }
                }
            }
        }
        redirect('index.php/cart');
    }
}