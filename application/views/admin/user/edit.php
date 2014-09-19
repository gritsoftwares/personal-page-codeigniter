<?php if (!empty($this->session->flashdata('fail'))) {
    echo '<div class="alert alert-danger">'.$this->session->flashdata('fail').'</div>';
} elseif (!empty($this->session->flashdata('success'))) {
    echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
}
?>

<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Personal info</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open_multipart('', array('class'=>'form-horizontal'), array('id' => $user->id)); ?>
            <div class="form-group">
                <?php echo form_label('Avatar', 'avatar', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php if($user->avatar): ?>
                        <img class="delimg avatar img-circle" title="Click to delete" data-url="<?php echo site_url('panel/user/delimg/'.$user->id); ?>" src="<?php echo base_url('img/uploads/personal/personal.jpg'); ?>" />
                        <?php echo form_upload(array(
                            'name' => 'avatar',
                            'id' => 'avatar',
                            'style' => 'display:none'
                        )); ?>
                        <p style="display:none;">Square image required. It will be resized to 192x192px</p>
                    <?php else: ?>
                        <?php echo form_upload(array(
                            'name' => 'avatar',
                            'id' => 'avatar'
                        )); ?>
                        <p>Square image required. It will be resized to 192x192px</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('First Name', 'first_name', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'first_name',
                        'id' => 'first_name',
                        'value' => set_value('first_name', $user->first_name),
                        'class' => 'form-control',
                        'placeholder' => 'First Name'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Last Name', 'last_name', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'last_name',
                        'id' => 'last_name',
                        'value' => set_value('last_name', $user->last_name),
                        'class' => 'form-control',
                        'placeholder' => 'Last Name'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Country', 'country', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'country',
                        'id' => 'country',
                        'value' => set_value('country', $user->country),
                        'class' => 'form-control',
                        'placeholder' => 'Country'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Company', 'company', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'company',
                        'id' => 'company',
                        'value' => set_value('company', $user->company),
                        'class' => 'form-control',
                        'placeholder' => 'Company'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Occupation', 'occupation', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'occupation',
                        'id' => 'occupation',
                        'value' => set_value('occupation', $user->occupation),
                        'class' => 'form-control',
                        'placeholder' => 'Occupation'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Phone', 'phone', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'phone',
                        'id' => 'phone',
                        'value' => set_value('phone', $user->phone),
                        'class' => 'form-control',
                        'placeholder' => 'Phone'
                    )); ?>
                    <p>optional</p>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Email', 'email', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'email',
                        'id' => 'email',
                        'value' => set_value('email', $user->email),
                        'class' => 'form-control',
                        'placeholder' => 'Email'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Old Password', 'old_password', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_password(array(
                        'name' => 'old_password',
                        'id' => 'old_password',
                        'class' => 'form-control',
                        'placeholder' => 'Old Password'
                    )); ?>
                    <p>only if you change your password</p>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('New Password', 'new_password', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_password(array(
                        'name' => 'new_password',
                        'id' => 'new_password',
                        'class' => 'form-control',
                        'placeholder' => 'New Password'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Confirm Password', 'confirm_password', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_password(array(
                        'name' => 'confirm_password',
                        'id' => 'confirm_password',
                        'class' => 'form-control',
                        'placeholder' => 'Confirm Password'
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