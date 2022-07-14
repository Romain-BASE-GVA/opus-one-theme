<?php
include_once("../../../wp-load.php");

if($_GET['action'] != ""){
    if($_GET['action'] == "next_months"){
        $year_to_show = $_GET['year_to_show'];
        $month_to_show = $_GET['month_to_show'];
        $next_shows = get_next_show_two_months($year_to_show, $month_to_show);
        $next =  date( "Ym", strtotime($year_to_show."-".$month_to_show." +2 month"));
        $last_show = get_last_show();
        if($next_shows){ ?>
            <div class="one-month next-month"><?php
            $date_show = $year_to_show.$month_to_show;
            $array_show_multidate = array();
            $month_focus_id = get_month_focus_id($date_show);
            $now = date_i18n( 'Y-m-d H:i');
            if(similar_in_array($date_show, $next_shows)){
                if($month_focus_id){
                    $banner = get_field('banner', $month_focus_id);
                    $image_bg_url = $banner['sizes']['banner-992'];?>
                <div class="agenda-main" style="background-image: url(<?php echo $image_bg_url; ?>);">
                    <div class="agenda-main-overlay"></div>
                    <div class="agenda-main-caption">
                        <div class="col-xs-12 col-sm-5"><div class="h1"><?php echo date_i18n("F", strtotime($date_show."01")); ?><?php echo " ".substr($year_to_show, 2,3); ?></div></div>
                        <div class="col-xs-12 col-sm-7 agenda-main-title"><div><?php echo get_the_title($month_focus_id); ?></div></div>
                        <div class="clearfix"></div>
                    </div>
                    </div><?php
                }else{ ?>
                    <div class="month"><div class="h1"><?php echo date_i18n("F", strtotime($date_show."01")); ?><?php echo " ".substr($year_to_show, 2,3); ?></div></div><?php
                }
            }
             ?>
            </div><?php
        } ?>
    <div class="next_request hidden" data-next-year="<?php echo substr($next,0,4); ?>" data-next-month="<?php echo substr($next,4,2); ?>"  data-last-date="<?php echo substr($last_show,0,6); ?>"></div><?php
    }
}