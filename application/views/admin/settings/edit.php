<?php if (!empty($this->session->flashdata('fail'))) {
    echo '<div class="alert alert-danger">'.$this->session->flashdata('fail').'</div>';
} elseif (!empty($this->session->flashdata('success'))) {
    echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
}
?>

<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Website settings</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal'), array('id' => $settings->id)); ?>
            <div class="form-group">
                <?php echo form_label('Logo', 'logo', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'logo',
                        'id' => 'logo',
                        'value' => set_value('logo', $settings->logo),
                        'class' => 'form-control',
                        'placeholder' => 'Logo'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Homepage intro line 1', 'homepage_intro', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'homepage_intro',
                        'id' => 'homepage_intro',
                        'value' => set_value('homepage_intro', $settings->homepage_intro),
                        'class' => 'form-control',
                        'placeholder' => 'Homepage intro'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Homepage intro line 2', 'homepage_intro2', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'homepage_intro2',
                        'id' => 'homepage_intro2',
                        'value' => set_value('homepage_intro2', $settings->homepage_intro2),
                        'class' => 'form-control',
                        'placeholder' => 'Homepage intro line 2'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('About intro', 'about_intro', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'about_intro',
                        'id' => 'about_intro',
                        'value' => set_value('about_intro', $settings->about_intro),
                        'class' => 'form-control',
                        'placeholder' => 'About intro'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('About text', 'about_intro2', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_textarea(array(
                        'name' => 'about_intro2',
                        'id' => 'about_intro2',
                        'value' => set_value('about_intro2', $settings->about_intro2),
                        'class' => 'form-control',
                        'placeholder' => 'About text',
                        'rows' => 5
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Blog intro line 1', 'blog_intro', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'blog_intro',
                        'id' => 'blog_intro',
                        'value' => set_value('blog_intro', $settings->blog_intro),
                        'class' => 'form-control',
                        'placeholder' => 'Blog intro'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Blog intro line 2', 'blog_intro2', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'blog_intro2',
                        'id' => 'blog_intro2',
                        'value' => set_value('blog_intro2', $settings->blog_intro2),
                        'class' => 'form-control',
                        'placeholder' => 'Blog intro line 2'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Resume intro line 1', 'resume_intro', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'resume_intro',
                        'id' => 'resume_intro',
                        'value' => set_value('resume_intro', $settings->resume_intro),
                        'class' => 'form-control',
                        'placeholder' => 'Resume intro'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Resume intro line 2', 'resume_intro2', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'resume_intro2',
                        'id' => 'resume_intro2',
                        'value' => set_value('resume_intro2', $settings->resume_intro2),
                        'class' => 'form-control',
                        'placeholder' => 'Resume intro line 2'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>