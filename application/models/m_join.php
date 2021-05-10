<?php

	class M_join extends CI_Model {
		const TABLE	= '';
		public function __construct()
		{
			parent::__construct();
		}
		
		
		public function subCategory_M()
		{
			$this->db->select('sub_category_manage.*, category_manage.catname');
			$this->db->from('sub_category_manage');
			$this->db->join('category_manage', 'category_manage.catid = sub_category_manage.catid', 'left');
			$this->db->order_by("sub_category_manage.subcatid", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function products_M()
		{
			$this->db->select('products_manage.*, sub_category_manage.subcatname');
			$this->db->from('products_manage');
			$this->db->join('sub_category_manage', 'sub_category_manage.subcatid = products_manage.subcatid', 'left');
			$this->db->order_by("products_manage.proid", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function orderViewPending_M()
		{
			$this->db->select('order_details.*, registration_manage.*, sum(order_details.subtotal) as sumsubtotal');
			$this->db->from('order_details');
			$this->db->join('registration_manage', 'registration_manage.regid = order_details.regid', 'left');
			$this->db->group_by("order_details.invoiceno desc");
			$this->db->where(array('order_details.orderstatus' =>'Pending')); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function orderViewPaid_M()
		{
			$this->db->select('order_details.*, registration_manage.*, sum(order_details.subtotal) as sumsubtotal');
			$this->db->from('order_details');
			$this->db->join('registration_manage', 'registration_manage.regid = order_details.regid', 'left');
			$this->db->group_by("order_details.invoiceno desc");
			$this->db->where(array('order_details.orderstatus' =>'Paid')); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function serchresult($search_field)
		{
			$this->db->select('*');
			$this->db->from('products_manage');
			$this->db->like('proname', $search_field);
			$this->db->or_like('procode', $search_field);
			$this->db->or_like('bndname', $search_field);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		
		
		
		
		
		
		
		
		public function books_M()
		{
			$this->db->select('book_manage.*, book_category_manage.bkCatName');
			$this->db->from('book_manage');
			$this->db->join('book_category_manage', 'book_category_manage.bkCatId = book_manage.bkCatId', 'left');
			$this->db->order_by("book_manage.bkId", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function journal_M()
		{
			$this->db->select('journal_manage.*, journal_category_manage.jnCatName');
			$this->db->from('journal_manage');
			$this->db->join('journal_category_manage', 'journal_category_manage.jnCatId = journal_manage.jnCatId', 'left');
			$this->db->order_by("journal_manage.jnId", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function orderhistory_M($where)
		{
			$this->db->select('order_details.*, book_manage.*, signup_form.*');
			$this->db->from('order_details');
			$this->db->join('book_manage', 'order_details.product_id = book_manage.bkId', 'left');
			$this->db->join('signup_form', 'order_details.customer_id = signup_form.regId', 'left');
			$this->db->where(array('order_details.customer_id' =>$where, 'cartType'=>"Book")); 
			$this->db->order_by("order_details.order_id", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function orderhistoryJN_M($where)
		{
			$this->db->select('order_details.*, journal_manage.*, signup_form.*');
			$this->db->from('order_details');
			$this->db->join('journal_manage', 'order_details.product_id = journal_manage.jnId', 'left');
			$this->db->join('signup_form', 'order_details.customer_id = signup_form.regId', 'left');
			$this->db->where(array('order_details.customer_id' =>$where, 'cartType'=>"Journal")); 
			$this->db->order_by("order_details.order_id", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function orderhistoryall_M()
		{
			$this->db->select('order_details.*, signup_form.*');
			$this->db->from('order_details');
			$this->db->join('signup_form', 'order_details.customer_id = signup_form.regId', 'left');
			$this->db->order_by("order_details.order_id", "desc"); 
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		public function orderDetailsBK_M($where)
		{
			$this->db->select('order_details.*, book_manage.*, signup_form.*');
			$this->db->from('order_details');
			$this->db->join('book_manage', 'order_details.product_id = book_manage.bkId', 'left');
			$this->db->join('signup_form', 'order_details.customer_id = signup_form.regId', 'left');
			$this->db->where(array('order_details.order_id' =>$where, 'cartType'=>"Book")); 
			$query = $this->db->get();
			return $query->row();
		}
		
		public function orderDetailsJN_M($where)
		{
			$this->db->select('order_details.*, journal_manage.*, signup_form.*');
			$this->db->from('order_details');
			$this->db->join('journal_manage', 'order_details.product_id = journal_manage.jnId', 'left');
			$this->db->join('signup_form', 'order_details.customer_id = signup_form.regId', 'left');
			$this->db->where(array('order_details.order_id' =>$where, 'cartType'=>"Journal")); 
			$query = $this->db->get();
			return $query->row();
		}
					
		
	}
?>