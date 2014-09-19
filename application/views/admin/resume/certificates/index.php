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
                <h4>My Certificates</h4>
            </div>
        </div>

        <div class="row filter-block">
            <div class="pull-right">
                <a href="<?php echo site_url('panel/certificates/add'); ?>" class="btn-flat success new-product">+ Add certificate</a>
            </div>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-md-3">
                        Certificate
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Center
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Link
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Score
                    </th>
                </tr>
                </thead>
                <tbody class="sortable" data-url="<?php echo site_url('panel/certificates/order'); ?>">
                <?php if(!empty($certificates)): ?>
                    <?php $i = 0; foreach ($certificates as $certificate): ?>
                        <!-- row -->
                        <tr id="list_<?php echo $certificate->id; ?>" <?php echo (!$i) ? 'class="first"' : ''; ?>>
                            <td>
                                <a href="<?php echo site_url('panel/certificates/edit/'.$certificate->id); ?>" class="name"><?php echo $certificate->title; ?></a>
                            </td>
                            <td>
                                <?php echo $certificate->center; ?>
                            </td>
                            <td>
                                <a target="_blank" href="<?php echo prep_url($certificate->link); ?>" ><?php echo link_short($certificate->link); ?></a>
                            </td>
                            <td>
                                <?php echo number_format($certificate->score, 2); ?>
                                <ul class="actions">
                                    <li><a href="<?php echo site_url('panel/certificates/edit/'.$certificate->id); ?>">Edit</a></li>
                                    <li class="last"><a href="#" class="clickRemoveRow" data-url="<?php echo site_url('panel/certificates/delete/'.$certificate->id); ?>">Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <button style="display:none;" class="btn btn-default" type="submit" id="save-order">Save order</button>
        </div>
    </div>

</div>