<!--轮播图部分-->
<style>
.banner{
    width: 100%;
}
    .item{
        height: 500px;
    }
</style>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="banners/1.jpg" alt="你好" class="banner">
            <div class="carousel-caption">
                你好
            </div>
        </div>
        <div class="item" style="text-align: center;">
            <img src="banners/2.jpg" alt="我好"  class="banner">
            <div class="carousel-caption">
                我好
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



