<section id="blog-list" class="padding-80">
<div class="container">
<div class="row">
<div class="col-md-9">

    <?php if(!empty($articles)): ?>
    <?php foreach($articles as $article): ?>
    <div class="blog-item-sec">
        <div class="blog-item-head">
            <h3><a href="<?php echo site_url("post/".$article->slug); ?>"><?php echo $article->title; ?> </a> </h3>
        </div><!--blog post item heading end-->
        <div class="blog-item-post-info">
            <span> <?php echo date('l, F jS, Y', $article->created_at); ?> | <a href="<?php echo site_url("category/".$article->cat_slug); ?>"><?php echo $article->category; ?></a> </span>
        </div><!--blog post item info end-->
        <div class="blog-item-post-desc">
            <?php echo $article->short_text; ?>
        </div><!--blog-item-post-desc end-->
        <div class="blog-more-desc">
            <div class="row">
                <div class="col-sm-7 col-xs-12">
                    <ul class="list-inline social-colored">
                        <li class="empty-text">Share:</li>
                        <li><a target="_blank" title="Share on Facebook" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(site_url("post/".$article->slug)); ?>" rel="nofollow" onclick="popUp = window.open('http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(site_url("post/".$article->slug)); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-facebook-square icon-fb"></i></a></li>
                        <li><a target="_blank" title="Share on Twitter" href="http://twitter.com/share?url=<?php echo urlencode(site_url("post/".$article->slug)); ?>" rel="nofollow" onclick="popUp = window.open('http://twitter.com/share?url=<?php echo urlencode(site_url("post/".$article->slug)); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-twitter-square icon-twit"></i></a></li>
                        <li><a target="_blank" title="Share on Twitter" href="https://plus.google.com/share?url=<?php echo urlencode(site_url("post/".$article->slug)); ?>" rel="nofollow" onclick="popUp = window.open('https://plus.google.com/share?url=<?php echo urlencode(site_url("post/".$article->slug)); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-google-plus-square icon-plus"></i></a></li>
                    </ul> <!--colored social-->
                </div>
                <div class="col-sm-5 text-right col-xs-12">
                    <a href="<?php echo site_url("post/".$article->slug); ?>" class="btn btn-theme-color">Read more <i class="ion-more"></i></a>
                </div>
            </div>
        </div><!--blog more desc end-->
    </div>  <!--blog-item section end-->
    <?php endforeach; ?>
    <?php else: ?>
        <p>There are currently no articles posted.</p>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-12">
            <?php echo $links; ?>
        </div>

    </div>
</div><!--blog left content end-->
