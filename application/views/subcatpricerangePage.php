<?php foreach($subcatpricerangeList as $v) { ?>
      <div class="col-md-4">
        <div class="row prview2"> <a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="proimg"><img class="img-responsive" src="<?php echo base_url("uploads/".$v->proimage); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a><?php if($v->discount) { ?><span class="badge2"><?php echo $v->discount; ?>%</span><?php } else {?><?php } ?><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="proimg hover"><img class="img-responsive" src="<?php echo base_url("uploads/".$v->proimage1); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a>
          <div class="prview3"><?php echo $v->proname; ?></div>
          <div>
            <div class="col-md-9 prview4"><?php echo $v->proprice; ?> TK &nbsp;&nbsp;
              <?php if(!$v->prooldprice == '0') { ?>
              <span class="prview5"><?php echo $v->prooldprice; ?> TK</span>
              <?php } ?>
            </div>
            <div class="col-md-3 prview6"><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="prview7"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></div>
          </div>
        </div>
      </div>
<?php } ?>