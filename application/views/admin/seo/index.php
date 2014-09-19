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
                <h4>My SEO</h4>
            </div>
        </div>

        <div class="row filter-block">
            <div class="pull-right">
                <a href="<?php echo site_url('panel/seo/add'); ?>" class="btn-flat success new-product">+ Add page</a>
            </div>
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-md-3">
                        Page
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Link
                    </th>
                    <th class="col-md-3">
                        <span class="line"></span>Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($seo)): ?>
                    <?php $i = 0; foreach ($seo as $page): ?>
                        <!-- row -->
                        <tr <?php echo (!$i) ? 'class="first"' : ''; ?>>
                            <td>
                                <a href="<?php echo site_url('panel/seo/edit/'.$page->id); ?>" class="name"><?php echo $page->name; ?></a>
                            </td>
                            <td>
                                <a target="_blank" href="<?php echo site_url($page->slug); ?>" class="name"><?php echo site_url($page->slug); ?></a>
                            </td>
                            <td>
                                <ul class="actions">
                                    <li><a href="<?php echo site_url('panel/seo/edit/'.$page->id); ?>">Edit</a></li>
                                    <li class="last"><a href="#" class="clickRemoveRow" data-url="<?php echo site_url('panel/seo/delete/'.$page->id); ?>">Delete</a></li>
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