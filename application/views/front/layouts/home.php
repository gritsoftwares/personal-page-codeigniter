<body data-spy="scroll" data-target="#navigation" data-offset="80">

<section id="home" data-stellar-background-ratio="0.5">
    <div class="parallax-overlay"></div>
    <div class="home-content text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 home-inner">
                    <img src="<?php echo $user->avatar ? base_url("img/uploads/personal/personal.jpg") : base_url("img/uploads/personal/noimg.jpg"); ?>" alt="personal image" class="wow animated fadeInUp" data-wow-delay="0.3s">
                    <h1 class="intro-text wow animated fadeInUp " data-wow-delay="0.6s"><?php echo $settings->homepage_intro; ?></h1>
                    <p class="lead wow animated bounceIn" data-wow-delay="0.9s"><?php echo $settings->homepage_intro2; ?></p>
                    <p class="wow fadeInLeft" data-wow-delay="1.0s"><a href="#about" class="btn btn-lg btn-border-color btn-scroll">More about me</a><a href="#contact" class="btn btn-lg btn-border-default btn-scroll">Contact me</a></p>

                </div>
            </div>
        </div>
    </div>
</section><!--home section parallax-->

<!-- Navigation menu -->
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
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About Me</a></li>
                    <li><a href="#whatdo">What i do</a></li>
                    <li><a href="#work">My Work</a></li>
                    <li><a href="<?php echo site_url('blog'); ?>">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>

            </div><!--/.nav-collapse -->
        </div><!--/.container -->
    </div>
</section><!--navigation section end here-->

<section id="about" class="padding-80">
    <div class="container">
        <h1 class="section-heading wow animated fadeInDown" data-wow-delay="0.3s">About Me</h1>
        <div class="row">

            <div class="about-img col-md-12">
                <img src="<?php echo $user->avatar ? base_url("img/uploads/personal/personal.jpg") : base_url("img/uploads/personal/noimg.jpg"); ?>" alt="" class="wow animated rotateInDownLeft" data-wow-delay="0.6s">
            </div>
        </div>
        <div class="row intro-row">
            <div class="col-md-12 about-me text-center">
                <h1>Hello</h1>
                <h2><?php echo $settings->about_intro; ?></h2>
                <p><?php echo $settings->about_intro2; ?></p><br>
                <p>
                    <a href="#contact" class="btn btn-theme-color">Hire Me</a>
                    <!--<a href="<?php echo site_url('resume'); ?>" class="btn btn-theme-color">My Resume</a>-->
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 my-skills">
                <h2 class="short-heading">My Skills</h2>
                <div class="skills-wrapper wow animated bounceIn" data-wow-delay="0.6s">
                    <?php foreach($skills as $skill): ?>
                    <h3 class="heading-progress"><?php echo $skill->title; ?> <span class="pull-right"><?php echo $skill->level; ?></span></h3>
                    <div class="progress">
                        <div class="progress-bar" style="width: <?php echo $skill->percent;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $skill->percent;?>" role="progressbar">
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="about-me text-center">
                        <p>
                            <a href="<?php echo site_url('resume'); ?>" class="btn btn-theme-color">My Resume</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="short-heading">latest Tweet</h2>
                <blockquote class="quote-text">
                    <a id="last-tweet" class="tweet" href="https://twitter.com/alex_kravchuk" target="_blank"><?php echo $tweet[0]->text; ?></a>
                </blockquote>
                <img src="<?php echo $user->avatar ? base_url("img/uploads/personal/personal.jpg") : base_url("img/uploads/personal/noimg.jpg"); ?>" class="quote-pic">
                <p class="quote-author">
                    <a href="https://twitter.com/alex_kravchuk" target="_blank"><strong>Alex Kravchuk</strong> @alex_kravchuk</a>
                </p>
            </div>
        </div>
    </div>
    <div class="about-section-2 parallax" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h2>Have interesting <span>Projects?</span></h2>
                    <p class="lead">If you have interesting projects,you will be satisfied with my services</p>
                </div>
                <div class="col-sm-4">
                    <a href="#contact" class="wow animated bounceIn btn btn-theme-color btn-lg" data-wow-delay="0.6s">Let's talk</a>
                </div>
            </div>
        </div>
    </div>
</section><!--about section-->

