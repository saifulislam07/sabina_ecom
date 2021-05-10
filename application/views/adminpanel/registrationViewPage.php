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
							<li class="active">Registration View Manage</li>
						</ul>
					</div>
					
					<div class="page-content" id="listView">
						<div class="row">
							
							
							
							<div>
							
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">SN</th>
											<th>Name</th>
											<th>Email Address</th>
											<th>Mobile</th>
											<th>Address</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									
									<?php 
									$i=1;
									foreach($registrationViewlist as $v) {
										
									?> 
									
										<tr>
											<td class="center"><?php echo $i++; ?></td>
											<td><?php echo $v->name; ?></td>
											<td><?php echo $v->email; ?></td>
											<td><?php echo $v->phone; ?></td>
											<td><?php echo $v->address; ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="red delete" href="<?php echo site_url("adminpanel/registrationView/delete/" . $v->regid); ?>">
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