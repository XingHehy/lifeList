<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<h3 class="archive-title" style=""><?php $this->archiveTitle([
        'category' => _t('分类 %s 下的计划'),
        'search' => _t('包含关键字 %s 的计划'),
        'tag' => _t('标签 %s 下的计划'),
        'author' => _t('%s 发布的计划')
    ], '', ''); ?>
</h3>

<?php if ($this->have()): ?>
<?php if ($this->archiveSlug == 'old_list'): ?>
    <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
    <?php while ($categorys->next()): ?>
        <?php if ($this->category == $categorys->slug && ($this->is("post") || $this->is("category"))) {
            $childrens = $this->widget('Widget_Metas_Category_List')->getAllChildren($categorys->parent);
            for ($i = count($childrens) - 1; $i >= 0; $i--) {
                $thisChild = $this->widget('Widget_Metas_Category_List')->getCategory($childrens[$i]);
                ?>
                <?php $this->widget('Widget_Archive@category-' . $thisChild['mid'], 'pageSize=999&type=category', 'mid=' . $thisChild['mid'])->to($posts); ?>
                <div style="position: relative;margin-top: 20px;">
                    <div style="background:<?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>;padding:0px 5px; position:absolute; top:0; left:0;">
                        <a style="color:white;"
                           href="<?php echo $thisChild["permalink"] ?>"><?php echo $thisChild["name"] ?></a>
                    </div>
                    <div style="display:flex;padding-top: 10px;">
                        <ol style="margin-left:0;list-style: decimal-leading-zero;text-align:left;width: 100%;">
                            <?php if ($thisChild['count'] > 0): ?>
                                <?php while ($posts->next()): ?>
                                    <?php if ($posts->___fields()->done == "no"): ?>
                                        <li><a><p style="height: 20px;"><?php $posts->title() ?></p></a></li>
                                    <?php else : ?>
                                        <li class="done">
                                            <div style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;height: 20px;">
                                                <a href="<?php $posts->permalink() ?>">
                                                    <del style="height: 20px;color: <?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>96;"><?php $posts->title() ?></del>
                                                    <span style="background: <?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>96;color: white;padding: 0px 3px;float: right;">Done</span>
                                                    <!--<span style="padding: 0px 3px;float: right;">✔️</span>-->
                                                </a>
                                            </div>
                                            <span style="float:right;">Time:<?php $posts->___fields()->doneTime() ?></span>
                                        </li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <p style="text-align:center"><a>无内容</a></p>
                            <?php endif; ?>
                        </ol>
                    </div>
                </div>
            <?php }
        }
        ?>
    <?php endwhile; ?>
<?php else: ?>

<div style="position: relative;">
    <div style="display:flex;padding-top: 10px;">
        <ol style="margin-left:0;list-style: decimal-leading-zero;text-align:left;width: 100%;">
            <?php while ($this->next()): ?>
                <?php if ($this->___fields()->done == "no"): ?>
                    <li><a><p style="height: 20px;"><?php $this->title() ?></p></a></li>
                <?php else : ?>
                    <li class="done">
                        <div style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;height: 20px;">
                            <a href="<?php $this->permalink() ?>">
                                <del style="height: 20px;color: <?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>96;"><?php $this->title() ?></del>
                                <span style="background: <?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>96;color: white;padding: 0px 3px;float: right;">Done</span>
                                <!--<span style="padding: 0px 3px;float: right;">✔️</span>-->
                            </a>
                        </div>
                        <span style="float:right;">Time:<?php $this->___fields()->doneTime() ?></span>
                    </li>
                <?php endif; ?>
            <?php endwhile; ?>
        </ol>
    </div>

    <?php endif; ?>
    <?php else: ?>
        <article class="post">
            <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>
    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
