<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DeliveryJN extends CI_Controller {

    static $helper = array('url');

    public function __construct() {
        parent::__construct();
        $this->load->helper(self::$helper);
        $this->load->database();
        $this->load->model(array('M_cloud', 'M_join'));
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('email');
        //$this->load->library('pagination');
        //$this->load->library(array('cart'));
        $this->load->library('upload');
        //$this->load->library('cart');
        $this->load->library('table');
        //isAuthenticate();
    }

    public function index() {
        $userid = $this->session->userdata('auid');

        $data['baseinformation'] = $this->M_cloud->basicall('basic_manage', 'bsId desc');
        /// menu start
        $where1 = array('status' => 'Active');
        $data['bookCategoryList'] = $this->M_cloud->whereOederbyResult('book_category_manage', $where1, 'bkCatId desc');
        $where2 = array('status' => 'Active');
        $data['journalAllList'] = $this->M_cloud->whereOederbyResult('journal_category_manage', $where2, 'jnCatId desc');
        $where3 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->whereOederbyResult('category_manage', $where3, 'CatId desc');
        /// menu end
        $where4 = array('menuName' => 'LatestNews');
        $data['latestNewsList'] = $this->M_cloud->whereOederbyResult('content_manage', $where4, 'conId desc');
        $where5 = array('status' => 'Active', 'bkType' => 'upcomingBook');
        $data['upcomingBookkList'] = $this->M_cloud->find('book_manage', $where5, 'bkId desc');
        $where6 = array('status' => 'Active', 'bkType' => 'mostViewedBook');
        $data['mostViewList'] = $this->M_cloud->tbOn3WhOrbyResult('book_manage', $where6, $onset, 'bkId desc');
        $where7 = array('status' => 'Active', 'bkType' => 'latestBook');
        $data['latestBookList'] = $this->M_cloud->tbOn3WhOrbyResult('book_manage', $where7, $onset, 'bkId desc');
        $where8 = array('status' => 'Active', 'menuName' => 'PublishWithUs');
        $data['publishWithUsList'] = $this->M_cloud->tbWhOrbyRow('content_manage', $where8, 'conId desc');

        $data['userinfo'] = $this->M_cloud->find('signup_form', array('regId' => $userid));

        $this->load->view('delivery_addressJN', $data);
    }

    public function deliveryconfim() {
        $this->load->library('session');
        $userid = $this->session->userdata('auid');
        $productid = $this->session->userdata('productid');
        $quantity = $this->session->userdata('quantity');
        $productdetails = $this->M_cloud->find('journal_manage', array('jnId' => $productid));

        $uniqidAut = time();
        $uniqid = array('uniqid' => $uniqidAut);
        $this->session->set_userdata($uniqid);

        $data['uniq_id'] = $uniqidAut;
        $data['customer_id'] = $userid;
        $data['product_id'] = $productdetails->jnId;
        $data['product_price'] = $productdetails->jnPrice;
        $data['product_qty'] = $quantity;
        $data['order_status'] = "Pending";
        $data['cartType'] = "Journal";
        $data['order_date_time'] = date('Y-m-d');

        $data1['name'] = $this->input->post('name');
        $data1['email'] = $this->input->post('email');
        $data1['mobile'] = $this->input->post('mobile');
        $data1['address'] = $this->input->post('address');
        $this->db->update('signup_form', $data1, array('regId' => $userid));

        $this->db->insert('order_details', $data);

        redirect('deliveryJN/paymentProcess/');
    }

    public function paymentprocess($repayid) {
        $userid = $this->session->userdata('auid');

        $data['baseinformation'] = $this->M_cloud->basicall('basic_manage', 'bsId desc');
        /// menu start
        $where1 = array('status' => 'Active');
        $data['bookCategoryList'] = $this->M_cloud->whereOederbyResult('book_category_manage', $where1, 'bkCatId desc');
        $where2 = array('status' => 'Active');
        $data['journalAllList'] = $this->M_cloud->whereOederbyResult('journal_category_manage', $where2, 'jnCatId desc');
        $where3 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->whereOederbyResult('category_manage', $where3, 'CatId desc');
        /// menu end
        $where4 = array('menuName' => 'LatestNews');
        $data['latestNewsList'] = $this->M_cloud->whereOederbyResult('content_manage', $where4, 'conId desc');
        $where5 = array('status' => 'Active', 'bkType' => 'upcomingBook');
        $data['upcomingBookkList'] = $this->M_cloud->find('book_manage', $where5, 'bkId desc');
        $where6 = array('status' => 'Active', 'bkType' => 'mostViewedBook');
        $data['mostViewList'] = $this->M_cloud->tbOn3WhOrbyResult('book_manage', $where6, $onset, 'bkId desc');
        $where7 = array('status' => 'Active', 'bkType' => 'latestBook');
        $data['latestBookList'] = $this->M_cloud->tbOn3WhOrbyResult('book_manage', $where7, $onset, 'bkId desc');
        $where8 = array('status' => 'Active', 'menuName' => 'PublishWithUs');
        $data['publishWithUsList'] = $this->M_cloud->tbWhOrbyRow('content_manage', $where8, 'conId desc');

        $where9 = array('status' => 'Active', 'payinType' => 'Bank');
        $data['payInfoBankList'] = $this->M_cloud->tbWhOrbyRow('payment_information', $where9, 'payinId desc');
        $where10 = array('status' => 'Active', 'payinType' => 'Bkash');
        $data['payInfoBkashList'] = $this->M_cloud->tbWhOrbyRow('payment_information', $where10, 'payinId desc');

        $data['userinfo'] = $this->M_cloud->find('signup_form', array('regId' => $userid));

        $data['repayid'] = $repayid;

        $this->load->view('paymentProcessJNPage', $data);
    }

    public function paymentprocessAction() {
        $uniqid = $this->session->userdata('uniqid');

        $repayid = $this->input->post('repayid');

        $data['paymentType'] = $this->input->post('paymentType');
        $data['receiptNumber'] = $this->input->post('receiptNumber');
        $data['bankAccountNumber'] = $this->input->post('bankAccountNumber');
        $data['bankAccountName'] = $this->input->post('bankAccountName');
        $data['bankName'] = $this->input->post('bankName');
        $data['amount'] = $this->input->post('amount');
        $data['paymentDate'] = $this->input->post('paymentDate');

        $data2['paymentType'] = $this->input->post('paymentType');
        $data2['bankAccountNumber'] = $this->input->post('bankAccountNumberBK');
        $data2['amount'] = $this->input->post('amountBK');
        $data2['paymentDate'] = $this->input->post('paymentDateBK');

        if (empty($repayid)) {
            if ($data['paymentType'] == "Bank") {
                $this->db->update('order_details', $data, array('uniq_id' => $uniqid));
            } else {
                $this->db->update('order_details', $data2, array('uniq_id' => $uniqid));
            }
        } else {
            if ($data['paymentType'] == "Bank") {
                $this->db->update('order_details', $data, array('order_id' => $repayid));
            } else {
                $this->db->update('order_details', $data2, array('order_id' => $repayid));
            }
        }

        redirect('deliveryJN/orderhistory');
    }

    public function orderhistory() {
        $userid = $this->session->userdata('auid');

        $data['baseinformation'] = $this->M_cloud->basicall('basic_manage', 'bsId desc');
        /// menu start
        $where1 = array('status' => 'Active');
        $data['bookCategoryList'] = $this->M_cloud->whereOederbyResult('book_category_manage', $where1, 'bkCatId desc');
        $where2 = array('status' => 'Active');
        $data['journalAllList'] = $this->M_cloud->whereOederbyResult('journal_category_manage', $where2, 'jnCatId desc');
        $where3 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->whereOederbyResult('category_manage', $where3, 'CatId desc');
        /// menu end
        $where4 = array('menuName' => 'LatestNews');
        $data['latestNewsList'] = $this->M_cloud->whereOederbyResult('content_manage', $where4, 'conId desc');
        $where5 = array('status' => 'Active', 'bkType' => 'upcomingBook');
        $data['upcomingBookkList'] = $this->M_cloud->find('book_manage', $where5, 'bkId desc');
        $where6 = array('status' => 'Active', 'bkType' => 'mostViewedBook');
        $data['mostViewList'] = $this->M_cloud->tbOn3WhOrbyResult('book_manage', $where6, $onset, 'bkId desc');
        $where7 = array('status' => 'Active', 'bkType' => 'latestBook');
        $data['latestBookList'] = $this->M_cloud->tbOn3WhOrbyResult('book_manage', $where7, $onset, 'bkId desc');
        $where8 = array('status' => 'Active', 'menuName' => 'PublishWithUs');
        $data['publishWithUsList'] = $this->M_cloud->tbWhOrbyRow('content_manage', $where8, 'conId desc');

        $data['orderlist'] = $this->M_join->orderhistory_M($userid);
        $data['orderJNlist'] = $this->M_join->orderhistoryJN_M($userid);

        $this->load->view('orderHistoryPage', $data);
    }

}

?>