<!DOCTYPE html>
<html lang="zh-CN.utf-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $title ?></title>
    <base href="<? echo $base_url ?>"/>
    <!-- Bootstrap -->
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="www/css/bootstrap.min.css">
    <!--    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
    <link href="www/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <!--    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="www/css/blog.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<header>
    <div class="container header-content">
        <div class="col-md-1">
            <a href="" rel="home"><img src="./www/images/0.jpg" width="64" height="64" alt="蓝色理想"/></a>
        </div>
        <div class="col-md-11 h3">
            蓝色理想
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="<? if ($title == '首页') {
                    echo 'active';
                } ?>"><a href="./">首页</a></li>
                <? if (!Flight::has('username')) { ?>
                    <li class="" data-toggle="modal" data-target="#loginModal"><a href="#">登录</a></li>
                <? } else { ?>
                    <li class="<? if ($title == '发表') {
                        echo 'active';
                    } ?>"><a href="./new">发表</a></li>
                    <li class="<? if ($title == '管理') {
                        echo 'active';
                    } ?>"><a href="./manager">管理</a></li>
                <? } ?>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
    </nav>
</header>
<div class="modal fade" id="loginModal" role="dialog">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">登录</h4>
            </div>
            <div class="modal-body">
                <form id="loginform" action="./login" method="post">
                    <div class="form-group">
                        <label class="control-label">username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label class="control-label">password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="loginsubmit">
                            提交
                        </button>
                        <button type="reset" class="btn btn-default">
                            重置
                        </button>
                    </div>
                </form>
                <div id="loginresult"></div>
            </div>
        </div>
    </div>
</div>



