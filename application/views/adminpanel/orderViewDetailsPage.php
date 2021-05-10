<?php echo $this->load->view("adminpanel/header"); ?>

<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs" id="breadcrumbs">
      <script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
	</script>
      <ul class="breadcrumb">
        <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a> </li>
        <li class="active">Order View Details</li>
      </ul>
    </div>
    <div class="page-content" id="listView">
      <div class="row">
        <div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th><a class="btn btn-success btn-sm" href="<?php echo site_url("adminpanel/orderView"); ?>"><<< Unpaid</a> Unpaid Order View</th>
                <th style="text-align:right;">Paid Order View <a class="btn btn-primary btn-sm" href="<?php echo site_url("adminpanel/orderView/paidOrderView"); ?>">Paid >>></a></th>
              </tr>
            </thead>
          </table>
		  <div id="printableArea">
          <table id="dynamic-table" class="table">
            <tbody>
              <tr>
                <th>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<tbody>
					<tr>
					<th style="text-decoration:underline;">BILLING ADDRESS</th>
					</tr>
					<tr>
					<td>Name : <small><?php echo $ordDtladrsList->name; ?></small></td>
					</tr>
					<tr>
					<td>Email : <small><?php echo $ordDtladrsList->email; ?></small></td>
					</tr>
					<tr>
					<td>Mobile : <small><?php echo $ordDtladrsList->phone; ?></small></td>
					</tr>
					<tr>
					<td>Address : <small><?php echo $ordDtladrsList->address; ?></small></td>
					</tr>
					</tbody>
					</table>
		  		</th>
				<th>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<tbody>
					<tr>
					<th style="text-decoration:underline;">SHIPPING ADDRESS</th>
					</tr>
					<tr>
					<td>Name : <small><?php echo $ordDtladrsList->spname; ?></small></td>
					</tr>
					<tr>
					<td>Email : <small><?php echo $ordDtladrsList->spemail; ?></small></td>
					</tr>
					<tr>
					<td>Mobile : <small><?php echo $ordDtladrsList->spphone; ?></small></td>
					</tr>
					<tr>
					<td>Address : <small><?php echo $ordDtladrsList->spaddress; ?></small></td>
					</tr>
					</tbody>
					</table>
		  		</th>
				<th>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<tbody>
					<tr><th style="text-decoration:underline;">Payment Information</th></tr>
					<?php if($ordPmtInfoList->paymenttype == "Cash on delivery") { ?>
						<tr><td><strong>Payment Type :</strong> <small><?php echo $ordPmtInfoList->paymenttype; ?></small></td></tr>
					 <?php } ?>
					 <?php if($ordPmtInfoList->paymenttype == "Bank") { ?>
					<tr><td><strong>Receipt Number :</strong> <small><?php echo $ordPmtInfoList->receiptnumber; ?></small></td></tr>
					<tr><td><strong>Account Number :</strong> <small><?php echo $ordPmtInfoList->bankaccountnumber; ?></small></td></tr>
					<tr><td><strong>Account Name :</strong> <small><?php echo $ordPmtInfoList->bankaccountname; ?></small></td></tr>
					<tr><td><strong>Bank Name :</strong> <small><?php echo $ordPmtInfoList->bankname; ?></small></td></tr>
					<tr><td><strong>Amount :</strong> <small><?php echo $ordPmtInfoList->amount; ?></small></td></tr>
					<tr><td><strong>Payment Date :</strong> <small><?php echo $ordPmtInfoList->paymentdate; ?></small></td></tr>
					<?php } ?>
					<?php if($ordPmtInfoList->paymenttype == "Bkash") { ?>
					<tr><td><strong>Bkash Number :</strong> <small><?php echo $ordPmtInfoList->bankaccountnumber; ?></small></td></tr>
					<tr><td><strong>Amount :</strong> <small><?php echo $ordPmtInfoList->amount; ?></small></td></tr>
					<tr><td><strong>Payment Date :</strong> <small><?php echo $ordPmtInfoList->paymentdate; ?></small></td></tr>
					<?php } ?>
					</tbody>
					</table>
		  		</th>
              </tr>
            </tbody>
          </table>
		  
          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                
                <th>Image</th>
                <th>Name</th>
                <th>Code</th>
				<th>Size</th>
                <th>Quantity</th>
                <th style="text-align:right;">Total</th>
              </tr>
            </thead>
            <tbody>
			<?php $total = 0; foreach($ordDtlList as $v) { $total = $total + $v->subtotal;  $orderstatus = $v->orderstatus; ?>
              <tr>
				<td><img height="50" src="<?php echo base_url("uploads/".$v->proimage); ?>"></td>
                <td><?php echo $v->proname; ?></td>
                <td><?php echo $v->procode; ?></td>
                <td><?php echo $v->prosize; ?></td>
				<td><?php echo $v->qty; ?></td>
                <td style="text-align:right;"><?php echo $v->subtotal; ?></td>
              </tr>
			  
			  <?php } ?>
            </tbody>
			
			<tbody>
			<tr>
			<td></td><td></td><td></td><td></td>
			 <td style="text-align:right;">Shipping Cost :</td>
			 <td style="text-align:right;">100</td>
              </tr>
            </tbody>
			
			<thead>
              <tr>
			  	<th style="text-align:right;">Invoice No :</th>
			  	<th><?php echo $ordPmtInfoList->invoiceno; ?></th>
				<th style="text-align:right;">Order Date :</th>
				<th><?php echo $ordPmtInfoList->orderdate; ?></th>
				<th style="text-align:right;">Total : <?php echo $orderstatus; ?></th>
                <th style="text-align:right;"><?php echo $total +100; ?></th>
			  </tr>
			</thead>
          </table>
		  </div>
		  
		   <?php if($orderstatus == 'Paid') { ?>
          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th style="text-align:right;">Click for print <a class="btn btn-primary btn-sm" href="#" onclick="printDiv('printableArea')"> Print </a></th>
              </tr>
            </thead>
          </table>
		  <?php } else { ?>
		  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th style="text-align:right;">Order Paid Confirm <a class="btn btn-primary btn-sm" href="<?php echo site_url("adminpanel/orderViewDetails/confirmPaid/".$ordPmtInfoList->invoiceno); ?>" onclick="printDiv('printableArea')"> Paid </a></th>
              </tr>
            </thead>
          </table>
		  <?php } ?>
		  
        </div>
      </div>
    </div>
  </div>
</div>
<script>
	$('.delete').click(function (){
       var answer = confirm("Are you sure delete this data?");
          if (answer) {
             return true;
          }else{
             return false;
          }
    });
	
<!---------------------- print start ------------------------->	
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
<?php echo $this->load->view("adminpanel/footer"); ?>