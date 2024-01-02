<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    $depth = $comments->levels + 1;
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '"target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
    ?>

    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
    if ($depth > 1 && $depth < 3) {
        echo ' comment-child ';
        $comments->levelsAlt('comment-level-odd', ' comment-level-even');
    } else if ($depth > 2) {
        echo ' comment-child2';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    ?>">
        <div id="<?php $comments->theId(); ?>">
            <?php
            $host = 'https://secure.gravatar.com';
            $url = '/avatar/';
            $size = '80';
            $default = 'mm';
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            if (Helper::options()->gravatar == 'geekzu') {
                $host = 'https://sdn.geekzu.org';
                $url = '/avatar/';
            }
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=' . $default;
            ?>
            <div class="comment-view" onclick="" style="text-align:left;">
                <div class="comment-header">
                    <img class="avatar" src="<?php echo $avatar ?>" width="<?php echo $size ?>"
                         height="<?php echo $size ?>"/>
                    <span class="comment-author<?php echo $commentClass; ?>"
                          style="margin-left:10px"><?php echo $author; ?><code><?php $comments->dateWord(); ?></code></span>
                    <?php if ($commentClass): ?>
                        <span class="comment-author-approve">站长</span>
                    <?php endif; ?>
                    <!--<time class="comment-time"></time>-->
                    <span class="comment-reply"><?php $comments->reply('回复'); ?></span>
                </div>
                <div class="comment-content">
                    <span class="comment-author-at"><?php getCommentAt($comments->coid); ?></span> <?php $comments->content(); ?><?php $comments->commentStatus(); ?>
                    <i class="arrow larr" style="display:none"></i>
                    <i class="arrow larr-in" style="display:none"></i>
                </div>
                <div class="comment-meta"></div>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>

<div id="<?php $this->respondId(); ?>" class="comment-container">
    <div id="comments" class="clearfix">
        <?php $this->comments()->to($comments); ?>
        <?php if ($this->allow('comment')): ?>
            <span class="response"></span>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="comment-form" role="form"
                  onsubmit="getElementById('misubmit').disabled=true;return true;">
                <div class="comment-form-main">

                    <?php if ($this->user->hasLogin()): ?>

                    <?php else: ?>

                        <div class="comment-form-fields" id="comment-form-fields">
                            <p class="comment-form-author"><input type="text" id="author" name="author" maxlength="12"
                                                                  value="<?php $this->remember('author'); ?>" size="30"
                                                                  aria-required="true" required="required"
                                                                  placeholder="昵称"></p>
                            <p class="comment-form-email"><input type="email" id="mail" name="mail"
                                                                 value="<?php $this->remember('mail'); ?>" size="30"
                                                                 aria-describedby="email-notes" aria-required="true"
                                                                 required="required" placeholder="邮箱"></p>
                            <p class="comment-form-url"><input type="url" id="url" name="url"
                                                               value="<?php $this->remember('url'); ?>" size="30"
                                                               placeholder="网站"></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="comment-textarea-wrapper">
                    <textarea name="text" id="textarea" class="form-control"
                              onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};"
                              placeholder="<?php _e('在这里输入你的留言...'); ?>"
                              required><?php $this->remember('text', false); ?></textarea>
                </div>
<div class="button-box">
                <button type="submit" class="submit" id="misubmit">发送
                </button><?php $comments->cancelReply('取消回复'); ?>
        </div>        
                

<style>
    .button-box {
  display: flex; /* 将元素放置在同一行 */
  align-items: baseline; /* 将元素的基线对齐 */
  justify-content: flex-start; /* 水平居左 */
}


</style>
                
                <?php $security = $this->widget('Widget_Security'); ?>
                <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer()) ?>">
            </form>
            <div class="comment-hr"></div>
        <?php else : ?>
            <span class="response horizontal-align">评论功能已被作者关闭</span>
        <?php endif; ?>

        <?php if ($comments->have()): ?>

            <?php $comments->listComments(); ?>

            <div class="lists-navigator">
                <?php $comments->pageNav('&laquo; 上一页', '下一页 &raquo;', '2', '...'); ?>
            </div>

        <?php endif; ?>
    </div>
</div>