<?php

	class M_cloud extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
			
		public function save($table, $data)
		{
			$this->db->insert($table, $data); 
		}
		
		public function save2($table, $data)
		{
			$this->db->insert($table, $data); 
			return $this->db->insert_id();       
		}
		
		//find
		public function tbWhRow($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		//basicall
		public function tbObyRow($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->row();
		}
		public function minprice($where)
		{
		$this->db->select_min('proprice');
		$this->db->from('products_manage');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
		}
		
		public function maxprice($where)
		{
		$this->db->select_max('proprice');
		$this->db->from('products_manage');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row();
		}
		//findAll
		public function tbObyResult($table, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		//whereOederbyResult
		public function tbWhObyResult($table, $where, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function tbWhResult($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function tbOn6WhObyResult($table, $where, $onset, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->limit(6, $onset);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function tbOn4WhObyResult($table, $where, $onset, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->limit(4, $onset);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function thWhGpbyResult($table, $where, $groupby)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by($groupby);
			//$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		public function thGpbyResult($table, $groupby)
		{
			$this->db->select('*');
			$this->db->from($table);
			//$this->db->where($where);
			$this->db->group_by($groupby);
			//$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function thOn4WhGpbyResult($table, $where, $onset, $groupby)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->limit(4, $onset);
			$this->db->where($where);
			$this->db->group_by($groupby);
			//$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function tbOn2WhObyResult($table, $where, $onset, $orderbyid)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->limit(2, $onset);
			$this->db->where($where);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function tbOn3WhOrbyResult($table, $where, $onset, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(3, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		
			
		public function tbOrbyRow($table, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->row();
			}
			
		public function tbWhOrbyRow($table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
			        $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->row();
			}	
			
				
		
		
		public function categorylist($table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
				$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function subcategory($table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    $this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
		public function productbyId($table, $where)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    $this->db->where($where);
				//$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->row();
			}
			
		
			
		public function whereOederbyRow($table, $where)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    $this->db->where($where);
				//$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->row();
			}
			
		public function Row($table, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				//$this->db->limit(10, $onset);
			    //$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
			
			
			
			
			
			
			
			
			
			
		
		public function findrawitem($onset, $table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(10, $onset);
				$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
			
			
			
		public function findbyidWhere($onset, $table, $where, $orderbyid)
			{
				$this->db->select('*');
				$this->db->from($table);
				$this->db->limit(20, $onset);
				$this->db->where($where);
				$this->db->order_by($orderbyid);
				$query = $this->db->get();
				return $query->result();
			}
		
		
		
		

		public function findWithOrder($table, $where, $order)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where, NULL, FALSE);
			$this->db->order_by($order);
			$query = $this->db->get();
			return $query->row();
		}

		public function findSummation($select, $table, $where = array())
		{
			$this->db->select($select);
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		public function findReport($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		
		public function incomeinfo($table, $where)
		{
			$this->db->select('*, SUM(debit_amount) as debit_amount, SUM(credit_amount) as credit_amount');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by('chart_of_account');
			$query = $this->db->get();
			return $query->result();
		}
		
		public function expanseinfo($table, $where)
		{
			$this->db->select('*, SUM(credit_amount) as credit_amount, SUM(debit_amount) as debit_amount');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->group_by('chart_of_account');
			$query = $this->db->get();
			return $query->result();
		}	
		
		
		
		
		public function middelcont1($table, $order)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($order);
			$this->db->limit(1,0);
			$query = $this->db->get();
			return $query->row();
		}		
		
		public function middelcont2($table, $order)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($order);
			$this->db->limit(2,1);
			$query = $this->db->get();
			return $query->row();
		}	
		
		
		
		public function findAllReport($table, $where, $order = '')
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			if(!empty($order)) $this->db->order_by($order);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function findAllExpensecash($table, $id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where(array('expenseId' => $id));
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findcashCust($table, $id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where(array('paidCustId' => $id));
			$query = $this->db->get();
			return $query->row();
		}	
		
		public function passwordCheck($table,$oldPassword, $id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where(array('password' => $oldPassword, 'userid' =>$id));
			$query = $this->db->get();
			return $query->row();
		}	
		
		
		
		
		public function findRightView()
		{
			$this->db->select('*');
			$this->db->from(self::TABLE);
			$this->db->order_by("id", "desc");
			$this->db->where(array('status' => "aprove"));
			$this->db->limit(16,4);
			$query = $this->db->get();
			return $query->result();
		}	
		
		public function findMiddleView()
		{
			$this->db->select('*');
			$this->db->from(self::TABLE);
			$this->db->order_by("id", "desc");
			$this->db->where(array('status' => "aprove"));
			$this->db->limit(15,0);
			$query = $this->db->get();
			return $query->result();
		}	
		
		public function findById($table,$id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('AutoId', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		 public function total_rows($table, $where)
			   {
				 
				    $this->db->select('*');
					$this->db->where($where);
					$this->db->from($table);
					return $this->db->count_all_results();
			   }
		
		
		public function findCashBypayId($table,$id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('paidSuplyId', $id);
			$query = $this->db->get();
			return $query->row();
		}


		public function findAllPurchaseDetails($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			//if(!empty($details_id)) $this->db->where_not_in('AutoId', $details_id);
			$this->db->where($where);
			//$this->db->where('hand_qty', 'pur_quantity', FALSE);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllSoldPurchaseDetails($pur_id)
		{
			$this->db->select('*');
			$this->db->from('purchase_details');
			$this->db->where('pur_id', $pur_id);
			$this->db->where('hand_qty < pur_quantity', NULL, FALSE);
			$query = $this->db->get();
			return $query->result();
		}

		public function findAllFifoDetails($where)
		{
			$this->db->select('*');
			$this->db->from('selling_fifo');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function update($table, $data, $id)
		{
			$this->db->update($table, $data, array('AutoId' => $id));        
		}
		
		public function passupdate($table, $data, $id)
		{
			$this->db->update($table, $data, array('userid' => $id));
		}
		
		public function destroy($table, $id)
		{
			$this->db->delete($table, array('AutoId' => $id));        
		}
		
		public function destroyBank($table, $id)
		{
			$this->db->delete($table, array('suPayRecId' => $id));        
		}
		
		public function destroyExpenseBank($table, $id)
		{
			$this->db->delete($table, array('expenseIdbank' => $id));        
		}
		
		public function destroyBankCust($table, $id)
		{
			$this->db->delete($table, array('custPayId' => $id));        
		}
		
		public function destroyCash($table, $id)
		{
			$this->db->delete($table, array('paidSuplyId' => $id));        
		}
		public function destroyExpenseCash($table, $id)
		{
			$this->db->delete($table, array('expenseId' => $id));        
		}
		public function destroyCashCust($table, $id)
		{
			$this->db->delete($table, array('paidCustId' => $id));        
		}

		public function updateAll($table, $data, $where)
		{
			$this->db->update($table, $data, $where);        
		}
		
		public function destroyAll($table, $where)
		{
			$this->db->delete($table, $where);        
		}

		public function destroyallpurchase($table, $where)
		{
			$this->db->delete($table, $where);        
		}
		
		public function findPurchaseNoMax($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("pur_no", "desc");
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findinvoiceNoMax($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("invoice_no", "desc");
			//$this->db->where('AutoId', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findpayNoMax($table, $where)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by("receNo", "desc");
			$query = $this->db->get();
			return $query->row();
		 }
		 
		 
		 public function findMaxId($table, $where, $orderbyId)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($orderbyId);
			$query = $this->db->get();
			return $query->row();
		 }
		 
		 
		 
		
		 
		
		
		public function findPurchaseLastID($table, $orderbyid) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($orderbyid);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		
		public function adminuserLastId($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by('adminID', 'DESC');
			//$this->db->where('AutoId', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		
		public function findSaleLastID($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("sell_id", "desc");
			//$this->db->where('AutoId', $id);
			$query = $this->db->get();
			return $query->row();
		}
		
		
		public function findStockInfoByProID($table, $where) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function cashinfo($table) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by("AutoId", "desc");
			//$this->db->where('AutoId', $pro_id);
			$query = $this->db->get();
			return $query->row();
		}
		
		public function findMaxSl($table)
		{
			$this->db->select('max(invoice_no) as invoice_no');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->invoice_no+1;
		}
		
		public function findAllAdmin($table, $where = array(), $onset = 0)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by('AutoId', 'desc');
			$this->db->limit(10, $onset); 
			$query = $this->db->get();
			return $query->result();
		}
		
		public function countAll($table, $where = array())
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);			
			return $this->db->count_all_results();
		}
        
		public function findMaxSls($table)
		{
			$this->db->select('max(AutoId) as AutoId');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->AutoId+1;
		}
		public function findMaxSlss($table)
		{
			$this->db->select('max(pur_id) as pur_id');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->pur_id+1;
		}
		
		public function findMaxOp($table)
		{
			$this->db->select('max(op_id) as op_id');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->op_id+1;
		}
		
		public function findMaxReject($table)
		{
			$this->db->select('max(rej_id) as rej_id');
			$this->db->from($table);
			$query = $this->db->get();
			return $query->row()->rej_id+1;
		}
		
			
	}
?>