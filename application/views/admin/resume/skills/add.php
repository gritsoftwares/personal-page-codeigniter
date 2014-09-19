<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Add a new skill</h3>
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
                    <?php echo form_label('Level', 'level_id', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <select id="level_id" name="level_id" class="form-control">
                            <?php foreach($levels as $level): ?>
                            <option value="<?php echo $level->id; ?>" <?php echo set_select('level_id', $level->id); ?>><?php echo $level->title; ?></option>
                            <?php endforeach; ?>
                        </select>
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