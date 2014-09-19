<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Edit course</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal'), array('id' => $course->id)); ?>
            <div class="form-group">
                <?php echo form_label('Category', 'category', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'category',
                        'id' => 'category',
                        'value' => set_value('category', $course->category),
                        'class' => 'form-control',
                        'placeholder' => 'Category'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'title',
                        'id' => 'title',
                        'value' => set_value('title', $course->title),
                        'class' => 'form-control',
                        'placeholder' => 'Title'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Author', 'author', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'author',
                        'id' => 'author',
                        'value' => set_value('author', $course->author),
                        'class' => 'form-control',
                        'placeholder' => 'Author'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Link', 'link', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'link',
                        'id' => 'link',
                        'value' => set_value('link', $course->link),
                        'class' => 'form-control',
                        'placeholder' => 'link'
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