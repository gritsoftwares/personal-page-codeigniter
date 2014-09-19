<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Edit portfolio category</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal'), array('id' => $category->id)); ?>
            <div class="form-group">
                <?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'title',
                        'id' => 'title',
                        'value' => set_value('title', $category->title),
                        'class' => 'form-control',
                        'placeholder' => 'Title'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Slug', 'slug', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'slug',
                        'id' => 'slug',
                        'value' => set_value('slug', $category->slug),
                        'class' => 'form-control make-slug',
                        'placeholder' => 'Slug',
                        'data-url' => site_url('panel/portfolio/categories/makeslug')
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