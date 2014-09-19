<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Edit certificate</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal'), array('id' => $certificate->id)); ?>
            <div class="form-group">
                <?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'title',
                        'id' => 'title',
                        'value' => set_value('title', $certificate->title),
                        'class' => 'form-control',
                        'placeholder' => 'Title'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Certification Center', 'center', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'center',
                        'id' => 'center',
                        'value' => set_value('center', $certificate->center),
                        'class' => 'form-control',
                        'placeholder' => 'Certification Center'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Link', 'link', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'link',
                        'id' => 'link',
                        'value' => set_value('link', $certificate->link),
                        'class' => 'form-control',
                        'placeholder' => 'Link'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Score', 'score', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'score',
                        'id' => 'score',
                        'value' => set_value('score', $certificate->score),
                        'class' => 'form-control',
                        'placeholder' => 'Score'
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