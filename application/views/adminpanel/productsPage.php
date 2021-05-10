<?php echo $this->load->view("adminpanel/header"); ?>				
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Product Manage</li>
			</ul>
		</div>
		<div class="page-content" id="listView">
			<div class="row">
				<div class="table-header" align="right">											
					<a href="#modal-form" role="button" class="label label-xlg label-light arrowed-in-right blue"
					 data-toggle="modal" style="text-decoration:none;">  <i class="ace-icon fa fa-plus"></i> 	 </a>
				</div>
				<div>
					<?php if(!empty($success)){?> 
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Success!</strong> &nbsp; &nbsp;<?php echo $success; ?>
					</div>
					<?php }?>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="center">SN</th>
								<th>Sub Category Name</th>
								<th>Product Name</th>
								<th>Code</th>
								<th>Qty</th>
								<th>Discount</th>
								<th>Old Price</th>
								<th>Price</th>
								<th>Images</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
						
						<?php 
							$i=1;
							foreach($productsList as $v) {
						?> 
						
						<tr>
							<td class="center"><?php echo $i++; ?></td>
							<td><?php echo $v->subcatname; ?></td>
							<td><?php echo $v->proname; ?></td>
							<td><?php echo $v->procode; ?></td>
							<td><?php echo $v->quantity; ?></td>
							<td><?php echo $v->discount; ?></td>
							<td><?php echo $v->prooldprice; ?></td>
							<td><?php echo $v->proprice; ?></td>
							<td class="hidden-480"><img height="40" src="<?php echo base_url("uploads/".$v->proimage); ?>" /></td>
							<td><?php echo $v->status; ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="#" data-id="<?php echo $v->proid; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>

								<a class="red delete" href="<?php echo site_url("adminpanel/products/delete/" . $v->proid); ?>"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
								</div>
							</td>
						</tr>
							
						<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
			
			
			
			
			
<div id="modal-form" class="modal" tabindex="-1" data-backdrop="static">
			<form id="addForm" action="<?php echo site_url('adminpanel/products/store'); ?>" method="post">
				<input type="hidden" name="id" id="id" value="" />
				<div class="modal-dialog" style="width:680px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="blue bigger">Add Product</h4>
						</div>

						<div class="modal-body">
							<?php if($this->input->get('status') == 'success') { ?>
							<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Success!</strong> Save Successfull.
							</div>
							<?php } ?>
							
							<div class="row">
								<div class="col-xs-12 col-sm-11">
									
									<div class="form-group">
										<label for="pro_name">Category Name</label>
										<div>
											<select class="form-control" name="catid" id="catid" tabindex="1" value="" required>
											  <option> --- Select Category Name ---</option>
											  <?php foreach($categoryList as $v) {?> 
											  <option value="<?php echo $v->catid; ?>"><?php echo $v->catname; ?></option>
											 <?php } ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Sub Category Name</label>
										<div id="subbycat">
											<select class="form-control" name="subcatid" id="subcatid" tabindex="2" value="" required>
											  <option> --- Select Sub Category Name ---</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Brand Name</label>
										<div>
											<select class="form-control" name="bndname" id="bndname" tabindex="3" value="">
											  <option> --- Select Brand Name ---</option>
											  <?php foreach($brandList as $v) {?> 
											  <option value="<?php echo $v->bndname; ?>"><?php echo $v->bndname; ?></option>
											 <?php } ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Product Name</label>
										<div>
											<input type="text" name="proname" id="proname"  tabindex="4" 
											class="form-control" required placeholder="Product Name"  value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Product Code</label>
										<div>
											<input type="text" name="procode" id="procode"  tabindex="5" 
											class="form-control" placeholder=" Product Code"  value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Product Size</label>
										<div>
											<input type="text" name="prosize" id="prosize"  tabindex="6" 
											class="form-control" required placeholder="Product Size"  value="" />
										</div>
									</div>
									
									<div class="row form-group">
										<div class="col-md-6">
											<label for="pro_name">Product Color Name</label>
											<div>
												<input type="text" name="colorname" id="colorname"  tabindex="7" 
												class="form-control" required placeholder="Product Color Name"  value="" />
											</div>
										</div>
										<div class="col-md-6">
											<label for="pro_name">Product Color Code</label>
											<div>
												<input type="text" name="colorcode" id="colorcode"  tabindex="8" 
												class="form-control" required placeholder="Product Color Code"  value="" />
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Quantity</label>
										<div>
											<input type="number" name="quantity" id="quantity" onkeydown="return false" min="1"  tabindex="9" 
											class="form-control" placeholder=" Quantity" required  value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Discount</label>
										<div>
											<input type="text" name="discount" id="discount"  tabindex="10" 
											class="form-control" placeholder="Discount"  value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Old Price</label>
										<div>
											<input type="text" name="prooldprice" id="prooldprice"  tabindex="11" 
											class="form-control" placeholder=" Old Price"  value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Price</label>
										<div>
											<input type="text" name="proprice" id="proprice"  tabindex="12" 
											class="form-control" placeholder=" Price"  value=""  />
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">You tube video embed code</label>
										<div>
											<input type="text" name="embedcode" id="embedcode"  tabindex="13" 
											class="form-control" placeholder=" Embed Code" value=""  />
										</div>
									</div>
									
									<div class="row" style="padding-left:15px;">
									<div class="form-group">
										<label for="comlogo">Products Images</label> &nbsp;&nbsp;&nbsp;(width-1200px X height-1600px)
											<div>
												<div>
												 <div class="attachmentbody" data-target="#proimage" data-type="proimage">
													<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
												  </div> 
													<input name="proimage" id="proimage" type="hidden" value="" tabindex="14" />
												</div>
												<div>
												 <div class="attachmentbody" data-target="#proimage1" data-type="proimage1">
													<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
												  </div> 
													<input name="proimage1" id="proimage1" type="hidden" value="" tabindex="15" />
												</div>
												<div>
												 <div class="attachmentbody" data-target="#proimage2" data-type="proimage2">
													<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
												  </div> 
													<input name="proimage2" id="proimage2" type="hidden" value="" tabindex="16" />
												</div>
												<div>
												 <div class="attachmentbody" data-target="#proimage3" data-type="proimage3">
													<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
												  </div> 
													<input name="proimage3" id="proimage3" type="hidden" value="" tabindex="17" />
												</div>
												<div>
												 <div class="attachmentbody" data-target="#proimage4" data-type="proimage4">
													<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
												  </div> 
													<input name="proimage4" id="proimage4" type="hidden" value="" tabindex="18" />
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="pro_name">Status</label>
										<div>
											<select class="form-control" name="status" id="status" tabindex="19">
												<option value="Active" selected="selected">Active</option>
												<option value="Inactive">Inactive</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label for="">Product  Details </label>
										<div>
											<textarea class="form-control" rows="12" name="prodetails" id="ajaxfilemanager" value="" tabindex="20" style="height:400px;"></textarea>
										</div>
									</div>
								
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-sm" data-dismiss="modal">
								<i class="ace-icon fa fa-times"></i>
								Cancel
							</button>

							<button class="btn btn-sm btn-primary update" type="submit">
								<i class="ace-icon fa fa-check"></i>
								Save
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
			
			
			
			
<script>
	
		//$(".edit").click(function(e)
		$(document).on("click", ".green", function(e)
		{
			var id 		= $(this).attr("data-id");
			var formURL = "<?php echo site_url('adminpanel/products/updated'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.proid);
					$('#catid').val(data.catid);
					$('#bndname').val(data.bndname);
					$('#proname').val(data.proname);
					$('#procode').val(data.procode);
					$('#prosize').val(data.prosize);
					$('#colorname').val(data.colorname);
					$('#colorcode').val(data.colorcode);
					$('#quantity').val(data.quantity);
					$('#discount').val(data.discount);
					$('#prooldprice').val(data.prooldprice);
					$('#proprice').val(data.proprice);
					$('#embedcode').val(data.embedcode);
					$('#status').val(data.status);
					$('#ajaxfilemanager').val(data.prodetails);
					tinyMCE.get('ajaxfilemanager').setContent(data.prodetails);
					$('.update').text("Update");
					subcatbycat(data.catid, data.subcatid);
					
				}
			});
			
			e.preventDefault();
		});
		
		
		
		function subcatbycat(catid, subcatid){
			$.ajax({
				url : "<?php echo site_url('adminpanel/products/subcatlistbycat'); ?>",
				type : "POST",
				data : { id : catid },
				dataType : "html",
				success : function(data) {          
					$("#subbycat").html(data);
					$('#subcatid').val(subcatid);
				}
			});
		};
		
		
	
	//update End
	
	$('.delete').click(function (){
       var answer = confirm("Are you sure delete this data?");
          if (answer) {
             return true;
          }else{
             return false;
          }
    });
	
	
	
	$("#catid").change(function() {
	var catid = $("#catid").val();
	$.ajax({
		url : "<?php echo site_url('adminpanel/products/subName'); ?>",
		type : "POST",
		data : { id : catid },
		dataType : "html",
		success : function(data) {          
			$("#subcatid").html(data);
		}
	});
});

</script>	
			
			
<?php echo $this->load->view("adminpanel/footer"); ?>