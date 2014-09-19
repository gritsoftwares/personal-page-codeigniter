<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Add a new testimonial</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <?php echo form_label('Name', 'name', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_input(array(
                            'name' => 'name',
                            'id' => 'name',
                            'value' => set_value('name'),
                            'class' => 'form-control',
                            'placeholder' => 'Name'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Company', 'company', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_input(array(
                            'name' => 'company',
                            'id' => 'company',
                            'value' => set_value('company'),
                            'class' => 'form-control',
                            'placeholder' => 'Company'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Email', 'email', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_input(array(
                            'name' => 'email',
                            'id' => 'email',
                            'value' => set_value('email'),
                            'class' => 'form-control',
                            'placeholder' => 'Email'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Text', 'text', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_textarea(array(
                            'name' => 'text',
                            'id' => 'text',
                            'value' => set_value('text'),
                            'class' => 'form-control',
                            'placeholder' => 'Text',
                            'rows' => 5
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