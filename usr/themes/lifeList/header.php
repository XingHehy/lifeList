<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类: %s'),
            'search' => _t('搜索: %s'),
            'tag' => _t('标签: %s'),
            'author' => _t('作者: %s')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->_currentPage > 1) echo ' - 第 ' . $this->_currentPage . ' 页'; ?></title>
    <meta name="keywords" content="<?php $this->keywords() ?>"/>
    <?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
    <meta property="og:site_name" content="<?php $this->options->title(); ?>"/>
    <?php if ($this->is('post')): ?>
        <meta property="og:type" content="article"/>
        <meta property="og:title"
              content="<?php $this->archiveTitle(array('category' => _t('%s'), 'search' => _t('%s'), 'tag' => _t('%s'), 'author' => _t('%s')), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->_currentPage > 1) echo ' - 第 ' . $this->_currentPage . ' 页'; ?>"/>
        <meta property="og:description" content="<?php $this->description(); ?>"/>
        <meta property="og:url" content="<?php $this->permalink() ?>"/>
        <meta property="article:published_time" content="<?php $this->date('c'); ?>"/>
        <meta property="article:modified_time" content="<?php echo date('c', $this->modified); ?>"/>
        <meta property="article:author" content="<?php $this->author(); ?>"/>
        <meta property="article:published_first" content="<?php $this->author(); ?>, <?php $this->permalink() ?>"/>
    <?php else: ?>
        <meta property="og:type" content="blog"/>
        <meta property="og:title"
              content="<?php $this->archiveTitle(array('category' => _t('%s'), 'search' => _t('%s'), 'tag' => _t('%s'), 'author' => _t('%s')), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->_currentPage > 1) echo ' - 第 ' . $this->_currentPage . ' 页'; ?>"/>
        <meta property="og:description" content="<?php $this->options->slogan(); ?>"/>
        <meta property="og:url" content="<?php $this->options->siteUrl(); ?>"/>
    <?php endif; ?>
    <link rel="shortcut icon"
          href="<?php if ($this->options->favicon): $this->options->favicon(); else: $this->options->themeUrl('/favicon.ico');endif; ?>">
    <link rel="apple-touch-icon"
          href="<?php if ($this->options->iosicon): $this->options->iosicon(); else: $this->options->themeUrl('/favicon.ico');endif; ?>">
    <link href="<?php $this->options->themeUrl('static/css/style.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/css/main.css'); ?>">
    <style>
        :root, * {
            --theme_color : <?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>;
            --theme_color57 : <?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>57;
            --theme_colorc7 : <?php if ($this->options->theme_color): $this->options->theme_color(); else: echo "#f15bb5";endif; ?>c7;
        }    
        @font-face {
            font-family: 'MyFont';
            src: url('<?php $this->options->themeUrl('static/font/DinkieBitmapDemo-9px.ttf'); ?>') format('truetype');
        }
        
        body {
            font-family: MyFont, sans-serif;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container grid-sm s-content header">
    <div class="column col-12">
        <div class="title" style="margin-bottom: 20px;">
            <h1 class="logo">
                <i class="ico i-list"></i>
                <a href="/"><?php $this->options->title(); ?></a>
            </h1>
            <p class="description">这里记录了Author的想要做的n件事。</p>
        </div>
        <div class="tab" style="margin-bottom:20px">
            <a href="/">
                <div class="tablinks" onclick="openTab(event, 'index')">首页</div>
            </a>
            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php
            // if($this->is('index')){
            //     $categories = $this->widget('Widget_Metas_Category_List');
            //     while($categories->next()){
            //         $children = $categories->getAllChildren($categories->mid);
            //         if ($categories->levels === 0){

            //             if(empty($children)){
            //                 $html = "<div class=\"tablinks\" onclick=\"openTab(event, '".$categories->slug."')\">".$categories->name;
            //             }else{
            //                 $html = "<div class=\"tablinks\">".$categories->name;
            //             }
            //             echo $html;

            //             if (!empty($children)){
            //                 $childCategoryHtml = '<div class="subtabs">';
            //                 foreach ($children as $mid){
            //                     $child = $categories->getCategory($mid);
            //                     $childCategoryHtml .= "<div class=\"subtablinks\" onclick=\"openSubTab(event, '".$child['slug']."')\">".$child['name']."</div>";
            //                 }
            //                 $childCategoryHtml  .= '</div>';
            //                 echo $childCategoryHtml;
            //                 echo "</div>";
            //             }

            //             echo "</div>";
            //         }
            //     }
            // }else{
            //     echo "<hr>";
            // }
            ?>
            <?php
            $categories = $this->widget('Widget_Metas_Category_List');
            if ($this->is('index')) {
                while ($categories->next()) {
                    if ($categories->levels === 0) {
                        if ($categories->slug == 'old_list') {
                            $html = "<a href=\"" . $categories->permalink . "\"><div class=\"tablinks\" >" . $categories->name . "</div></a>";
                        } else {
                            $html = "<div class=\"tablinks\" onclick=\"openTab(event, '" . $categories->slug . "')\">" . $categories->name . "</div>";
                        }

                        echo $html;
                    }
                }
            } else {
                while ($categories->next()) {
                    if ($categories->levels === 0) {
                        $html = "<a href=\"" . $categories->permalink . "\"><div class=\"tablinks\" >" . $categories->name . "</div></a>";
                        echo $html;
                    }
                }
                echo "<hr>";
            }

            ?>
        </div>
        <div class="container grid-sm s-content posts">
            <div class="column col-12">
