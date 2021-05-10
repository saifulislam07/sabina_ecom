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
							<li class="active">Content Manage</li>
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
											<th>Menu Name</th>
											<th>Title</th>
											<th>Images</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($conentmanaeList as $v) {
										
										?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->menuname; ?></td>
											<td><?php echo $v->conttitle; ?></td>
											<td class="hidden-480"><img height="40" src="<?php echo base_url("uploads/".$v->contimage); ?>" /></td>
											<td><?php echo $v->status; ?></td>
											
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="green" href="#" data-id="<?php echo $v->contid ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>
													
													<a class="red delete" href="<?php echo site_url("adminpanel/contentmanage/delete/" . $v->contid); ?>">
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
						<form id="addForm" action="<?php echo site_url('adminpanel/contentmanage/store'); ?>" method="post">
							<input type="hidden" name="id" id="id" value="" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add Others Menu / Content</h4>
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
													<label for="pro_name">Menu Name</label>
													<div>
														<input type="text" name="menuname" id="menuname"  tabindex="1" 
														class="form-control" required placeholder=" Menu Name"  value="" />
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Title</label>
													<div>
														<input type="text" name="conttitle" id="conttitle"  tabindex="2" 
														class="form-control" required placeholder=" Title"  value="" />
													</div>
												</div>
												
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
														<label for="comlogo">Images Upload</label> &nbsp;&nbsp;(1000px X 350px)
														<div>
															<div>
															 <div class="attachmentbody" data-target="#contimage" data-type="contimage">
																<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
															  </div> 
																<input name="contimage" id="contimage" type="hidden" value="" tabindex="3" required />
															</div>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Status</label>
													<div>
														<select class="form-control" name="status" id="status" tabindex="4">
															<option value="Active" selected="selected">Active</option>
                											<option value="Inactive">Inactive</option>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label for="purchase_price">Details </label>
													<div>
									<textarea class="form-control" rows="3" name="contdetails" id="ajaxfilemanager" value="" style="height:400px;"></textarea>
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
			var formURL = "<?php echo site_url('adminpanel/contentmanage/updated'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.contid);
					$('#menuname').val(data.menuname);
					$('#conttitle').val(data.conttitle);
					$('#status').val(data.status);
					$('#ajaxfilemanager').val(data.contdetails);
					tinyMCE.get('ajaxfilemanager').setContent(data.contdetails);
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
			
			
<?php echo $this->load->view("adminpanel/footer"); ?>