<section id="whatdo" class="padding-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">What i do</h1>
            </div>
        </div>
        <div class="row">
            <?php $i=1; foreach ($services as $service): ?>
            <div class="col-md-4">
                <div class="services wow animated fadeInUp" data-wow-delay="<?php echo $i*0.3; ?>s">
                    <i class="<?php echo $service->icon; ?>"></i>
                    <h3><?php echo $service->title; ?></h3>
                    <p><?php echo $service->description; ?></p>
                </div>
            </div>
            <?php $i+=1; endforeach; ?>
        </div>
    </div>

    <!--testimonials-->
    <div class="testi parallax" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div id="testi-carousel" class="owl-carousel">
                        <?php foreach($testimonials as $testi): ?>
                        <div>
                            <h4><?php echo $testi->text; ?></h4>
                            <p><?php echo mailto($testi->email, $testi->name); ?>, <?php echo $testi->company; ?></p>
                        </div><!--testimonials item like paragraph-->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonials-->

</section><!-- what i do section-->

<section id="work" class="padding-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading wow animated bounceIn">my Recent work</h1>
            </div>
        </div>
    </div>
    <div class="work-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="portfolio-filters text-center">
                        <li class="filter active" data-filter="all">all</li>
                        <?php foreach($portfolio_categories as $cat): ?>
                        <li class="filter" data-filter="<?php echo $cat->slug; ?>"><?php echo $cat->title; ?></li>
                        <?php endforeach; ?>
                    </ul><!--.portfolio-filter nav-->

                    <div id="grid" class="row">

                        <?php foreach($portfolios as $item): ?>
                        <div class="mix col-md-4 col-sm-6 margin-btm-20 <?php echo $item->cat_slug; ?>">
                            <a href="<?php echo site_url("portfolio/".$item->slug);?>">
                                <div class="image-wrapper">
                                    <img src="<?php echo $item->img ? base_url("img/uploads/portfolio/$item->thumbnail") : base_url("img/uploads/portfolio/noimg_small.jpg"); ?>" class="img-responsive" alt="work-1">
                                    <div class="image-overlay">
                                        <p>
                                            View Detail
                                        </p>
                                    </div><!--.image-overlay-->
                                </div><!--.image-wrapper-->
                            </a>
                            <div class="work-sesc">

                                <p><?php echo $item->title; ?></p>
                            </div><!--.work-desc-->
                        </div><!--work item-->
                        <?php endforeach; ?>

                    </div><!--#grid for filter items-->
                </div><!--.col-md-12 of portfolio filter-->
            </div><!--.row-->
        </div><!--.contianer-->
    </div><!--work section 1-->
</section><!--my work section-->


<section id="contact" class="padding-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-heading">Drop me a line</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php echo form_open('email', array('class'=>'feedback wow animated fadeInLeft', 'data-wow-delay'=>"0.3s")); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo form_input(array(
                                'name' => 'name',
                                'id' => 'name',
                                'value' => set_value('name'),
                                'class' => 'form-control',
                                'placeholder' => 'Name...'
                            )); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_input(array(
                                'name' => 'email',
                                'id' => 'email',
                                'value' => set_value('email'),
                                'class' => 'form-control',
                                'placeholder' => 'Email...'
                            )); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_input(array(
                                'name' => 'subject',
                                'id' => 'subject',
                                'value' => set_value('subject'),
                                'class' => 'form-control',
                                'placeholder' => 'Subject...'
                            )); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo form_input(array(
                                'name' => 'website',
                                'id' => 'website',
                                'value' => set_value('website'),
                                'class' => 'form-control',
                                'placeholder' => 'Website (optional)'
                            )); ?>
                        </div>
                        <div class="col-md-12">
                            <?php echo form_textarea(array(
                                'name' => 'message',
                                'id' => 'message',
                                'value' => set_value('message'),
                                'class' => 'form-control',
                                'placeholder' => 'Your Message...',
                                'rows' => 8
                            )); ?>
                        </div>
                        <div class="col-md-3 text-left">
                            <?php echo form_input(array(
                                'name' => 'captcha',
                                'id' => 'captcha',
                                'class' => 'form-control',
                                'placeholder' => $this->session->userdata('captcha_string')
                            )); ?>
                        </div>
                        <div class="col-md-9 text-right">
                            <button type="submit" class="send-message btn btn-lg btn-theme-color wow animated fadeInLeft" data-wow-delay="0.6s">Send Message</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section><!--contact section-->
<div class="follow-me parallax" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow animated bounceIn">
                <h1 class="section-heading">Follow Me</h1>
            </div>
            <div class="col-md-12 text-center">
                <ul class="social-big list-inline">

                    <?php foreach($websites as $item): ?>
                    <li><a target="_blank" href="<?php echo $item->url; ?>"><i style="background-color:#<?php echo $item->color; ?>" class="<?php echo $item->icon; ?>"  data-toggle="tooltip" title="" data-original-title="<?php echo $item->title; ?>" data-placement="top"></i></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>
</div><!--follow me section-->