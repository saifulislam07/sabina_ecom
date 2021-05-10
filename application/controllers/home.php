<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    static $helper = array('url');

    public function __construct() {
        parent::__construct();
        $this->load->helper(self::$helper);
        $this->load->database();
        $this->load->model(array('M_cloud', 'M_join'));
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library(array('cart'));
        $this->load->library('form_validation');
        $this->load->library('email');
        //$this->load->library('pagination');
        $this->load->library('upload');
        //$this->load->library('cart');
        //isAuthenticate();
    }

    public function index() {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());

        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where = array('status' => 'Active');
        $data['sliderList'] = $this->M_cloud->tbWhObyResult('slide_manage', $where, 'slId desc');
        $where1 = array('status' => 'Active', 'subcatposition' => 'Home 1');
        $data['subcatPosation1List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where1);
        $where2 = array('status' => 'Active', 'subcatposition' => 'Home 2');
        $data['subcatPosation2List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where2);
        $where3 = array('status' => 'Active', 'subcatposition' => 'Home 3');
        $data['subcatPosation3List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where3);
        $where4 = array('status' => 'Active', 'subcatposition' => 'Home 4');
        $data['subcatPosation4List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where4);
        $where5 = array('status' => 'Active', 'subcatposition' => 'Home 5');
        $data['subcatPosation5List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where5);
        $where6 = array('status' => 'Active', 'subcatposition' => 'Home 6');
        $data['subcatPosation6List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where6);
        $where7 = array('status' => 'Active', 'subcatposition' => 'Home 7');
        $data['subcatPosation7List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where7);
        $where8 = array('status' => 'Active', 'subcatposition' => 'Home 8');
        $data['subcatPosation8List'] = $this->M_cloud->tbWhRow('sub_category_manage', $where8);
        $where9 = array('status' => 'Active');
        $data['productSliderList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where9, 'procode, colorname desc');
        $where10 = array('status' => 'Active');
        $data['brandsList'] = $this->M_cloud->tbOn6WhObyResult('brands_manage', $where10, $onset, 'bndid desc');
        $where11 = array('status' => 'Active');
        $data['homeContentList'] = $this->M_cloud->tbOn4WhObyResult('home_content', $where11, $onset, 'hmcontid desc');

        $where12 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where12, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $this->load->view('home', $data);
    }

//==================================== Category State ===========================================//	
    public function category($catid) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'catid' => $catid);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $data['minprice'] = $this->M_cloud->minprice($where2);
        $data['maxprice'] = $this->M_cloud->maxprice($where2);

        $where3 = array('status' => 'Active', 'catid' => $catid);
        $data['catNameList'] = $this->M_cloud->tbWhRow('category_manage', $where3);

        $where5 = array('status' => 'Active', 'catid' => $catid);
        $data['catsizeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where5, 'prosize');
        $where6 = array('status' => 'Active', 'catid' => $catid);
        $data['catcolorList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where6, 'colorname');

        $this->load->view('categoryPage', $data);
    }

    public function catpricerange($catid) {
        $lowprice = $this->input->get('low');
        $highprice = $this->input->get('high');

        $where2 = array('status' => 'Active', 'catid' => $catid);
        if ($lowprice > 0)
            $where2['proprice >='] = $lowprice;
        if ($highprice > 0)
            $where2['proprice <='] = $highprice;
        $data['catpricerangeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');

        $this->load->view('catpricerangePage', $data);
    }

    public function categorySizeSearch($catid, $prosize) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'catid' => $catid, 'prosize' => $prosize);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $data['minprice'] = $this->M_cloud->minprice($where2);
        $data['maxprice'] = $this->M_cloud->maxprice($where2);

        $where3 = array('status' => 'Active', 'catid' => $catid);
        $data['catNameList'] = $this->M_cloud->tbWhRow('category_manage', $where3);
        $where4 = array('status' => 'Active', 'prosize' => $prosize);
        $data['catSizeNameList'] = $this->M_cloud->tbWhRow('products_manage', $where4);

        $where5 = array('status' => 'Active', 'catid' => $catid);
        $data['catsizeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where5, 'prosize');
        $where6 = array('status' => 'Active', 'catid' => $catid);
        $data['catcolorList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where6, 'colorname');

        $this->load->view('categorySizeSearchPage', $data);
    }

    public function catpricerangeSize($catid, $prosize) {
        $lowprice = $this->input->get('low');
        $highprice = $this->input->get('high');

        $where2 = array('status' => 'Active', 'catid' => $catid, 'prosize' => $prosize);
        if ($lowprice > 0)
            $where2['proprice >='] = $lowprice;
        if ($highprice > 0)
            $where2['proprice <='] = $highprice;
        $data['catpricerangeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');

        $this->load->view('catpricerangePage', $data);
    }

    public function categoryColorSearch($catid, $colorname) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'catid' => $catid, 'colorname' => $colorname);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $data['minprice'] = $this->M_cloud->minprice($where2);
        $data['maxprice'] = $this->M_cloud->maxprice($where2);

        $where3 = array('status' => 'Active', 'catid' => $catid);
        $data['catNameList'] = $this->M_cloud->tbWhRow('category_manage', $where3);
        $where4 = array('status' => 'Active', 'colorname' => $colorname);
        $data['catColorNameList'] = $this->M_cloud->tbWhRow('products_manage', $where4);

        $where5 = array('status' => 'Active', 'catid' => $catid);
        $data['catsizeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where5, 'prosize');
        $where6 = array('status' => 'Active', 'catid' => $catid);
        $data['catcolorList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where6, 'colorname');

        $this->load->view('categoryColorSearchPage', $data);
    }

    public function catpricerangeColor($catid, $colorname) {
        $lowprice = $this->input->get('low');
        $highprice = $this->input->get('high');

        $where2 = array('status' => 'Active', 'catid' => $catid, 'colorname' => $colorname);
        if ($lowprice > 0)
            $where2['proprice >='] = $lowprice;
        if ($highprice > 0)
            $where2['proprice <='] = $highprice;
        $data['catpricerangeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');

        $this->load->view('catpricerangePage', $data);
    }

//==================================== Subcategory State ===========================================//
    public function subCategory($subcatid) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $data['minprice'] = $this->M_cloud->minprice($where2);
        $data['maxprice'] = $this->M_cloud->maxprice($where2);

        $where3 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatNameList'] = $this->M_cloud->tbWhRow('sub_category_manage', $where3);
        $where4 = array('status' => 'Active', 'catid' => $data['subcatNameList']->catid);
        $data['catNameList'] = $this->M_cloud->tbWhRow('category_manage', $where4);

        $where5 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatsizeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where5, 'prosize');
        $where6 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatcolorList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where6, 'colorname desc');

        $this->load->view('subCategoryPage', $data);
    }

    public function subcatpricerange($subcatid) {
        $lowprice = $this->input->get('low');
        $highprice = $this->input->get('high');

        $where2 = array('status' => 'Active', 'subcatid' => $subcatid);
        if ($lowprice > 0)
            $where2['proprice >='] = $lowprice;
        if ($highprice > 0)
            $where2['proprice <='] = $highprice;
        $data['subcatpricerangeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');

        $this->load->view('subcatpricerangePage', $data);
    }

    public function subCategorySizeSearch($subcatid, $prosize) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'subcatid' => $subcatid, 'prosize' => $prosize);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $data['minprice'] = $this->M_cloud->minprice($where2);
        $data['maxprice'] = $this->M_cloud->maxprice($where2);

        $where3 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatNameList'] = $this->M_cloud->tbWhRow('sub_category_manage', $where3);
        $where4 = array('status' => 'Active', 'catid' => $data['subcatNameList']->catid);
        $data['catNameList'] = $this->M_cloud->tbWhRow('category_manage', $where4);
        $where7 = array('status' => 'Active', 'prosize' => $prosize);
        $data['subcatSizeNameList'] = $this->M_cloud->tbWhRow('products_manage', $where7);

        $where5 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatsizeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where5, 'prosize');
        $where6 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatcolorList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where6, 'colorname');

        $this->load->view('subCategorySizeSearchPage', $data);
    }

    public function subcatpricerangeSize($subcatid, $prosize) {
        $lowprice = $this->input->get('low');
        $highprice = $this->input->get('high');

        $where2 = array('status' => 'Active', 'subcatid' => $subcatid, 'prosize' => $prosize);
        if ($lowprice > 0)
            $where2['proprice >='] = $lowprice;
        if ($highprice > 0)
            $where2['proprice <='] = $highprice;
        $data['subcatpricerangeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');

        $this->load->view('subcatpricerangePage', $data);
    }

    public function subCategoryColorSearch($subcatid, $colorname) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'subcatid' => $subcatid, 'colorname' => $colorname);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $data['minprice'] = $this->M_cloud->minprice($where2);
        $data['maxprice'] = $this->M_cloud->maxprice($where2);

        $where3 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatNameList'] = $this->M_cloud->tbWhRow('sub_category_manage', $where3);
        $where4 = array('status' => 'Active', 'catid' => $data['subcatNameList']->catid);
        $data['catNameList'] = $this->M_cloud->tbWhRow('category_manage', $where4);
        $where7 = array('status' => 'Active', 'colorname' => $colorname);
        $data['subcatColorNameList'] = $this->M_cloud->tbWhRow('products_manage', $where7);

        $where5 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatsizeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where5, 'prosize');
        $where6 = array('status' => 'Active', 'subcatid' => $subcatid);
        $data['subcatcolorList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where6, 'colorname');

        $this->load->view('subCategoryColorSearchPage', $data);
    }

    public function subcatpricerangeColor($subcatid, $colorname) {
        $lowprice = $this->input->get('low');
        $highprice = $this->input->get('high');

        $where2 = array('status' => 'Active', 'subcatid' => $subcatid, 'colorname' => $colorname);
        if ($lowprice > 0)
            $where2['proprice >='] = $lowprice;
        if ($highprice > 0)
            $where2['proprice <='] = $highprice;
        $data['subcatpricerangeList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');

        $this->load->view('subcatpricerangePage', $data);
    }

