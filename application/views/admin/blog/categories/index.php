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
                <h4>My Blog Categories</h4>
            </div>
        </div>

        <div class="row filter-block">
            <div class="pull-right">
                <a href="<?php echo site_url('panel/blog/categories/add'); ?>" class="btn-flat success new-product">+ Add category</a>
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
                        <span class="line"></span>Articles
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($categories)): ?>
                    <?php $i = 0; foreach ($categories as $cat): ?>
                        <!-- row -->
                        <tr id="list_<?php echo $cat->id; ?>" <?php echo (!$i) ? 'class="first"' : ''; ?>>
                            <td>
                                <a href="<?php echo site_url('panel/blog/categories/edit/'.$cat->id); ?>" class="name"><?php echo $cat->title; ?></a>
                            </td>
                            <td>
                                <?php if($cat->num_articles): ?>
                                <a href="<?php echo site_url('panel/blog/articles/category/'.$cat->id); ?>"><?php echo $cat->num_articles; ?> <?php echo $cat->num_articles == 1 ? 'article' : 'articles'; ?></a>
                                <?php else: ?>
                                    No articles yet
                                <?php endif; ?>
                                <ul class="actions">
                                    <li><a href="<?php echo site_url('panel/blog/categories/edit/'.$cat->id); ?>">Edit</a></li>
                                    <li class="last"><a href="#" class="clickRemoveRow" data-url="<?php echo site_url('panel/blog/categories/delete/'.$cat->id); ?>">Delete</a></li>
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