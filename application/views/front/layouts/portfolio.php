<body data-spy="scroll" data-target="#navigation" data-offset="75">

<?php $this->load->view('front/layouts/includes/menu'); ?>

<section id="page-head-bg">
    <div class="container">
        <h1><?php echo $portfolio->title; ?></h1>
    </div>
</section><!--page-head bg end-->

<section id="work-single" class="padding-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 margin-btm-40">
                <h5><a href="<?php echo site_url('#work'); ?>">Back to portfolio</a></h5><hr>
            </div>
        </div>

        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <img src="<?php echo $portfolio->img ? base_url("img/uploads/portfolio/{$portfolio->image}") : base_url("img/uploads/portfolio/noimg_big.jpg") ?>" class="img-responsive" alt="">
                <h3>Project Description</h3>
                <?php echo $portfolio->description; ?>
                <?php if( ! empty($portfolio->technologies)): ?>
                <h3>Technologies Used</h3>
                <div id="technologies">
                    <ul>
                        <?php foreach(explode(',',$portfolio->technologies) as $tech): ?>
                        <li>
                                <span>
                                    <a href="#"><?php echo $tech; ?></a>
                                </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <?php endif; ?>
                <hr/>
                <p>Completed on: <?php echo date('F Y', $portfolio->completion_date); ?></p>
                <a id="portfolio-link" class="btn btn-default" target="_blank" href="<?php echo $portfolio->link; ?>">Link to website</a>

            </div>
        </div>
    </div><!--work detail container-->
</section>


