<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php //header("Location: "."//".$_SERVER["HTTP_HOST"]); ?>
<?php $this->need('header.php'); ?>

    <div class="container grid-sm s-content posts" id="main" role="main">
    <div class="column col-12">
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <h1 class="post-title" itemprop="name headline">
                <a itemprop="url"
                   href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h1>
            <ul class="post-meta">
                <!--li itemprop="author" itemscope itemtype="http://schema.org/Person">
                <?php _e('作者: '); ?><a itemprop="name"
                                       href="<?php $this->author->permalink(); ?>"
                                       rel="author"><?php $this->author(); ?></a>
            </li-->
                <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                <li>
                    <?php _e('完成时间: '); ?>
                    <?php if ($this->___fields()->done == 'done'): ?>
                        <time datetime="<?php $this->date('c'); ?>"
                              itemprop="datePublished"><?php $this->___fields()->doneTime();//$this->date(); ?></time>
                    <?php else: ?>
                        暂未完成
                    <?php endif; ?>
                </li>
            </ul>
            <div class="post-content" itemprop="articleBody" style="text-align:left;">
                <?php if ($this->___fields()->done == 'done'): ?>
                    <?php $this->content(); ?>
                <?php else: ?>
                    <p style="text-align:center">暂未完成，以后再来看吧<br><span id="countdown">3</span>秒后自动跳转到首页...
                    </p>
                    <script>
                        var timeLeft = 3; //设置初始倒计时时间
                        var countdownTimer = setInterval(function () {
                            timeLeft--; //每次减去一秒
                            document.getElementById("countdown").innerHTML = timeLeft;
                            if (timeLeft == 0) { //当倒计时结束时
                                clearInterval(countdownTimer)
                                window.location.href = "/"; //重定向到首页
                            }
                        }, 1000); //计时器执行间隔为1秒
                    </script>            <?php endif; ?>
            </div>
            <!--<p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p> -->
        </article>

        <?php if ($this->___fields()->done == 'done'): ?>
            <?php $this->need('comments.php'); ?>
        <?php endif; ?>

        <style>

        </style>
        <ul class="post-near">
            <li>上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
            <li>下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
        </ul>
    </div><!-- end #main-->
    <div id="lightbox" onclick="lightbox.close()"></div>
    <div id="overlay" onclick="lightbox.close()"></div>


    <script src="<?php $this->options->themeUrl('static/js/post.js'); ?>"></script>



<?php $this->need('footer.php'); ?>