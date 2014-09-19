<body data-spy="scroll" data-target="#navigation" data-offset="75">

<!-- Navigation menu -->
<?php $this->load->view('front/layouts/includes/menu'); ?>

<section id="page-head-bg">
    <div class="container">
        <h1><?php echo $settings->blog_intro; ?></h1>
        <p><?php echo $settings->blog_intro2; ?></p>
    </div>
</section><!--page-head bg end-->

<!-- Display main content -->
<?php $this->load->view($content); ?>

<!--sideabr-->
<div class="col-md-3">
    <div class="sidebar-box">
        <div class="widget-search">
            <form class="search-form" method="get" action="">
                <input id="s" type="text" name="s" class="form-control" placeholder="search here...">
                <i class="ion-search" data-toggle="tooltip" data-placement="top" title="" data-original-title="hit enter to search"></i>
            </form>
        </div>
    </div><!--sidebar box end-->

    <div class="sidebar-box">
        <h4>Categories</h4>
        <ul class="list-unstyled cat-list">
            <?php foreach($categories as $cat): ?>
            <li><a href="<?php echo site_url("category/".$cat->slug);?>"><?php echo $cat->title; ?> <?php if(!empty($cat->total)): ?><span class="badge"><?php echo $cat->total;?></span><?php endif; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div><!--sidebar-box end-->

    <div class="sidebar-box">
        <h4>Follow Me</h4>
        <ul class="list-inline social-colored">
            <?php foreach ($websites as $item): ?>
            <li><a target="_blank" href="<?php echo $item->url; ?>"><i class="<?php echo $item->icon; ?>" style="background-color:#<?php echo $item->color;?>;"></i></a></li>
            <?php endforeach; ?>
        </ul> <!--colored social-->
    </div><!--sidebar-box-->
</div>


<!--sidebar end-->

</div>
</div>

</section><!--blog list page end-->