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
							<li class="active">Sub Category Manage</li>
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
											<th>Category Name</th>
											<th>Sub Category Name</th>
											<th>Images</th>
											<th>Status</th>
											<th>Position</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($subCategoryList as $v) {
										
									?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->catname; ?></td>
											<td><?php echo $v->subcatname; ?></td>
											<td class="hidden-480"><img height="40" src="<?php echo base_url("uploads/".$v->subcatimage); ?>" /></td>
											<td><?php echo $v->status; ?></td>
											<td><?php echo $v->subcatposition; ?></td>
											
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="green" href="#" data-id="<?php echo $v->subcatid ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>

												<a class="red delete" href="<?php echo site_url("adminpanel/subcategory/delete/" . $v->subcatid); ?>">
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
						<form id="addForm" action="<?php echo site_url('adminpanel/subcategory/store'); ?>" method="post">
							<input type="hidden" name="id" id="id" value="" />
							<div class="modal-dialog" style="width:680px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="blue bigger">Add Sub Category</h4>
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
														<select class="form-control" name="catid" id="catid" tabindex="1" value="">
														  <option> --- Select Category Name ---</option>
														  <?php foreach($categoryList as $v) {?> 
														  <option value="<?php echo $v->catid; ?>"><?php echo $v->catname; ?></option>
														 <?php } ?>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Sub Category Name</label>
													<div>
														<input type="text" name="subcatname" id="subcatname"  tabindex="2" 
														class="form-control" required placeholder="Sub Category Name"  value="" />
													</div>
												</div>
												
												<div class="form-group">
													<label for="pro_name">Sub Category Title</label>
													<div>
														<input type="text" name="subcattitle" id="subcattitle"  tabindex="3" 
														class="form-control" placeholder="Sub Category Title"  value="" />
													</div>
												</div>
												
												<div class="row" style="padding-left:15px;">
												<div class="form-group">
													<label for="comlogo"> Images Upload</label> &nbsp;&nbsp;&nbsp; ( Width-1600px X Height-600px )
													<div>
														<div class="col-md-2" style="padding:0px">
														 <div class="attachmentbody" data-target="#subcatimage" data-type="subcatimage">
															<img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" />
														  </div> 
															<input name="subcatimage" id="subcatimage" type="hidden" value="" tabindex="4" required />
														</div>
														<div class="col-md-10">
															 <div><strong>Home Page</strong> [Position : ( 1-500px X 580px ), ( 2-9500px X 730px ), ( 3-1200px X 300px ), ( 4,6,7,8-400px X 264px ), ( 5-450px X 640px )]</div>
															 <div><strong>Cosmetics Page</strong> [Position : ( 1-1600px X 600px ), ( 2, 3, 4-800px X 500px )]</div>
														</div>
													</div>
													</div>
												
												</div>
												
												<div class="form-group">
													<label for="pro_name">Status</label>
													<div>
														<select class="form-control" name="status" id="status" tabindex="5">
															<option value="Active" selected="selected">Active</option>
                											<option value="Inactive">Inactive</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="pro_name">Position</label>
													<div>
														<select class="form-control" name="subcatposition" id="subcatposition" tabindex="6">
															<option value="" selected="selected">--- Select Position ---</option>
                											<option value="Home 1">Position 1 (Home Page)</option>
															<option value="Home 2">Position 2 (Home Page)</option>
															<option value="Home 3">Position 3 (Home Page)</option>
															<option value="Home 4">Position 4 (Home Page)</option>
															<option value="Home 5">Position 5 (Home Page)</option>
															<option value="Home 6">Position 6 (Home Page)</option>
															<option value="Home 7">Position 7 (Home Page)</option>
															<option value="Home 8">Position 8 (Home Page)</option>
															<option value="Lingerie 1">Position 1 (Lingerie Page)</option>
															<option value="Lingerie 2">Position 2 (Lingerie Page)</option>
															<option value="Cosmetics 1">Position 1 (Cosmetics Page)</option>
															<option value="Cosmetics 2">Position 2 (Cosmetics Page)</option>
															<option value="Cosmetics 3">Position 3 (Cosmetics Page)</option>
															<option value="Cosmetics 4">Position 4 (Cosmetics Page)</option>
															<option value="Shoes 1">Position 1 (Shoes Page)</option>
															<option value="Shoes 2">Position 2 (Shoes Page)</option>
															<option value="Shoes 3">Position 3 (Shoes Page)</option>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label for="">Sub Category  Details </label>
													<div>
									<textarea class="form-control" rows="12" name="subcatdetails" id="ajaxfilemanager" value="" tabindex="7" style="height:400px;"></textarea>
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
	/*
	//callback handler for form submit
		$("#addForm").submit(function(e)
		{
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			console.log(postData);
			console.log($("#ajaxfilemanager").val());
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data){
					$("#listView").html(data);				
					//$("#addForm").find("input[type=text], textarea").val("");
					$("#addForm input[type='text'], input[type='password'], input[type='hidden'], input[type='number'], input[type='email'], #addForm textarea, #addForm input[type='number").val("");
					$('.update').remove("Update");
					
				}
			});
			
			e.preventDefault();
		});
*/
	
		
	
	
		//$(".edit").click(function(e)
		$(document).on("click", ".green", function(e)
		{
			var id 		= $(this).attr("data-id");
			var formURL = "<?php echo site_url('adminpanel/subcategory/updated'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.subcatid);
					$('#catid').val(data.catid);
					$('#subcatname').val(data.subcatname);
					$('#subcattitle').val(data.subcattitle);
					$('#status').val(data.status);
					$('#subcatposition').val(data.subcatposition);
					$('#ajaxfilemanager').val(data.subcatdetails);
					tinyMCE.get('ajaxfilemanager').setContent(data.subcatdetails);
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