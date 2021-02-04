<?php
$category = $_GET['category'] ?? 0;
?>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ABC</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li <?php if ($category == 0) echo 'class="active"';?>><a href="/?category=0">首页</a></li>

                <li <?php if ($category == 3) echo 'class="active"';?>><a href="/charts/weight?category=3">图表</a></li>

                <li class="dropdown <?php if ($category > 3) echo 'active';?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">综合 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/pc/common/list?category=4&list_type=1">音乐鉴赏</a></li>
                        <li><a href="/pc/common/list?category=4&list_type=2">诗词鉴赏</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/pc/common/list?category=4&list_type=3">学习强国</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/pc/common/list?category=4&list_type=4">技术博客</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
