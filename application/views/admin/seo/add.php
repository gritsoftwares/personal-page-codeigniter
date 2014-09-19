<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Add a new page</h3>
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
                            'placeholder' => 'Page Name'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Slug', 'slug', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_input(array(
                            'name' => 'slug',
                            'id' => 'slug',
                            'value' => set_value('slug'),
                            'class' => 'form-control',
                            'placeholder' => 'Page Slug'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_input(array(
                            'name' => 'title',
                            'id' => 'title',
                            'value' => set_value('title'),
                            'class' => 'form-control',
                            'placeholder' => 'Title'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Description', 'description', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_textarea(array(
                            'name' => 'description',
                            'id' => 'description',
                            'value' => set_value('description'),
                            'class' => 'form-control',
                            'placeholder' => 'Description',
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