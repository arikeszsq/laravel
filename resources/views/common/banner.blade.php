<!--轮播图部分-->
<style>
    #carousel-example-generic {
        margin-top: -20px;
    }
    .banner {
        width: 100%;
    }
    .banner{
        height: 300px;
    }
</style>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
<?php
use Illuminate\Support\Facades\DB;
$lists = DB::table('zsq_pc_banner')
    ->where('enable', 1)
    ->orderBy('sort', 'desc')
    ->get();
?>
<!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $slide_html = '';
        foreach ($lists as $key => $list) {
            if ($key == 0) {
                $slide_html .= '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
            } else {
                $slide_html .= '<li data-target="#carousel-example-generic" data-slide-to="' . $key . '"></li>';
            }
        }
        echo $slide_html;
        ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php
        $banner_html = '';
        foreach ($lists as $key => $list) {
            if ($key == 0) {
                $banner_html .= '<div class="item active">';
            } else {
                $banner_html .= ' <div class="item" style="text-align: center;">';
            }
            $banner_html .= '<a href="' . $list->to_url . '"><img src="' . $list->img . '" alt="' . $list->name . '" class="banner"></a>';
            $banner_html .= '<div class="carousel-caption">' . $list->name . '</div>';
            $banner_html .= '</div>';
        }
        echo $banner_html;
        ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button"
       data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button"
       data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
