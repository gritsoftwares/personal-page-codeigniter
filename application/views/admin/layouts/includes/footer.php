
</div>


<!-- scripts -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?php echo base_url('admin/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('admin/js/theme.js'); ?>"></script>

<?php if(!empty($scripts)): ?>
<!-- page specific scripts -->
<?php foreach($scripts as $script): ?>
<script src="<?php echo base_url($script); ?>" type="text/javascript"></script>
<?php endforeach; endif; ?>

<script src="<?php echo base_url('admin/js/adminObject.js'); ?>"></script>
<script src="<?php echo base_url('admin/js/admin.js'); ?>"></script>
</body>
</html>