//==================================== Product Details State ===========================================//	
    public function productDetails($proid) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'proid' => $proid);
        $data['productDetailsList'] = $this->M_cloud->tbWhRow('products_manage', $where2);
        $where3 = array('status' => 'Active', 'subcatid' => $data['productDetailsList']->subcatid);
        $data['subcatNameList'] = $this->M_cloud->tbWhRow('sub_category_manage', $where3);
        $where4 = array('status' => 'Active', 'catid' => $data['productDetailsList']->catid);
        $data['catNameList'] = $this->M_cloud->tbWhRow('category_manage', $where4);

        $where5 = array('status' => 'Active', 'procode' => $data['productDetailsList']->procode);
        $data['othercolorsList'] = $this->M_cloud->thOn4WhGpbyResult('products_manage', $where5, $onset, 'colorname');
        $where9 = array('status' => 'Active', 'subcatid' => $data['productDetailsList']->subcatid);
        $data['similarproList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where9, 'procode, colorname desc');

        $this->load->view('productDetailsPage', $data);
    }

    public function carts() {
        $proid = $this->input->post('proid');
        $prosize = $this->input->post('prosize');
        $qty = $this->input->post('quantity');

        $result = $this->M_cloud->tbWhRow('products_manage', array('proid' => $proid));
        $data2 = array(
            'id' => $proid,
            'proid' => $proid,
            'prosize' => $prosize,
            'qty' => $qty,
            'name' => $result->proname,
            'price' => $result->proprice,
            'procode' => $result->procode,
            'proimage' => $result->proimage
        );
        $this->cart->insert($data2);
        redirect('home/cartDetails');
    }

    public function cartDetails() {
        $data['regid'] = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());

        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where9 = array('status' => 'Active', 'catid' => '9');
        $data['othersProList'] = $this->M_cloud->tbWhObyResult('products_manage', $where9, 'proid desc');

        $this->load->view('cartDetailsPage', $data);
    }

    public function deleteCartItem() {
        $row_id = $this->input->post('row_id');
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);
    }

    public function updateCartItem() {
        $qty = $this->input->post('qty');
        $rowid = $this->input->post('rowid');

        $data = array('rowid' => $rowid,
            'price' => $cart['price'],
            'amount' => $price * $qty,
            'qty' => $qty
        );

        $this->cart->update($data);
    }

    public function brandsAllProducts($bndname) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'bndname' => $bndname);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $where3 = array('status' => 'Active', 'bndname' => $bndname);
        $data['brandsNameList'] = $this->M_cloud->tbWhRow('brands_manage', $where3);

        $this->load->view('brandsProductsPage', $data);
    }

    public function brandsProducts() {
        $bndname = $this->input->post('bndname');

        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where2 = array('status' => 'Active', 'bndname' => $bndname);
        $data['productsList'] = $this->M_cloud->thWhGpbyResult('products_manage', $where2, 'procode, colorname desc');
        $where3 = array('status' => 'Active', 'bndname' => $bndname);
        $data['brandsNameList'] = $this->M_cloud->tbWhRow('brands_manage', $where3);

        $this->load->view('brandsProductsPage', $data);
    }

    public function othersMenu($contid) {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $where3 = array('status' => 'Active', 'contid' => $contid);
        $data['otherMenuDetailsList'] = $this->M_cloud->tbWhRow('content_manage', $where3);

        $this->load->view('othersMenuPage', $data);
    }

    public function registration() {
        $data['meg1'] = $this->session->userdata('meg1');
        $this->session->set_userdata(array('meg1' => ""));

        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $this->load->view('registrationPage', $data);
    }

    public function registrationAction() {
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['password'] = md5($this->input->post('password'));
        $data['status'] = "Active";

        $result = $this->M_cloud->tbWhRow('registration_manage', array('email' => $data['email']));

        if ($result->email) {
            $this->session->set_userdata(array('meg1' => 'Email already exists. please try again.'));
            redirect('home/registration');
        } else {
            $this->session->set_userdata(array('email' => $data['email'], 'password' => $data['password']));
            $this->db->insert('registration_manage', $data);
            redirect('userlogin/userLoginAction');
        }
    }

    public function checkemail() {
        $email = $this->input->post('email');
        $result = $this->M_cloud->tbWhRow('registration_manage', array('email' => $email));
        if ($result) {
            echo true;
        } else {
            echo false;
        }
    }

    public function login() {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $this->load->view('loginPage', $data);
    }

    public function forgottenPassword() {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $data['fgtpassalt'] = $this->session->userdata('fgtpassalt');
        $this->session->set_userdata(array('fgtpassalt' => ''));
        $this->load->view('forgottenPasswordPage', $data);
    }

    public function forgottenPasswordAction() {
        $email = $this->input->post('email');
        $result = $this->M_cloud->tbWhRow('registration_manage', array('email' => $email));

        if ($result) {
            $password = time() + 1;
            $data['password'] = md5($password);
            $this->db->update('registration_manage', $data, array('email' => $email));

            $senderEmail = 'info@sabinasecret.com';
            $senderName = 'Sabina Secret';
            $subject = 'Forgotten Password';

            $message = $password;
            $this->email->from($senderEmail, $senderName);
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message('Your new password is ' . $message);
            $this->email->send();
            redirect('home/login');
        } else {

            $this->session->set_userdata(array('fgtpassalt' => 'Your email address is Wrong!'));
            redirect('home/forgottenPassword');
        }
    }

    public function checkfgtpassemail() {
        $email = $this->input->post('email');
        $result = $this->M_cloud->tbWhRow('registration_manage', array('email' => $email));
        if ($result) {
            echo false;
        } else {
            echo true;
        }
    }

    public function contact() {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $this->load->view('contactUsPage', $data);
    }

    public function contactAction() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $subject = $this->input->post('subject');
        $comments = $this->input->post('comments');
        $message = "";

        $message = 'Subject :' . $subject;
        $message .= "\r\n";
        $message .= 'Name :' . $name;
        $message .= "\r\n";
        $message .= 'Mobile :' . $mobile;
        $message .= "\r\n";
        $message .= 'Comments ' . $comments;
        $message .= "\r\n";

        $this->email->set_newline("\r\n");

        //Add file directory if you need to attach a file
        $this->email->attach($file_dir_name);

        $this->email->from($email, $name);
        $this->email->to('mdmuhibullah2@gmail.com');

        $this->email->subject($subject);
        $this->email->message($message);

        redirect('home');
    }

    public function searchAll() {
        $regid = $this->session->userdata('regid');
        $data['rows'] = count($this->cart->contents());
        $data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
        $where1 = array('status' => 'Active');
        $data['menuList'] = $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
        $where13 = array('status' => 'Active');
        $data['otherMenuList'] = $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');

        $search_field = $this->input->post('search_field');
        $data['searchAllList'] = $this->M_join->serchresult($search_field);

        $this->load->view("searchAllPage", $data);
    }

}

?>