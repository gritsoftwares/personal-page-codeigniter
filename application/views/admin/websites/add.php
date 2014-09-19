<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Add a new website</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <?php echo form_label('Website', 'website_id', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <select id="website_id" class="select2" name="website_id" class="form-control">
                            <option value=""></option>
                            <?php foreach($social_nets as $net): ?>
                                <option value="<?php echo $net->id; ?>" <?php echo set_select('website_id', $net->id); ?>><?php echo $net->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Account', 'account', array('class' => 'col-md-2 control-label')); ?>
                    <div class="col-md-10">
                        <?php echo form_input(array(
                            'name' => 'account',
                            'id' => 'account',
                            'value' => set_value('account'),
                            'class' => 'form-control',
                            'placeholder' => 'Account id or handle'
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