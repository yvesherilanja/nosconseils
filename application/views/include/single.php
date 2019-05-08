
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="<?php echo base_url() ?>assets/images/thumbs/post/<?php echo ($article['image']) ?>">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    <?php echo ($article['name']) ?>
                </h1>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap"><?php echo ($article['description1']) ?></p>
                
                <p> <?php echo ($article['description2']) ?></p>

                <p>
                <img src="images/wheel-1000.jpg" srcset="images/wheel-2000.jpg 2000w, images/wheel-1000.jpg 1000w, images/wheel-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </p>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->
    </section> <!-- end s-content -->
