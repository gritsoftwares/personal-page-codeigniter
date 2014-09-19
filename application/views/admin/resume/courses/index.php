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
                <h4>My Courses</h4>
                <div class="pull-right">
                    <a href="<?php echo site_url('panel/courses/add'); ?>" class="btn-flat success new-product">+ Add course</a>
                </div>
            </div>
        </div>
        <br/>

        <div class="row">
            <div class="col-md-12">
                <table id="example">
                    <thead>
                        <tr>
                            <th tabindex="0" rowspan="1" colspan="1">Category
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Title
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Author
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Link
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1">Actions
                            </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Category</th>
                            <th rowspan="1" colspan="1">Title</th>
                            <th rowspan="1" colspan="1">Author</th>
                            <th rowspan="1" colspan="1">Link</th>
                            <th rowspan="1" colspan="1">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php if(!empty($courses)): ?>
                        <?php foreach ($courses as $course): ?>
                            <!-- row -->
                            <tr>
                                <td>
                                    <?php echo $course->category; ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('panel/courses/edit/'.$course->id); ?>" class="name"><?php echo $course->title; ?></a>
                                </td>
                                <td>
                                    <?php echo $course->author; ?>
                                </td>
                                <td>
                                    <a target="_blank" href="<?php echo prep_url($course->link); ?>" class="name"><?php echo link_short($course->link); ?></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo site_url('panel/courses/edit/'.$course->id); ?>">
                                            <button class="glow left">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a class="dataTableRemoveRow" href="#" data-url="<?php echo site_url('panel/courses/delete/'.$course->id); ?>">
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