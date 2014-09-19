<section id="footer" class="padding-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 copyright">
                <span>&copy; <?php echo date('Y'); ?> <?php echo $settings->logo; ?>. All rights reserved.</span>
            </div>
            <div class="col-md-6 col-sm-6 footer-nav">
                <ul class="list-inline">
                    <li><a href="<?php echo site_url(); ?>#home">Home</a></li>
                    <li><a href="<?php echo site_url(); ?>resume">Resume</a></li>
                    <li><a href="<?php echo site_url(); ?>blog">Blog</a></li>
                    <li><a href="<?php echo site_url(); ?>#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</section><!--footer end-->

<!--script files-->
<script src="<?php echo base_url("js/jquery.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("js/jquery.sticky.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("js/jquery.nicescroll.min.js"); ?>" type="text/javascript"></script>

<?php if(!empty($scripts)): ?>
<!-- page specific scripts -->
<?php foreach($scripts as $script): ?>
<script src="<?php echo base_url($script); ?>" type="text/javascript"></script>
<?php endforeach; endif; ?>

<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

<script src="<?php echo base_url("js/front.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("js/frontObject.js"); ?>" type="text/javascript"></script>

</body>
</html>