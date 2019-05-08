
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 class="display-1 display-1--with-line-sep">Categorie: <?php echo ($categorie['name']) ?></h1>
                <p class="lead"><?php echo ($categorie['description']) ?></p>
            </div>
        </div>
        
        <div class="row entries-wrap add-top-padding wide">
            <div class="entries">

                <?php
                foreach ($article as $art) {
                    ?>

                    <article class="col-block">

                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="<?php echo base_url() ?>single/<?php echo ($art['id']) ?>"
                                   class="item-entry__thumb-link">
                                    <img src="<?php echo base_url() ?>assets/images/thumbs/post/<?php echo ($art['image']) ?>">
                                </a>
                            </div>

                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    <a href="<?php echo base_url() ?>single/<?php echo ($art['id']) ?>"><?php echo ($art['name']) ?></a>
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
