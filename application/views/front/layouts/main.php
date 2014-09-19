<?php //echo var_dump($_ci_vars); ?>

<?php $this->load->view('front/layouts/includes/header'); ?>

<!-- Display main content -->
<?php $this->load->view($layout); ?>

<?php $this->load->view('front/layouts/includes/footer'); ?>