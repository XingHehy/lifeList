<?php
/**
 * Typecho主题 - Life List
 * @package lifeList
 * @author Xinghe
 * @version 1.0
 * @link https://www.lizh.cc
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>

    <div id="index" class="tabcontent" style="text-indent:2em;text-align:left;">
        <?php
        $post = $this->widget('Widget_Archive@post-1', 'pageSize=1&type=post', 'cid=1');
        echo($post->content);
        ?>
    </div>
<?php while ($categories->next()): ?>
    <?php $this->widget('Widget_Archive@category-' . $categories->mid, 'pageSize=999&type=category', 'mid=' . $categories->mid)->to($posts); ?>
    <div id="<?php $categories->slug() ?>" class="tabcontent" style="display: none">
        <ol style="list-style: decimal-leading-zero;text-align:left;margin-left: 0;padding: 0 40px;">
            <?php if ($categories->count > 0): ?>
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
                                </a></div>
                            <span style="float:right;">Time:<?php $posts->___fields()->doneTime() ?></span>
                        </li>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p style="text-align:center"><a>无内容</a></p>
            <?php endif; ?>
        </ol>
    </div>
<?php endwhile; ?>


<?php $this->need('footer.php'); ?>