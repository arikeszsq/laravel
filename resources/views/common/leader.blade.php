<!--LOGO部分-->
<div class="row">
    <div class="col-lg-4 visible-lg-block" style="height: 50px;line-height: 50px;">
        <img src="/imgs/logo_big.png" style="border-radius: 10px;height: 46px;"/>
    </div>
    <div class="col-md-4 col-xs-2  visible-md-block visible-xs-block" style="height: 50px;line-height: 50px;">
        <img src="/imgs/logo_mini.png" style="height: 46px; margin-left: 5px;"/>
    </div>
    <div class="col-md-8 col-lg-8 col-xs-10" style="line-height: 50px; height: 50px; text-align: right;">
        <a class="btn btn-info" href="#">登录</a>
        <a class="btn btn-success" href="#">注册</a>
        <a class="btn btn-primary" href="#">购物车</a>
    </div>
</div>

<!--导航栏部分-->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">手机数码 <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a href="/charts/weight">数据报表</a>
                </li>
                <li>
                    <a href="#">鞋靴箱包</a>
                </li>
                <li>
                    <a href="#">香烟酒水</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">全部分类 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/charts/weight">数据报表</a>
                        </li>
                        <li>
                            <a href="#">电脑办公</a>
                        </li>
                        <li>
                            <a href="#">鞋靴箱包</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#">香烟酒水</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#">花生瓜子</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


