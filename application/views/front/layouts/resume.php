<body data-spy="scroll" data-target="#navigation" data-offset="75">

<?php $this->load->view('front/layouts/includes/menu'); ?>

<section id="page-head-bg">
    <div class="container">
        <h1><?php echo $settings->resume_intro; ?></h1>
        <p><?php echo $settings->resume_intro2; ?></p>
    </div>
</section><!--page-head bg end-->

<section id="work-single" class="padding-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 margin-btm-40">
                <h5><a href="<?php echo site_url('#contact'); ?>">Hire Me</a></h5><hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Work Experience</h3>
                <?php if(!empty($companies)): ?>
                <?php foreach($companies as $company): ?>
                    <div class="row job clearfix">
                        <div class="col-sm-4">
                            <div class="where"><a target="_blank" href="<?php echo $company->company_website; ?>"><?php echo $company->company_title; ?></a></div>
                            <div class="year"><?php echo date('F Y', $company->start_date); ?> - <?php echo $company->end_date ? date('F Y', $company->end_date) : 'Present'; ?> </div>
                            <div class="total"><?php echo timespan($company->start_date, $company->end_date); ?></div>
                        </div>
                        <div class="col-sm-8">
                            <div class="profession"><?php echo $company->title; ?></div>
                            <div class="description"><?php echo $company->description; ?></div>
                            <?php if ( ! empty($company->technologies)): ?>
                            <div class="technologies"><?php echo $company->technologies; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <p>This section is not filled yet.</p>
                <?php endif; ?>

                <hr/>
                <h3>Courses Taken</h3>
                <?php if(!empty($courses)): ?>
                <table id="courses">
                    <thead>
                    <tr>
                        <th tabindex="0" rowspan="1" colspan="1">Category
                        </th>
                        <th tabindex="0" rowspan="1" colspan="1">Course
                        </th>
                        <th tabindex="0" rowspan="1" colspan="1">Author
                        </th>
                        <th tabindex="0" rowspan="1" colspan="1">Link
                        </th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Category</th>
                        <th rowspan="1" colspan="1">Course</th>
                        <th rowspan="1" colspan="1">Author</th>
                        <th rowspan="1" colspan="1">Link</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?php echo $course->category; ?></td>
                        <td><?php echo $course->title; ?></td>
                        <td><?php echo $course->author; ?></td>
                        <td><a target="_blank" href="<?php echo $course->link; ?>"><?php echo link_short($course->link); ?></a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <p>This section is not filled yet.</p>
                <?php endif; ?>
                <div class="clearfix"></div>

                <hr/>
                <h3>Certifications</h3>
                <?php if(!empty($certificates)): ?>
                <ul id="certifications">
                    <?php foreach($certificates as $item): ?>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="title"><a target="_blank" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></div>
                                <p><?php echo $item->center; ?></p>
                            </div>
                            <div class="col-sm-8">
                                <span>score: <?php echo number_format($item->score, 2); ?></span>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                    <p>This section is not filled yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div><!--work detail container-->
</section>


