<?php echo $this->load->view("adminpanel/header"); ?>

<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs" id="breadcrumbs">
      <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
      <ul class="breadcrumb">
        <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a> </li>
        <li class="active">Order View Manage</li>
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
          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="center"> SN </th>
                <th>Invoice No</th>
                <th>Date</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
					$i=1;
					foreach($ordertViewlist as $v) {
			  ?>
              <tr>
                <td class="center"><?php echo $i++; ?></td>
                <td><?php echo $v->invoiceno; ?></td>
                <td><?php echo $v->orddtldate; ?></td>
                <td><?php echo $v->name; ?></td>
                <td><?php echo $v->phone; ?></td>
                <td><?php echo $v->sumsubtotal + 100; ?></td>
                <td><?php echo $v->orderstatus; ?></td>
                <td><div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="<?php echo site_url("adminpanel/orderViewDetails/index/".$v->invoiceno.'/'.$v->regid); ?>"> <i class="fa fa-file-text-o" aria-hidden="true bigger-130" title="Details"></i> </a>
				
				<a class="red delete" href="<?php echo site_url("adminpanel/orderView/delete/" . $v->invoiceno); ?>" title="Delete"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> </div></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
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
	
	
	
	
</script>
<?php echo $this->load->view("adminpanel/footer"); ?>