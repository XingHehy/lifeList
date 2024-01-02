<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="container grid-sm s-content comments">
        <div class="column col-12">
            <?php $this->need('comments.php'); ?>
        </div>
    </div>
<?php $this->need('footer.php'); ?>