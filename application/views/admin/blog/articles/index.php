<?php if (!empty($this->session->flashdata('fail'))) {
    echo '<div class="alert alert-danger">'.$this->session->flashdata('fail').'</div>';
} elseif (!empty($this->session->flashdata('success'))) {
    echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
}
?>

<div id="pad-wrapper" class="datatables-page">
    <div class="table-wrapper products-table section">

        <div class="row head">
            <div class="col-md-12">
                <h4>My Blog Articles</h4>
                <div class="pull-right">
                    <a href="<?php echo site_url('panel/blog/articles/add'); ?>" class="btn-flat success new-product">+ Add article</a>
                </div>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-md-12">
                <table id="example">
                    <thead>
                        <tr>
                            <th tabindex="0" rowspan="1" colspan="1">Title
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Category
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Created
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Updated
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Actions
                            </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Title</th>
                            <th rowspan="1" colspan="1">Category</th>
                            <th rowspan="1" colspan="1">Created</th>
                            <th rowspan="1" colspan="1">Updated</th>
                            <th rowspan="1" colspan="1">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php if(!empty($articles)): ?>
                        <?php foreach ($articles as $article): ?>
                            <!-- row -->
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('panel/blog/articles/edit/'.$article->id); ?>" class="name"><?php echo $article->title; ?></a>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('panel/blog/articles/category/'.$article->cat_id); ?>" class="name"><?php echo $article->cat_title; ?></a>
                                </td>
                                <td>
                                    <?php echo date('m/d/Y g:i a', $article->created_at); ?>
                                </td>
                                <td>
                                    <?php echo date('m/d/Y g:i a', $article->updated_at); ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="dataTablePublish" href="#" data-url="<?php echo site_url('panel/blog/articles/publish/'.$article->id); ?>">
                                            <button class="glow left <?php echo $article->published ? 'published' : 'unpublished'; ?>">
                                                <i class="fa fa-power-off"></i>
                                            </button>
                                        </a>
                                        <a class="dataTableRemoveRow" href="#" data-url="<?php echo site_url('panel/blog/articles/delete/'.$article->id); ?>">
                                            <button class="glow right">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>