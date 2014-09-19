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
                <h4>My Websites</h4>
            </div>
        </div>

        <div class="row filter-block">
            <div class="pull-right">
                <a href="<?php echo site_url('panel/websites/add'); ?>" class="btn-flat success new-product">+ Add website</a>
            </div>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-md-3">
                        Website
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Link
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Icon
                    </th>
                </tr>
                </thead>
                <tbody class="sortable websites" data-url="<?php echo site_url('panel/websites/order'); ?>">
                <?php if(!empty($websites)): ?>
                    <?php $i = 0; foreach ($websites as $website): ?>
                        <!-- row -->
                        <tr id="list_<?php echo $website->id; ?>" <?php echo (!$i) ? 'class="first"' : ''; ?>>
                            <td>
                                <a href="<?php echo site_url('panel/websites/edit/'.$website->id); ?>" class="name"><?php echo $website->title; ?></a>
                            </td>
                            <td>
                                <a target="_blank" href="<?php echo $website->url; ?>"><?php echo link_short($website->url); ?></a>
                            </td>
                            <td>
                                <i style="background-color:#<?php echo $website->color; ?>" class="<?php echo $website->icon; ?>"></i>
                                <ul class="actions">
                                    <li><a href="<?php echo site_url('panel/websites/edit/'.$website->id); ?>">Edit</a></li>
                                    <li class="last"><a href="#" class="clickRemoveRow" data-url="<?php echo site_url('panel/websites/delete/'.$website->id); ?>">Delete</a></li>
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