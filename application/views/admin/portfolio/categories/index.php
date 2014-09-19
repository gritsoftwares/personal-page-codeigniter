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
                <h4>My Portfolio Categories</h4>
            </div>
        </div>

        <div class="row filter-block">
            <div class="pull-right">
                <a href="<?php echo site_url('panel/portfolio/categories/add'); ?>" class="btn-flat success new-product">+ Add category</a>
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
                        <span class="line"></span>Projects
                    </th>
                </tr>
                </thead>
                <tbody class="sortable" data-url="<?php echo site_url('panel/portfolio/categories/order'); ?>">
                <?php if(!empty($portfolio_cats)): ?>
                    <?php $i = 0; foreach ($portfolio_cats as $cat): ?>
                        <!-- row -->
                        <tr id="list_<?php echo $cat->id; ?>" <?php echo (!$i) ? 'class="first"' : ''; ?>>
                            <td>
                                <a href="<?php echo site_url('panel/portfolio/categories/edit/'.$cat->id); ?>" class="name"><?php echo $cat->title; ?></a>
                            </td>
                            <td>
                                <?php if($cat->num_projects): ?>
                                <a href="<?php echo site_url('panel/portfolio/items/category/'.$cat->id); ?>"><?php echo $cat->num_projects; ?> <?php echo $cat->num_projects == 1 ? 'project' : 'projects'; ?></a>
                                <?php else: ?>
                                    No projects yet
                                <?php endif; ?>
                                <ul class="actions">
                                    <li><a href="<?php echo site_url('panel/portfolio/categories/edit/'.$cat->id); ?>">Edit</a></li>
                                    <li class="last"><a href="#" class="clickRemoveRow" data-url="<?php echo site_url('panel/portfolio/categories/delete/'.$cat->id); ?>">Delete</a></li>
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