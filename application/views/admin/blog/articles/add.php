<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Add a new blog article</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal')); ?>
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
                    <?php echo form_label('Slug', 'slug', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_input(array(
                            'name' => 'slug',
                            'id' => 'slug',
                            'value' => set_value('slug'),
                            'class' => 'form-control make-slug',
                            'placeholder' => 'Slug',
                            'data-url' => site_url('panel/blog/articles/makeslug')
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Short Text', 'short_text', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_textarea(array(
                            'name' => 'short_text',
                            'id' => 'short_text',
                            'value' => set_value('short_text'),
                            'class' => 'form-control editor',
                            'rows' => 5,
                            'placeholder' => 'Short Text'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Full Text', 'full_text', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_textarea(array(
                            'name' => 'full_text',
                            'id' => 'full_text',
                            'value' => set_value('full_text'),
                            'class' => 'form-control editor',
                            'rows' => 5,
                            'placeholder' => 'Full Text'
                        )); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Category', 'category_id', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <select id="category_id" class="select2" name="category_id" class="form-control">
                            <option value=""></option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category->id; ?>" <?php echo set_select('category_id', $category->id); ?>><?php echo $category->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Published', 'published', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10 ctrls">
                        <div class="slider-frame">
                            <span class="slider-button on" data-off-text="No" data-on-text="Yes">ON</span>
                            <?php echo form_hidden('published', set_value('published', 1)); ?>
                        </div>

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