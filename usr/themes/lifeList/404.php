<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="shortcut icon" href="<?php $this->options->themeUrl('/favicon.ico'); ?>">
    <title>请求的页面不存在</title>
    <style>body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, Arial, "PingFang SC", "Microsoft YaHei", "WenQuanYi Micro Hei", "tohoma,sans-serif"
        }

        a, button.submit {
            color: #6e7173;
            text-decoration: none
        }

        a:hover, a:active {
            color: #6e7173
        }

        .body404 {
            position: absolute;
            height: 100%;
            width: 100%;
            background: #fff;
            background-size: auto 100%;
            text-shadow: 1px 1px 0 #fff
        }

        .body-about .body404 {
            background: #fff
        }

        .site-name404 {
            margin: 0 auto;
            text-align: center;
            letter-spacing: 2px;
            font: normal 150px/1 “Helvetica Neue”, Helvetica, Arial;
            color: #444
        }

        .site-name404 h1 {
            margin: 0 0 10px;
            font-size: 50px;
            line-height: 1.2
        }

        .title404 span {
            font-size: 15px;
            width: 2px
        }

        .site-name404 i {
            font-style: normal
        }

        .title404 p {
            font-size: 20px;
            line-height: 1.5;
            margin: 0;
            color: #444
        }

        .info404 {
            position: absolute;
            top: 50%;
            text-align: center;
            width: 100%;
            margin-top: -160px
        }

        .body-about .info404 {
            margin-top: -180px
        }

        #footer404 {
            margin-top: 30px;
            font-size: 10px
        }

        .index404 {
            margin-top: 24px;
            display: inline-block;
            white-space: nowrap;
            cursor: pointer;
            background: #444;
            letter-spacing: 1px;
            font-size: 14px;
            -moz-user-select: -moz-none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
            text-shadow: none;
            border: 1px solid #ccc;
            line-height: 36px;
            text-align: center;
            height: 36px;
            padding: 0 25px;
            border-radius: 16px;
            -webkit-transition-duration: .4s;
            transition-duration: .4s;
            background-color: #fff;
            color: #999
        }

        .index404:hover {
            color: #5AA6ED;
            border-color: #5AA6ED;
            outline-style: none
        }

        .icon-about {
            padding: 10px 0 25px
        }

        .icon-about a {
            font-size: 20px;
            margin: 5px;
            color: #fff;
            background-color: #000;
            border-radius: 100%;
            padding: 6px
        }
    </style>
</head>
<body>
<div class="body404">
    <div class="info404">
        <header id="header404" class="clearfix">
            <div class="site-name404"><i>404</i>
            </div>
        </header>
        <section>
            <div class="title404">
                <p><?php $this->options->description() ?></p>
            </div>
            <a href="<?php $this->options->siteUrl(); ?>" class="index404">返回首页</a>
        </section>
        <footer id="footer404">© <?php echo date('Y'); ?> <?php $this->options->title() ?></footer>
    </div>
</div>
</body>
</html>