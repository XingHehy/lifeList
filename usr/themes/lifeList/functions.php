<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('Favicon'), _t('在这里输入图标链接，不填则使用主题自带的Favicon'));
    $form->addInput($favicon);
    $iosicon = new Typecho_Widget_Helper_Form_Element_Text('iosicon', NULL, NULL, _t('Apple Touch Icon'), _t('在这里输入图标链接，不填则使用主题自带的Apple Touch Icon'));
    $form->addInput($iosicon);
    $theme_color = new Typecho_Widget_Helper_Form_Element_Text('theme_color', NULL, NULL, _t('主题色'), _t('在这里选择主题色'));
	$theme_color->input->setAttribute('type', 'color');
    $form->addInput($theme_color);

    $gravatar = new Typecho_Widget_Helper_Form_Element_Radio('gravatar', array('default' => _t('默认'), 'geekzu' => _t('geekzu')), 'default', _t('Gravatar头像源'), _t('设置Gravatar头像源，推荐geekzu CDN'));
    $form->addInput($gravatar);
}

/* 后台自定义字段 */
function themeFields($layout)
{

    $listDone = new Typecho_Widget_Helper_Form_Element_Select(
        'done',
        array(
            'no' => _t('未完成'),
            'done' => _t('已完成')
        ),
        'no',
        _t('该目标是否完成')
    );
    $layout->addItem($listDone);

    $doneTime = new Typecho_Widget_Helper_Form_Element_Text('doneTime', NULL, NULL, _t('完成时间'), _t('输入完成时间'));
	$doneTime->input->setAttribute('type', 'date');
    $layout->addItem($doneTime);


}

function getCommentAt($coid)
{
    $db = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ?', $coid));
    $parent = $prow['parent'];
    // $status = $prow['status'];
    // if ($parent != "0" || $status == "approved") {
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? ', $parent, 'approved'));
        // ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}
