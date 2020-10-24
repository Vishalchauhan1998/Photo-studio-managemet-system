<?php include "header.php"; ?>
 <!--//================breadcrumb start==============//-->
      <section class="breadcamb-area">
         <div class="main_breadcamb positionR">
            <figure class="slider-image positionR">
               <img src="assets/img/bradcamb/banner2.png" alt=""/>
            </figure>
            <div class="breadcamb_content positionA text-center">
               <div class="container">
                  <div class="row">
                     <div class="all_heading positionR">
                        <h1>our work</h1>
                        <h2> <span>Video</span> Gallery</h2>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  

	  <!--//================blog start=============//-->	
      <section id="featured-section" class="pad-top100 pad-bottom100">
            <div class="container">
                <div class="row">
                    <div class="all_heading positionR">
                        <h1> videos </h1>
                        <h2> <span>Featured</span> Videos</h2>
                    </div>
                </div>
            </div>
            <div class="featured_video owl-carousel mar-top50 grid" id="video-slider">
				<?php
					$videoGallery = mysql_query("SELECT * FROM video_mst");
					while($video = mysql_fetch_array($videoGallery))
					{
				?>
                <div class="col-md-12 col-sm-12">
                    <div class="item">
                        <figure class="video_slider-image effect-bubba positionR">
                            <img src="psbardoli/<?php echo $video['IMAGE']?>" alt="">
                            <figcaption>
                                <h2><span class="icon music-play-button"><a href="#">a</a></span></h2>
                                <a href="<?php echo $video['VIDEO']?>" class="fancybox-iframe various" data-fancybox-type="iframe">View more</a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
				<?php
					}
				?>
			</div>
        </section>
		<!--//================blog end=============//-->
<?php include "footer.php"; ?>