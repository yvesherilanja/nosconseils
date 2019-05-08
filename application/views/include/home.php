
     <!-- featured 
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">

                    <div class="featured__slide">
                        <div class="entry">

                            <div class="entry__background" style="background-image:url('<?php echo base_url() ?>assets/images/thumbs/featured/sante.jpg');"></div>
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"><?php echo ($nomcat[0]['name']) ?></a></span>

                                <h1><a href="#0" title=""><?php echo ($nomcat[0]['description']) ?></a></h1>
                            </div> <!-- end entry__content -->
                            
                        </div> <!-- end entry -->
                    </div> <!-- end featured__slide -->

                    <div class="featured__slide">

                        <div class="entry">

                            <div class="entry__background" style="background-image:url('<?php echo base_url() ?>assets/images/thumbs/featured/voyage.jpg');"></div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"><?php echo ($nomcat[1]['name']) ?></a></span>

                                <h1><a href="#0" title=""><?php echo ($nomcat[1]['description']) ?></a></h1>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    </div> <!-- end featured__slide -->

                    <div class="featured__slide">

                        <div class="entry">

                            <div class="entry__background" style="background-image:url('<?php echo base_url() ?>assets/images/thumbs/featured/travail.jpg');"></div>

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"><?php echo ($nomcat[2]['name']) ?></a></span>

                                <h1><a href="#0" title=""><?php echo ($nomcat[2]['description']) ?></a></h1>

                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    </div> <!-- end featured__slide -->

                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->

 
 <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row entries-wrap wide">
            <div class="entries">
				<?php

					for($i=0;$i<8;$i++)
					{
                        $rand = mt_rand(0,11);
				?>

                        <article class="col-block">

                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="<?php echo base_url() ?>index.php/Welcome/single/?idarticle=<?php echo ($art[$rand]['id']) ?>"
                                   class="item-entry__thumb-link">
                                    <img src="<?php echo base_url() ?>assets/images/thumbs/post/<?php echo ($art[$rand]['image']) ?>">
                                </a>
                            </div>

                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    <a href="<?php echo base_url() ?>index.php/Welcome/single/?idarticle=<?php echo ($art[$rand]['id']) ?>"><?php echo ($art[$rand]['name']) ?></a>
                                </div>
                            </div>
                        </div> <!-- item-entry -->

                        </article> <!-- end article -->
			
               <?php
					}
				?>

            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->


    </section> <!-- end s-content -->
