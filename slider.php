 <!--//================Slider start==============//--> 
        <section id="slider-section">
            <div id="main-slider" class="owl-carousel owl-theme slider positionR">
                 <?php
					$slider_sel = mysql_query("SELECT * FROM slider_mst");
					while($ssel = mysql_fetch_array($slider_sel))
					{
				 ?>
				<div class="item positionR">
                    <figure class="slider-image positionR">
                        <img src="psbardoli/<?php echo $ssel['SLIDER_IMAGE']?>" alt=""/>
                    </figure>
                </div>
				<?php
					}
				?>
			</div>
        </section>
        <!--//================Slider end==============//-->
        <div class="clear"></div>