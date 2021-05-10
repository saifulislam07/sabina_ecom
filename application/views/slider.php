<div id="slider">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
		 <?php
		 	$i = 0; 
			foreach($sliderList as $v) {
			
			if($i == 0){
			$active = "active";
			} else {
			$active = "";
			}
		?> 
      <div class="item <?php  echo $active; ?>"> <img src="<?php echo base_url("uploads/".$v->slideimage); ?>" alt="slideimage" class="center-block img-responsive">
        <div class="carousel-caption">
          <p><?php echo $v->sltitle; ?></p>
        </div>
      </div>
      <?php $i++; } ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
	</div>
</div>

