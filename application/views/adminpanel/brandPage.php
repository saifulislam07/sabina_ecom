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
							<li class="active">Brand Manage</li>
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
											<th>Brand Name</th>
											<th>Image</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($brandList as $v) {
										
									?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->bndname; ?></td>
											<td class="hidden-480"><img height="40" src="<?php echo base_url("uploads/".$v->bndimage); ?>" /></td>
											<td><?php echo $v->status; ?></td>
											
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="green" href="#" data-id="<?php echo $v->bndid; ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>

												<a class="red delete" href="<?php echo site_url("adminpanel/brand/delete/" . $v->bndid); ?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>
										
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
						<form id="addForm" action="<?php echo site_url('adminpanel/brand/store'); ?>" method="post">
							<input type="hidden" name="id" id="id" value="" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add Brand</h4>
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
													<label for="pro_name">Brand Name</label>
													<div>
														<input type="text" name="bndname" id="bndname"  tabindex="1" 
														class="form-control" required placeholder="Brand Name"  value="" />
													</div>
												</div>
												
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
														<label for="comlogo">Brand image</label> &nbsp;&nbsp;&nbsp; (Height 200px X Width 400px)
														<div>
															<div>
															 <div class="attachmentbody" data-target="#bndimage" data-type="bndimage">
																<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
															  </div> 
																<input name="bndimage" id="bndimage" type="hidden" value="" tabindex="2" required />
															</div>
														</div>
													</div>
												
												</div>
												
												<div class="form-group">
													<label for="pro_name">Status</label>
													<div>
														<select class="form-control" name="status" id="status" tabindex="3">
															<option value="Active" selected="selected">Active</option>
                											<option value="Inactive">Inactive</option>
														</select>
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
			var formURL = "<?php echo site_url('adminpanel/brand/updated'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.bndid);
					$('#bndname').val(data.bndname);
					$('#status').val(data.status);
					$('.update').text("Update");
				}
			});
			
			e.preventDefault();
		});
	
	
		
	//update End
	
	
	
	$('.delete').click(function (){
       var answer = confirm("Are you sure delete this data?");
          if (answer) {
             return true;
          }else{
             return false;
          }
    });
	
	
	
	
</script>

<script src="<?php echo site_url("adapter/javascript");?>"></script>
		<script src="<?php echo base_url("resource/imageupload_js/ajaxupload.3.5.js"); ?>"></script>	
			
			
<?php echo $this->load->view("adminpanel/footer"); ?>