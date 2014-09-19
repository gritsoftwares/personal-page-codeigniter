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
                <h4>My Portfolios in Category "<?php echo $portfolios[0]->cat_title; ?>"</h4>
                <div class="pull-left">
                    <a href="<?php echo site_url('panel/portfolio/items'); ?>" class="btn-back">Back to portfolio</a>
                </div>
                <div class="pull-right">
                    <a href="<?php echo site_url('panel/portfolio/items/add'); ?>" class="btn-flat success new-product">+ Add portfolio</a>
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
                            <th tabindex="0" rowspan="1" colspan="1">Link
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Thumbnail
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Completed
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Actions
                            </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Title</th>
                            <th rowspan="1" colspan="1">Link</th>
                            <th rowspan="1" colspan="1">Thumbnail</th>
                            <th rowspan="1" colspan="1">Completed</th>
                            <th rowspan="1" colspan="1">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php if(!empty($portfolios)): ?>
                        <?php foreach ($portfolios as $portfolio): ?>
                            <!-- row -->
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('panel/portfolio/items/edit/'.$portfolio->id); ?>" class="name"><?php echo $portfolio->title; ?></a>
                                </td>
                                <td>
                                    <a target="_blank" href="<?php echo prep_url($portfolio->link); ?>" ><?php echo link_short($portfolio->link); ?></a>
                                </td>
                                <td>
                                    <img width="100" src="<?php echo $portfolio->img ? base_url('img/uploads/portfolio/'.$portfolio->thumbnail) : base_url('img/uploads/portfolio/noimg_small.jpg'); ?>"/>
                                </td>
                                <td>
                                    <?php echo date('F, Y', $portfolio->completion_date); ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="dataTablePublish" href="#" data-url="<?php echo site_url('panel/portfolio/items/publish/'.$portfolio->id); ?>">
                                            <button class="glow left <?php echo $portfolio->published ? 'published' : 'unpublished'; ?>">
                                                <i class="fa fa-power-off"></i>
                                            </button>
                                        </a>
                                        <a class="dataTableRemoveRow" href="#" data-url="<?php echo site_url('panel/portfolio/items/delete/'.$portfolio->id); ?>">
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