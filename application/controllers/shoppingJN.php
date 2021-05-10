<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ShoppingJN extends CI_Controller {

    static $helper = array('url');

    public function __construct() {
        parent::__construct();
        $this->load->helper(self::$helper);
        $this->load->database();
        $this->load->model(array('M_cloud'));
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('email');
        //$this->load->library('pagination');
        //$this->load->library(array('cart'));
        $this->load->library('upload');
        //$this->load->library('cart');
        //isAuthenticate();
    }

    public function index() {
        $data['quantity'] = $this->input->post('qty');
        $this->session->set_userdata($data);
        $userid = $this->session->userdata('auid');
        if (!empty($userid)) {
            redirect('deliveryJN');
        } else {
            redirect('shoppingJN');
        }

        $this->load->view('journalDetailsPage');
    }

    public function carts() {
        $price = $this->input->post('price');
        $proid = $this->input->post('proid');
        $qty = $this->input->post('qty');

        $result = $this->M_cloud->find('book_manage', array('bkId' => $proid));

        $data2 = array(
            'id' => $proid,
            'proid' => $proid,
            'qty' => $qty,
            'name' => $result->bkName,
            'price' => $price,
            'productcode' => $result->bkcode,
            'productImage' => $result->bkImage
        );

        $this->cart->insert($data2);

        redirect('shopping');
    }

    public function deleteCartItem() {
        $row_id = $this->input->post('row_id');
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);
    }

    public function update() {
        $qun = $this->input->post('qun');

        $rowid = $this->input->post('rowid');

        $data = array('rowid' => $rowid,
            'price' => $cart['price'],
            'amount' => $price * $qun,
            'qty' => $qun
        );

        $this->cart->update($data);
        redirect('shopping');
    }

}

?>