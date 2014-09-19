<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Edit portfolio</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open_multipart('', array('class'=>'form-horizontal'), array('id' => $portfolio->id)); ?>
            <div class="form-group">
                <?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'title',
                        'id' => 'title',
                        'value' => set_value('title', $portfolio->title),
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
                        'value' => set_value('slug', $portfolio->slug),
                        'class' => 'form-control make-slug',
                        'placeholder' => 'Slug',
                        'data-url' => site_url('panel/portfolio/items/makeslug')
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Description', 'description', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_textarea(array(
                        'name' => 'description',
                        'id' => 'description',
                        'value' => set_value('description', $portfolio->description),
                        'class' => 'form-control editor',
                        'rows' => 5,
                        'placeholder' => 'Description'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Technologies Used (optional)', 'technologies', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_textarea(array(
                        'name' => 'technologies',
                        'id' => 'technologies',
                        'value' => set_value('technologies', $portfolio->technologies),
                        'class' => 'form-control',
                        'rows' => 5,
                        'placeholder' => 'tech1, tech2, tech3'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Link', 'link', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'link',
                        'id' => 'link',
                        'value' => set_value('link', $portfolio->link),
                        'class' => 'form-control',
                        'placeholder' => 'Link'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Image', 'img', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php if($portfolio->img): ?>
                        <img width="100" class="delimg" title="Click to delete" data-url="<?php echo site_url('panel/portfolio/items/delimg/'.$portfolio->id); ?>" src="<?php echo base_url('img/uploads/portfolio/'.$portfolio->thumbnail); ?>" />
                        <?php echo form_upload(array(
                            'name' => 'img',
                            'id' => 'img',
                            'style' => 'display:none'
                        )); ?>
                    <?php else: ?>
                        <?php echo form_upload(array(
                            'name' => 'img',
                            'id' => 'img'
                        )); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Categories', 'categories', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <select id="categories" class="select2" name="categories[]" multiple="" class="form-control">
                        <?php foreach($categories as $category):
                            $selected = array_key_exists($category->id, $portfolio->categories) ? TRUE : FALSE; ?>
                            <option value="<?php echo $category->id; ?>" <?php echo set_select('categories', $category->id, $selected); ?>><?php echo $category->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Completed', 'completion_date', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <input id="completion_date" name="completion_date" class="form-control input-datepicker" type="text" data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" value="<?php echo timestamp_to_date(set_value('completion_date', $portfolio->completion_date)); ?>">
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Published', 'published', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10 ctrls">
                    <div class="slider-frame">
                        <span class="slider-button on" data-off-text="No" data-on-text="Yes">ON</span>
                        <?php echo form_hidden('published', set_value('published', $portfolio->published)); ?>
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