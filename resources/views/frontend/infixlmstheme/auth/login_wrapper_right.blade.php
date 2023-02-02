@php
    $route =Route::currentRouteName();

    if($route=="register"){
        $title =$page->reg_title;
        $banner =$page->reg_banner;
        $slogans1 =$page->reg_slogans1;
        $slogans2 =$page->reg_slogans2;
        $slogans3 =$page->reg_slogans3;
    }elseif($route=="login"){
        $title =$page->title;
                $banner =$page->banner;
        $slogans1 =$page->slogans1;
        $slogans2 =$page->slogans2;
        $slogans3 =$page->slogans3;

    }else{
        $title =$page->forget_title;
                $banner =$page->forget_banner;
        $slogans1 =$page->forget_slogans1;
        $slogans2 =$page->forget_slogans2;
        $slogans3 =$page->forget_slogans3;

    }
@endphp

<div class="login_wrapper_right">
    <div class="login_main_info">
        <div class="thumb">
            <!--<img src="public/frontend/infixlmstheme/img/banner/login_img.jpg" alt="">-->
        </div>
    </div>
</div>
