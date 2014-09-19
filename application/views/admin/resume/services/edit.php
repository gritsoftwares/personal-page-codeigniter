<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Edit service</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal'), array('id' => $service->id)); ?>
            <div class="form-group">
                <?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'title',
                        'id' => 'title',
                        'value' => set_value('title', $service->title),
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
                        'value' => set_value('description', $service->description),
                        'class' => 'form-control',
                        'placeholder' => 'Description',
                        'rows' => 5
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Icon', 'icon', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <select id="icon" class="selectpicker show-tick" name="icon" class="form-control" data-live-search="true" data-container="body" data-size="10" data-width="50%" data-hide-disabled="true">
                        <option value=""></option>
                        <?php foreach($icons as $cat => $group): ?>
                            <optgroup label="<?php echo $cat; ?>">
                                <?php foreach($group as $icon):
                                    $selected = 'fa '.$icon == $service->icon ? TRUE : FALSE; ?>
                                    <option data-content="<i class='fa <?php echo $icon; ?>'></i>&nbsp;&nbsp;<?php echo $icon; ?>" value="fa <?php echo $icon; ?>" <?php echo set_select('icon', 'fa '.$icon, $selected); ?>><?php echo $icon; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
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