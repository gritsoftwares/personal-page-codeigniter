<div id="pad-wrapper">
    <?php if(!empty($tiles)): ?>
        <?php foreach($tiles as $key => $val): ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail tile tile-medium tile-<?php echo $val['color']; ?>">
                <span class="count"><?php echo $val['total']; ?></span>
                <a href="<?php echo site_url("panel/{$val['url']}/add"); ?>" class="fa-links">
                    <i class="fa fa-plus"></i>
                    <h1><?php echo $key; ?></h1>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>