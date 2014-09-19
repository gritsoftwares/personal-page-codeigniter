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
                <h4>My Services</h4>
            </div>
        </div>

        <div class="row filter-block">
            <div class="pull-right">
                <a href="<?php echo site_url('panel/services/add'); ?>" class="btn-flat success new-product">+ Add service</a>
            </div>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-md-3">
                        Service
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Icon
                    </th>
                </tr>
                </thead>
                <tbody class="sortable" data-url="<?php echo site_url('panel/services/order'); ?>">
                <?php if(!empty($services)): ?>
                    <?php $i = 0; foreach ($services as $service): ?>
                        <!-- row -->
                        <tr id="list_<?php echo $service->id; ?>" <?php echo (!$i) ? 'class="first"' : ''; ?>>
                            <td>
                                <a href="<?php echo site_url('panel/services/edit/'.$service->id); ?>" class="name"><?php echo $service->title; ?></a>
                            </td>
                            <td>
                                <i class="<?php echo $service->icon; ?>"></i>
                                <ul class="actions">
                                    <li><a href="<?php echo site_url('panel/services/edit/'.$service->id); ?>">Edit</a></li>
                                    <li class="last"><a href="#" class="clickRemoveRow" data-url="<?php echo site_url('panel/services/delete/'.$service->id); ?>">Delete</a></li>
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