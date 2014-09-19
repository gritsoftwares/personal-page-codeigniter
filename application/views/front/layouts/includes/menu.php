<section id="navigation">
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span style="color:#8E8E8E" class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php echo $settings->logo; ?></a>
            </div>
            <div class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo site_url(); ?>#home">Home</a></li>
                    <li><a href="<?php echo site_url(); ?>#about">About Me</a></li>
                    <li><a href="<?php echo site_url(); ?>#whatdo">What i do</a></li>
                    <li><a href="<?php echo site_url(); ?>#work">My Work</a></li>
                    <li><a <?php echo active_menu(); ?> href="<?php echo site_url(); ?>blog">Blog</a></li>
                    <li><a href="<?php echo site_url(); ?>#contact">Contact</a></li>
                </ul>

            </div><!--/.nav-collapse -->
        </div><!--/.container -->
    </div>
</section><!--navigation section end here-->