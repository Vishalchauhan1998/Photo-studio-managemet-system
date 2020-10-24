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
                        <h2> <span>Photo</span> Gallery</h2>
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
	  

	  <!--//================Our-team start=============//-->		
        <section id="team-section" class="pad-top100 pad-bottom90">
            
		<?php
			if(isset($_GET['yrid']))
			{
		?>
		<div class="container">
                <div class="row">
                    <div class="all_heading positionR" style="margin-bottom:50px;">
                        <h1> album </h1>
                        <h2> <span>Select</span> Album</h2>
                    </div>
                    <div>
						<?php
							$select_album = mysql_query("SELECT * FROM album_mst WHERE YEAR = '".$_GET['yrid']."'");
							while($sa = mysql_fetch_array($select_album))
							{
						?>
                        <div class="item">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="our_team_content" >
									<h5 class="text-center"><?php echo $sa['ALBUM_DATE']?></h5>
                                    <a href="image-gallery.php?albid=<?php echo $sa['ALBUM_ID'];?>"><h3 class="text-center"><?php echo $sa['ALBUM_NAME']?></h3></a>
                                </div>
                            </div>
                        </div>
						<?php
							}
						?>
					</div>
                </div>
		</div>
		<?php
			}
			elseif(isset($_GET['albid']))
			{
		?>
		<!--//================gallery start=============//-->	
		<section id="gallery-section" class="pad-top100">
         <div class="container">
            <div class="row">
               <div class="all_heading positionR">
                  <h1> portfolio </h1>
                  <h2> <span>Photo</span> Gallery</h2>
               </div>
            </div>
         </div>
         
		 
		 <div class="gallery mar-top20 grid positionR" id="mixItUp">
            <div class="container-fluid">
               <div class="row">
				  <?php
							$selalb = mysql_query("SELECT * FROM image_mst WHERE ALBUM_ID = '".$_GET['albid']."'");
							while($alb = mysql_fetch_array($selalb))
							{
						?>
                  <div class="col-md-3 col-sm-3 col-xs-12 mix men">
                     <div class="row">
                        <div class="gallery_image">
                           <figure class="effect-bubba positionR">
                              <img src="psbardoli/<?php echo $alb['IMAGE']; ?>" height="300px;" width="225px;" alt="">
                              <figcaption>
                                 <h2><span class="icon arrows-expand"><a href="#">a</a></span></h2>
                                 <a class="fancybox" data-fancybox-group="group" href="psbardoli/<?php echo $alb['IMAGE']; ?>">View more</a>
                              </figcaption>
                           </figure>
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
		<!--//================gallery end=============//-->
		<?php
			}
			else
			{
		?>
		<div class="container">
                <div class="row">
                    <div class="all_heading positionR" style="margin-bottom:50px;">
                        <h1> year </h1>
                        <h2> <span>Select</span> Year</h2>
                    </div>
                    <div>
						<?php
							$selyear = mysql_query("SELECT * FROM year_mst");
							while($sy = mysql_fetch_array($selyear))
							{
						?>
                        <div class="item">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <div class="our_team_content" >
                                    <a href="image-gallery.php?yrid=<?php echo $sy['YEAR_ID'];?>"><h1 class="text-center"><?php echo $sy['YEAR']?></h1></a>
                                </div>
                            </div>
                        </div>
						<?php
							}
						?>
					</div>
                </div>
		</div>
        
		<?php
			}
		?>
		</section>
        <!--//================Our-team end=============//-->
        <div class="clear"></div>	
	  
<?php include "footer.php"; ?>