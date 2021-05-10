<?php echo $this->load->view("adminpanel/header"); ?>

<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs" id="breadcrumbs">
      <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
      <ul class="breadcrumb">
        <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a> </li>
        <li class="active">Basic Information</li>
      </ul>
    </div>
    <div class="page-content" id="listView">
      <div class="row">
        <div class="table-header" align="right"> <a href="#modal-form" role="button" class="label label-xlg label-light arrowed-in-right blue"
								 data-toggle="modal" style="text-decoration:none;"> <i class="ace-icon fa fa-plus"></i> </a> </div>
        <div>
          <?php if(!empty($success)){?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> &nbsp; &nbsp;<?php echo $success; ?> </div>
          <?php }?>
          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="center"> SN </th>
                <th>website Title</th>
                <th>Phone</th>
                <th>Company E-mail</th>
                <th>website link</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
				<?php 
					$i=1;
					foreach($basicinfo as $v) {
				?>
              <tr>
                <td class="center"><?php echo $i++; ?></td>
                <td><?php echo $v->title; ?></td>
                <td class="hidden-480"><?php echo $v->phone; ?></td>
                <td><?php echo $v->eamil; ?></td>
                <td><?php echo $v->website; ?></td>
                <td><div class="hidden-sm hidden-xs action-buttons"> <a class="green" href="#" data-id="<?php echo $v->bsId ?>"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> </div></td>
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
  <form id="addForm" action="<?php echo site_url('adminpanel/basicinformation/store'); ?>" method="post">
    <input type="hidden" name="id" id="id" value="" />
    <div class="modal-dialog" style="width:680px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="blue bigger">Basic Information</h4>
        </div>
        <div class="modal-body">
          <?php if($this->input->get('status') == 'success') { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Save Successfull. </div>
          <?php } ?>
          <div class="row">
            <div class="col-xs-12 col-sm-11">
              <div class="form-group">
                <label for="pro_name">Website Title</label>
                <div>
                  <input type="text" name="title" id="title"  tabindex="1" 
														class="form-control" required  value="" />
                </div>
              </div>
              <div class="form-group">
                <label for="pro_name">Company Name</label>
                <div>
                  <input type="text" name="companyName" id="companyName"  tabindex="2" 
														class="form-control" required  value="" />
                </div>
              </div>
              <div class="form-group">
                <label for="pro_code">Phone Number</label>
                <div>
                  <input type="text" name="phone" id="phone"  tabindex="3" 
														class="form-control" required value=""  />
                </div>
              </div>
              <div class="form-group">
                <label for="pro_unit">E-mail</label>
                <div>
                  <input type="email" name="eamil" id="eamil" tabindex="4" 
														class="form-control" required value=""  />
                </div>
              </div>
              <div class="form-group">
                <label for="pro_unit">Website Link</label>
                <div>
                  <input type="text" name="website" id="website" tabindex="5" 
														class="form-control" required value=""  />
                </div>
              </div>
              <div class="form-group">
                <label for="purchase_price">Address </label>
                <div>
                  <textarea class="form-control" rows="3" name="addres" id="addres" value="" placeholder="Please Enter Address...."></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="comlogo">Company Logo Upload</label>
                (image height 200px X width 40px)
                <div>
                  <div>
                    <div class="attachmentbody" data-target="#comlogo" data-type="comlogo"> <img class="upload" src="<?php echo base_url('resource/img/no_image.jpg') ?>" /> </div>
                    <input name="comlogo" id="comlogo" type="hidden" value="" required />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-sm" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Cancel </button>
          <button class="btn btn-sm btn-primary update" type="submit"> <i class="ace-icon fa fa-check"></i> Save </button>
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
			var formURL = "<?php echo site_url('adminpanel/basicinformation/updated'); ?>";			
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : {id:id},
				dataType: "json",
				success:function(data){
					$('#modal-form').modal('show');
					$('#id').val(data.bsId);
					$('#title').val(data.title);
					$('#companyName').val(data.companyName);
					$('#phone').val(data.phone);
					$('#eamil').val(data.eamil);
					$('#website').val(data.website);
					$('#addres').val(data.addres);
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