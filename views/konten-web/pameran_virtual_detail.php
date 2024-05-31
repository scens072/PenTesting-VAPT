<style type="text/css">
.MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 90%; position:relative; }
.MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
.MultiCarousel .MultiCarousel-inner .item { float: left;}
.MultiCarousel .MultiCarousel-inner .item > div { text-align: left; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
.MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
.MultiCarousel .leftLst { left:0; }
.MultiCarousel .rightLst { right:0; }

.MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }

.video-container {
  position: relative;
  padding-bottom: 56.25%;
  padding-top: 30px; height: 0; overflow: hidden;
}
.video-container iframe,
.video-container object,
.video-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.pameran-content{
  background: linear-gradient(42deg, #8a1b53 0%, #d51870 100%);
  background-size: cover;
}

.container-sub{
  padding-left: 100px;
  padding-right: 100px;
  margin-left: auto;
  margin-right: auto;
}



@media (min-width: 1200px) {
  .container {
    width: 100%;
    padding-right: 0; 
    padding-left: 0; 
    margin-right: 0; 
    margin-left: 0;
  }
  .modal-footer{
    border-top: 0px solid #e5e5e5;
    padding: 50px;
  }
  .pameran-body {
    padding: 50px;
    height: 120%;

  }

  .col-lg-offset-right-1 {
    margin-left: 0%;
  }

  .col-md-offset-right-1 {
    margin-left: 0%;
  }

  .col-lg-12 {
    width: 100%;
    padding-right: 0; 
    padding-left: 0;
  }
}

@media (min-width: 992px) {
  .container {
    width: 100%;
    padding-right: 0; 
    padding-left: 0; 
    margin-right: 0; 
    margin-left: 0;
  }
  .modal-footer{
    border-top: 0px solid #e5e5e5;
    padding: 35px;
  }
  .pameran-body {
    padding: 35px;
    height: 120%;

  }
  .col-lg-offset-right-1 {
    margin-left: 0%;
  }

  .col-md-offset-right-1 {
    margin-left: 0%;
  }

  .col-lg-12 {
    width: 100%;
    padding-right: 0; 
    padding-left: 0;
  }
}

@media (min-width: 768px){
  .container {
    width: 100%;
    padding-right: 0; 
    padding-left: 0; 
    margin-right: 0; 
    margin-left: 0;
  }
  .modal-footer{
    border-top: 0px solid #e5e5e5;
    padding: 50px;
  }
  .pameran-body {
    padding: 50px;
    height: 120%;

  }
  .col-lg-offset-right-1 {
    margin-left: 0%;
  }

  .col-md-offset-right-1 {
    margin-left: 0%;
  }

  .col-lg-12 {
    width: 100%;
    padding-right: 0; 
    padding-left: 0;
  }
}

</style>
<section id="konten">
  <div class="container">
    <div class="col-lg-12 col-md-12">
     <div class="section-title-col">
      <div style="text-align: left;">
        <div class="pameran-content">
          <div class="pameran-body">
            <div class="col-xl-5 col-lg-5 col-md-5 col-lg-offset-1 col-md-offset-1 col-sm-12 justify-content-center">
              <!-- <h4 style="color: white"><?=$pameran_virtual->judul_pameran?></h4> -->
              <div class="pameran_virtual_keterangan"><?=$dt->keterangan?></div>
            </div>  
            <div class="col-md-5 col-lg-5 col-sm-12 col-lg-offset-right-1 col-md-offset-right-1  justify-content-center">
              <div class="video-container">
               <?=$dt->embed_code?>
             </div>
           </div>
         </div>
         <div class="modal-footer">
         </div>
       </div>

     </div>
   </div>
 </div>
</div>
</section>
<section style="margin-bottom: 10px;">
  <div class="container-sub">
    <div class="row" align="center">
      <center>
        <div class="menu-jdl"><h2 style="font-family: sans-serif;font-weight: 500; color: #092b49 !important;">Lihat dan Kunjungi Kami</h2></div>
      </center>
      <br/>
      <div class="tab-content">
       <?php
       foreach ($list_data as $key => $value) {
         ?>
         <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail" style="height: 350px;">
            <div class="video-container">
             <?=$value->embed_code?>
           </div>
           <div class="caption">
            <a href="<?=base_url()?>index.php/konten/pameran_virtual_detail/<?=$value->kd_pameran ?>">
              <h4 style="margin-bottom:0px;font-family: sans-serif;font-weight: 400; color: #092b49 !important;"><?=$value->judul_pameran?></h4>
            </a>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
</div>
</section>


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

