<!--section blog post start here-->
<section id="blog-post" class="padding-80">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="blog-item-sec">
                    <div class="blog-item-head">
                        <h3><?php echo $article->title; ?></h3>
                    </div><!--blog post item heading end-->
                    <div class="blog-item-post-info">
                        <span> <?php echo date('l, F jS, Y', $article->created_at); ?> | <a href="<?php echo site_url("category/".$article->cat_slug); ?>"><?php echo $article->category; ?></a> </span>
                    </div><!--blog post item info end-->
                    <div class="blog-item-post-desc">
                        <?php echo $article->full_text; ?>
                    </div><!--blog-item-post-desc end-->
                    <div class="blog-more-desc">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <ul class="list-inline social-colored">
                                    <li class="empty-text">Share:</li>
                                    <li><a target="_blank" title="Share on Facebook" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(current_url()); ?>" rel="nofollow" onclick="popUp = window.open('http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode(current_url()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-facebook-square icon-fb"></i></a></li>
                                    <li><a target="_blank" title="Share on Twitter" href="http://twitter.com/share?url=<?php echo urlencode(current_url()); ?>" rel="nofollow" onclick="popUp = window.open('http://twitter.com/share?url=<?php echo urlencode(current_url()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-twitter-square icon-twit"></i></a></li>
                                    <li><a target="_blank" title="Share on Twitter" href="https://plus.google.com/share?url=<?php echo urlencode(current_url()); ?>" rel="nofollow" onclick="popUp = window.open('https://plus.google.com/share?url=<?php echo urlencode(current_url()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400'); popUp.focus(); return false"><i class="fa fa-google-plus-square icon-plus"></i></a></li>
                                </ul> <!--colored social-->
                            </div>
                        </div>
                    </div><!--blog more desc end-->

                    <!--blog -post comment wrapper start-->
                    <div class="comment-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="wrapper-disqus">
                                    <div id="disqus_thread"></div>
                                    <script type="text/javascript">
                                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                        var disqus_shortname = 'codeigniterlocal'; // required: replace example with your forum shortname

                                        /* * * DON'T EDIT BELOW THIS LINE * * */
                                        (function() {
                                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                                </div>



                            </div>
                        </div>
                    </div>


                    <!--blog post comment wrapper end-->
                </div>  <!--blog-item section end-->

            </div>
