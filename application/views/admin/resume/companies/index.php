<?php if (!empty($this->session->flashdata('fail'))) {
    echo '<div class="alert alert-danger">'.$this->session->flashdata('fail').'</div>';
} elseif (!empty($this->session->flashdata('success'))) {
    echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
}
?>

<div id="pad-wrapper">
    <div class="table-wrapper products-table section">

        <div class="row head">
            <div class="col-md-12">
                <h4>My Companies</h4>
            </div>
        </div>

        <div class="row filter-block">
            <div class="pull-right">
                <a href="<?php echo site_url('panel/companies/add'); ?>" class="btn-flat success new-product">+ Add company</a>
            </div>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-md-3">
                        Title
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Company
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Period
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($companies)): ?>
                    <?php $i = 0; foreach ($companies as $company): ?>
                        <!-- row -->
                        <tr id="list_<?php echo $company->id; ?>" <?php echo (!$i) ? 'class="first"' : ''; ?>>
                            <td>
                                <a href="<?php echo site_url('panel/companies/edit/'.$company->id); ?>" class="name"><?php echo $company->title; ?></a>
                            </td>
                            <td>
                                <?php echo $company->company_title; ?>
                            </td>
                            <td>
                                <?php echo date('F Y', $company->start_date); ?> -
                                <?php echo $company->end_date ? date('F Y', $company->end_date) : 'Present'; ?>
                                (<?php echo timespan($company->start_date, $company->end_date); ?>)
                                <ul class="actions">
                                    <li><a href="<?php echo site_url('panel/companies/edit/'.$company->id); ?>">Edit</a></li>
                                    <li class="last"><a href="#" class="clickRemoveRow" data-url="<?php echo site_url('panel/companies/delete/'.$company->id); ?>">Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>