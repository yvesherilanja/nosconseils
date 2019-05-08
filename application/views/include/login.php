
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">
        <div class="row narrow">
            <div class="col-full s-content__header">
                <h1 class="display-1 display-1--with-line-sep">LOGIN</h1>

            </div>
        </div>

        <div class="row">
            <div class="col-full s-content__main">
                <form name="cForm" id="cForm" class="contact-form" method="post" action="<?php echo base_url() ?>index.php/Welcome/login/">
                    <fieldset>

                        <div>
                            <input name="pseudo" id="cName" class="full-width" placeholder="Your Username" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="mdp" id="cEmail" class="full-width" placeholder="Your Password" value="" type="password">
                        </div>

                        <button type="submit" class="submit btn btn--primary btn--large full-width">Login</button>

                    </fieldset>
                </form>

            </div> <!-- s-content__main -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->
