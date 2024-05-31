<style type="text/css">
.MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 90%; position:relative; }
.MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
.MultiCarousel .MultiCarousel-inner .item { float: left;}
.MultiCarousel .MultiCarousel-inner .item > div { text-align: left; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
.MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
.MultiCarousel .leftLst { left:0; }
.MultiCarousel .rightLst { right:0; }

.MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
</style>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="section-title-col ">
				<div style="text-align: left;padding-top: 50px;padding-bottom: : 50px;padding-left: 10px;padding-right: 10px;">

					<div class="panel panel-default">
						<div class="panel-body">

							<fieldset>
								<legend>PUBLIKASI - <?=$dt->header?></legend>
								<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
									<h3><?=$dt->header?></h3>
									<h4><?=$dt->keterangan?></h4>
									<img src="<?=base_url().$dt->image?>" alt="..."    >
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12" >
									<p><?=$dt->isi?></p>
								</div>
               <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                <hr>
              </div>
              <div class="container">
                <div class="row">
                  <div class="MultiCarousel" data-items="1,3,5,6,8,9" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                      <?php
                      foreach ($list_data as $key => $value) {
                       ?>
                       <div class="item">
                        <div class="pad15">
                          <a href="<?=base_url()?>index.php/konten/publikasi_detail/<?=$value->id ?>" title="<?=$value->header?>" width="253"><img src="<?=base_url().$value->image?>" alt="..." class="team-img"></a>
                          <br/>
                          <br/>
                          <!-- <div class="caption">
                            <h4 style="text-align: left;"><?php echo anchor('konten/publikasi_detail/'.$value->id,$value->header, 'class=""') ?></h4>
                            <p><?=$value->keterangan?></p>
                          </div> -->
                        </div>
                      </div>                      
                    <?php } ?>

                  </div>
                  <button class="btn btn-primary leftLst"><</button>
                  <button class="btn btn-primary rightLst">></button>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
      var condition = $(this).hasClass("leftLst");
      if (condition)
        click(1, this);
      else
        click(1, this)
    });

    ResCarouselSize();

    $(window).resize(function () {
      ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
      var incno = 0;
      var dataItems = ("data-items");
      var itemClass = ('.item');
      var id = 0;
      var btnParentSb = '';
      var itemsSplit = '';
      var sampwidth = $(itemsMainDiv).width();
      var bodyWidth = $('body').width();
      $(itemsDiv).each(function () {
        id = id + 1;
        var itemNumbers = $(this).find(itemClass).length;
        btnParentSb = $(this).parent().attr(dataItems);
        itemsSplit = btnParentSb.split(',');
        $(this).parent().attr("id", "MultiCarousel" + id);


        if (bodyWidth >= 1200) {
          incno = itemsSplit[1];
          itemWidth = sampwidth / incno;
        }
        else if (bodyWidth >= 992) {
          incno = itemsSplit[1];
          itemWidth = sampwidth / incno;
        }
        else if (bodyWidth >= 768) {
          incno = itemsSplit[1];
          itemWidth = sampwidth / incno;
        }
        else {
          incno = itemsSplit[0];
          itemWidth = sampwidth / incno;
        }
        $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
        $(this).find(itemClass).each(function () {
          $(this).outerWidth(itemWidth);
        });

        $(".leftLst").addClass("over");
        $(".rightLst").removeClass("over");

      });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
      var leftBtn = ('.leftLst');
      var rightBtn = ('.rightLst');
      var translateXval = '';
      var divStyle = $(el + ' ' + itemsDiv).css('transform');
      var values = divStyle.match(/-?[\d\.]+/g);
      var xds = Math.abs(values[4]);
      if (e == 0) {
        translateXval = parseInt(xds) - parseInt(itemWidth * s);
        $(el + ' ' + rightBtn).removeClass("over");

        if (translateXval <= itemWidth / 2) {
          translateXval = 0;
          $(el + ' ' + leftBtn).addClass("over");
        }
      }
      else if (e == 1) {
        var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
        translateXval = parseInt(xds) + parseInt(itemWidth * s);
        $(el + ' ' + leftBtn).removeClass("over");

        if (translateXval >= itemsCondition - itemWidth / 2) {
          translateXval = itemsCondition;
          $(el + ' ' + rightBtn).addClass("over");
        }
      }
      $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
      var Parent = "#" + $(ee).parent().attr("id");
      var slide = $(Parent).attr("data-slide");
      ResCarousel(ell, Parent, slide);
    }

  });
</script>

