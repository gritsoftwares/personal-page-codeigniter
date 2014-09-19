<div id="pad-wrapper" class="new-user">

    <div class="row header">
        <div class="col-md-12">
            <h3>Edit company</h3>
        </div>
    </div>

    <div class="row form-wrapper">
        <div class="col-md-12 ">
            <?php echo validation_errors() ? '<div class="alert alert-danger">'.validation_errors().'</div>' : '' ; ?>

            <?php echo form_open('', array('class'=>'form-horizontal'), array('id' => $company->id)); ?>
            <div class="form-group">
                <?php echo form_label('Title', 'title', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'title',
                        'id' => 'title',
                        'value' => set_value('title', $company->title),
                        'class' => 'form-control',
                        'placeholder' => 'Title'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Company', 'company_title', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'company_title',
                        'id' => 'company_title',
                        'value' => set_value('company_title', $company->company_title),
                        'class' => 'form-control',
                        'placeholder' => 'Company'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Website', 'company_website', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_input(array(
                        'name' => 'company_website',
                        'id' => 'company_website',
                        'value' => set_value('company_website', $company->company_website),
                        'class' => 'form-control',
                        'placeholder' => 'Website'
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Description', 'description', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_textarea(array(
                        'name' => 'description',
                        'id' => 'description',
                        'value' => set_value('description', $company->description),
                        'class' => 'form-control',
                        'placeholder' => 'Description',
                        'rows' => 5
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Technologies used (optional)', 'technologies', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <?php echo form_textarea(array(
                        'name' => 'technologies',
                        'id' => 'technologies',
                        'value' => set_value('technologies', $company->technologies),
                        'class' => 'form-control',
                        'placeholder' => 'Technologies used',
                        'rows' => 5
                    )); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Period', 'start_date', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-box">
                                <label>Start date:</label>
                                <input id="start_date" name="start_date" class="form-control input-datepicker" type="text" data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" value="<?php echo timestamp_to_date(set_value('start_date', $company->start_date)); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-box">
                                <label>End date:</label>
                                <input id="end_date" name="end_date" class="form-control input-datepicker" type="text" data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" value="<?php $end = $company->end_date ? $company->end_date : date_to_timestamp($company->end_date); echo timestamp_to_date(set_value('end_date', $end)); ?>">
                                <p>Leave this field empty if you are still working here.</p>
                            </div>
                        </div>
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