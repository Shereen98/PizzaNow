<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    const CUSTOMER_SESSION = "customer";

    public function index()
    {
        $this->load->view('checkoutpage');
    }

    public function confirmOrder(){

        $this->addCustomer();

        $data['customer'] = $this->getCustomer(self::CUSTOMER_SESSION);
        $data['delivery_time'] = $this->getDeliveryTime();
        $this->load->view('confirmationpage',$data);

    }

    public function addCustomer(){

        $customer = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'street_no' => $this->input->post('street_no'),
            'city' => $this->input->post('city'),
            'mobile' => $this->input->post('mobile')
        );

        $customer_details = array($customer);
        $this->session->set_userdata(self::CUSTOMER_SESSION, serialize($customer_details));
    }

    public function getDeliveryTime(){
        date_default_timezone_set('Asia/Colombo');
        $currentTime = time();
        $formatTime = date(" H:i:s",$currentTime);

        return date('H:i A',strtotime('+30 minutes',strtotime($formatTime)));
    }

    public function getCustomer($session_name){
        $customer_session = '';

        if($this->session->has_userdata($session_name)) {
            $customer_session = array_values(unserialize($this->session->userdata($session_name)));
        }
        return $customer_session;
    }

    public function destroySession(){
        session_destroy();

        $this->load->view('homepage');
    }
}