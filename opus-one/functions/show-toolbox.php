<?php

function get_show_from_category($term_id){
    global $wpdb;
    $my_shows = array();
    $rows = $wpdb->get_results("SELECT DISTINCT P.ID, M.meta_value FROM opus_posts P, opus_postmeta M, opus_term_relationships T WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) ORDER BY meta_value ASC", ARRAY_A);
    return $rows;
}

function get_first_show_category($term_id){
    global $wpdb;
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M, opus_term_relationships T WHERE P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID ORDER BY meta_value ASC LIMIT 1", ARRAY_A);
    return $rows[0];
}

function get_last_show_by_term($term_id)
{
    global $wpdb;
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M, opus_term_relationships T WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) ORDER BY meta_value DESC LIMIT 1", ARRAY_A);
    return $rows[0]['meta_value'];
}

function get_next_show_two_months($year_to_show, $month_to_show){
    global $wpdb;
    $next_month =  date( "Ym", strtotime($year_to_show."-".$month_to_show." +1 month"));
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value LIKE '".$next_month."%') AND M.meta_value >= '".date('Ymd')."') OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value LIKE '".$next_month."%') AND M.meta_value >= '".date('Ymd')."') ORDER BY meta_value ASC", ARRAY_A);
    return $rows;
}

function get_next_shows_search($year_to_show, $month_to_show){
    global $wpdb;
    $next_month =  date( "Ym", strtotime($year_to_show."-".$month_to_show));
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value LIKE '".$next_month."%') AND M.meta_value >= '".date('Ymd')."') OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value LIKE '".$next_month."%') AND M.meta_value >= '".date('Ymd')."') ORDER BY meta_value ASC", ARRAY_A);
    return $rows;
}

function get_next_show_two_months_by_terms($year_to_show, $month_to_show, $term_id){
    global $wpdb;
    $next_month =  date( "Ym", strtotime($year_to_show."-".$month_to_show." +1 month"));
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M, opus_term_relationships T WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value LIKE '".$next_month."%') AND M.meta_value >= '".date('Ymd')."' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value LIKE '".$next_month."%') AND M.meta_value >= '".date('Ymd')."') ORDER BY meta_value ASC", ARRAY_A);
    return $rows;
}

function get_next_show_of_month_by_term($month, $year, $term_id){
    global $wpdb;
    var_dump($month);
    $rows = $wpdb->get_results("
                    SELECT DISTINCT P.ID, M.meta_value 
                    FROM opus_posts P, opus_postmeta M, opus_term_relationships T 
                    WHERE (P.ID = M.post_id 
                               AND P.post_status = 'publish' 
                               AND M.meta_key LIKE '%_date_de_la_representation' 
                               AND (M.meta_value LIKE '".$date."%' 
                               AND T.term_taxonomy_id = ".$term_id." 
                               AND T.object_id = P.ID
                               OR M.meta_value <= '".$date."%') 
                               AND M.meta_value >= '".date('Ymd')."'
                               AND T.term_taxonomy_id = ".$term_id." 
                               AND T.object_id = P.ID) 
                   ORDER BY meta_value ASC", ARRAY_A);

    return $rows;
}


function get_show_from_category_nb($term_id, $nb, $post_id){
    global $wpdb;
    $rows = $wpdb->get_results("SELECT DISTINCT P.ID, M.meta_value FROM opus_posts P, opus_postmeta M, opus_term_relationships T WHERE (P.ID = M.post_id AND M.post_id != '".$post_id."' AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) ORDER BY meta_value ASC", ARRAY_A);

    $my_shows = array();
    $index = 0;
    foreach($rows as $one_date){
        if(!in_array_r($one_date['ID'],$my_shows) && $index < $nb){
            $my_shows[$index]['ID'] = $one_date['ID'];
            $my_shows[$index]['meta_value'] = $one_date['meta_value'];
            $index ++;
        }
    }
    return $my_shows;
}

function get_next_show_of_year($year_to_show, $month_to_show){
    global $wpdb;
    $this_year =  date( "Ym", strtotime($year_to_show."-".$month_to_show." +1 year"));
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value <= '".$this_year."%') AND M.meta_value >= '".date('Ymd')."') OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND (M.meta_value LIKE '".$year_to_show.$month_to_show."%' OR M.meta_value <= '".$this_year."%') AND M.meta_value >= '".date('Ymd')."') ORDER BY meta_value ASC", ARRAY_A);
    return $rows;
}

function get_next_show_of_month($date){
    global $wpdb;
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND (M.meta_value LIKE '".$date."%' OR M.meta_value <= '".$date."%') AND M.meta_value >= '".date('Ymd')."') ORDER BY meta_value ASC", ARRAY_A);

    return $rows;
}

function get_next_show($id){
    $dates = array();
    if(empty($id)) {
        return false;
    }
    $type = get_field("type", $id);
    if($type == "plusieurs_dates"){
        $dates = get_field("date_unique_ou_separee", $id);

    }elseif($type == "multidates"){
        $dates = get_field("date_de_la_representation_multidate", $id);
    }
    $today = date_i18n("Ymd");
    if($dates){
        foreach($dates as $key => $value){
            $date_de_report = isset($value["date_de_report"] ) ? $value["date_de_report"]  : NULL;
            if($date_de_report){
                if($value['date_de_la_representation'] >= $today || $value['date_de_report'] >= $today ){
                    return $dates[$key];
                }
            }else{
                if($value['date_de_la_representation'] >= $today){
                    return $dates[$key];
                }
            }

        }
    }
    return false;
}

function get_first_show(){
    global $wpdb;
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M WHERE P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' ORDER BY meta_value ASC LIMIT 1", ARRAY_A);
    return $rows[0];
}

function get_next_shows($nb)
{
    global $wpdb;
    $rows = $wpdb->get_results("SELECT DISTINCT P.ID, M.meta_value FROM opus_posts P, opus_postmeta M, opus_postmeta Q WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND Q.meta_value NOT LIKE 'field%' AND Q.meta_key LIKE '%_etat' AND (Q.meta_value != 'cancelled' AND Q.meta_value != 'postponed') AND Q.post_id = M.post_id) OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND Q.meta_value NOT LIKE 'field%' AND Q.meta_key LIKE '%_etat' AND Q.post_id = M.post_id) ORDER BY M.meta_value  ASC LIMIT 20", ARRAY_A);
    $my_shows = array();
    $index = 0;
    foreach($rows as $one_date){
        if(!in_array_r($one_date['ID'],$my_shows) && $index < $nb){
            $my_shows[$index]['ID'] = $one_date['ID'];
            $my_shows[$index]['meta_value'] = $one_date['meta_value'];
            $index ++;
        }
    }
    return $my_shows;
}
function get_next_shows_terms($nb, $post)
{
    $terms = get_the_terms($post, 'taxonomy-representation');

    global $wpdb;
    $rows = $wpdb->get_results("
                SELECT DISTINCT P.ID, M.meta_value 
                FROM opus_posts P, opus_postmeta M, opus_postmeta Q, opus_postmeta T
                WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '20220701' AND M.meta_value NOT LIKE 'field%' AND Q.meta_value NOT LIKE 'field%' AND Q.meta_key LIKE '%_etat' AND (Q.meta_value != 'cancelled' AND Q.meta_value != 'postponed') AND Q.post_id = M.post_id AND T.meta_key = 'categories' AND T.meta_value LIKE '%".$terms[0]->term_id."%' AND Q.post_id = T.post_id) OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND M.meta_value >= '20220701' AND M.meta_value NOT LIKE 'field%' AND Q.meta_value NOT LIKE 'field%' AND Q.meta_key LIKE '%_etat' AND Q.post_id = M.post_id AND T.meta_key = 'categories' AND T.meta_value LIKE '%".$terms[0]->term_id."%' AND T.post_id = Q.post_id)
                ", ARRAY_A);
    $my_shows = array();
    $index = 0;
    foreach($rows as $one_date){
        if(!in_array_r($one_date['ID'],$my_shows) && $index < $nb){
            $my_shows[$index]['ID'] = $one_date['ID'];
            $my_shows[$index]['meta_value'] = $one_date['meta_value'];
            $index ++;
        }
    }

    return $my_shows;
}

function get_show_from_category_nb_types($term_id, $nb){
    global $wpdb;

    $rows = $wpdb->get_results("SELECT DISTINCT P.ID, M.meta_value FROM opus_posts P, opus_postmeta M, opus_term_relationships T WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%' AND T.term_taxonomy_id = ".$term_id." AND T.object_id = P.ID) ORDER BY meta_value ASC", ARRAY_A);

    $my_shows = array();
    $index = 0;
    foreach($rows as $one_date){
        if(!in_array_r($one_date['ID'],$my_shows) && $index < $nb){
            $my_shows[$index]['ID'] = $one_date['ID'];
            $my_shows[$index]['meta_value'] = $one_date['meta_value'];
            $index ++;
        }
    }
    return $my_shows;
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

function search_representation_report($array, $date)
{
    if (empty($array) || empty($date)) {
        return false;
    }
    foreach($array as $key => $value){
        if($value['date_de_report'] == $date){
            return $array[$key];
        }
    }
    return false;
}

function search_representation($array, $date) {
    if (empty($array) || empty($date)) {
        return false;
    }
    foreach($array as $key => $value){
        if($value['date_de_la_representation'] == $date || $value['date_de_report'] == $date){
            return $array[$key];
        }
    }
    return false;
}

function get_nb_representation_in_future($id)
{
    $dates = array();
    if(empty($id)) {
        return false;
    }
    $type = get_field("type", $id);
    if($type == "plusieurs_dates"){
        $dates = get_field("date_unique_ou_separee", $id);
    }elseif($type == "multidates"){
        $dates = get_field("date_de_la_representation_multidate", $id);
    }
    $today = date_i18n("Ymd");
    $index = 0;
    if($dates){
        foreach($dates as $key => $value){
            if($value['date_de_la_representation'] >= $today || $value['date_de_report'] >= $today){
                $index ++;
            }
        }
    }
    return $index;
}


function get_avaibility_txt($avaibility, $report, $id, $representation_info, $event_card = false)
{
    /** @TODO : .event-card__availability.is-not-available:before => Changer la couleur de la puce ::before (mettre rouge pas vert) */
    if($avaibility != ""){
        $avaibility_txt = '';
        switch ($avaibility) {
            case "available":
                if($event_card){
                    $avaibility_txt = '<span class="event-card__availability is-available"><span>'. __('Disponible') .'</span></span>';
                }else{
                    $avaibility_txt = '<li class="event__top-info__item event__top-info__item--availability is-available"><span>'. __('Disponible') .'</span></li>';
                }

                break;
            case "full":
                $label = isset($representation_info["label_affiche"] ) ? $representation_info["label_affiche"]  : NULL;
                if(!$label){
                    $label = __(" Complet");
                }else{
                    $label = " ".$representation_info['label_affiche'];
                }
                if($event_card){
                    $avaibility_txt = '<span class="event-card__availability is-not-available"><span>'. __('Complet') .'</span></span>';
                }else{
                    $avaibility_txt = '<li class="event__top-info__item event__top-info__item--availability is-not-available"><span>'. __('Complet') .'</span></li>';
                }

                break;
            case "cancelled":
                if($event_card){
                    $avaibility_txt = '<span class="event-card__availability is-not-available"><span>'. __('Annulé') .'</span></span>';
                }else{
                    $avaibility_txt = '<li class="event__top-info__item event__top-info__item--availability is-not-available"><span>'. __('Annulé') .'</span></li>';
                }
                break;
            case "postponed":
                if($report != ""){
                    if($event_card){
                        $avaibility_txt = '<span class="event-card__availability is-available"><span>'. __(' Reporté au ') . ucfirst(date_i18n(get_option('date_format' ), strtotime($report))) .'</span></span>';
                    }else{
                        $avaibility_txt = '<li class="event__top-info__item event__top-info__item--availability is-available"><span>'. __(' Reporté au ') . ucfirst(date_i18n(get_option('date_format' ), strtotime($report))) .'</span></li>';
                    }
                }else{
                    if($event_card){
                        $avaibility_txt = '<span class="event-card__availability is-not-available"><span>'. __(' Reporté ') .'</span></span>';
                    }else{
                        $avaibility_txt = '<li class="event__top-info__item event__top-info__item--availability is-not-available"><span>'. __(' Reporté ') .'</span></li>';
                    }
                }
                break;
        }
        echo $avaibility_txt;
    }
}


function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function get_ticket_link($date, $debug = false)
{
    $ticket = null;
    if(isset($date['fnac_ch']) && !empty($date['fnac_ch'])){
        $ticket = $date['fnac_ch'];
    }elseif(isset($date['autre_billeterie']) && !empty($date['autre_billeterie'])){
        $ticket = $date['autre_billeterie'][0]['url'];
    }elseif(isset($date['ticketcorner']) && !empty($date['ticketcorner'])){
        $ticket = $date['ticketcorner'];
    }

    return $ticket;
}

function get_artists_show($post_artists)
{
    $artists_show = array();
    foreach($post_artists as $post){
        setup_postdata($post);
        $type = get_field("type",$post->ID);
        if($type == "plusieurs_dates"){
            $dates = get_field("date_unique_ou_separee", $post->ID);
        }elseif($type == "multidates"){
            $dates = get_field("date_de_la_representation_multidate", $post->ID);
        }
        foreach($dates as $the_date){
            $the_date['post_id'] = $post->ID;
            $artists_show[] = $the_date;
        }
    }
    foreach ($artists_show as $key => $row) {
        $date_de_la_representation[$key]  = $row['date_de_la_representation'];
    }
    array_multisort($date_de_la_representation, SORT_ASC, $artists_show);
    return $artists_show;
}

function get_month_focus_id($date_show)
{
    $rows = get_field('mise_en_avant_par_mois', 242);
    if($rows){
        foreach($rows as $row){
            if($row["date"] == $date_show){
                return $row['representation_agenda'][0]->ID;
            }
        }
    }
}

function get_last_show()
{
    global $wpdb;
    $rows = $wpdb->get_results("SELECT DISTINCT ID, meta_value FROM opus_posts P, opus_postmeta M WHERE (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_la_representation' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%') OR (P.ID = M.post_id AND P.post_status = 'publish' AND M.meta_key LIKE '%_date_de_report' AND M.meta_value >= '".date('Ymd')."' AND M.meta_value NOT LIKE 'field%') ORDER BY meta_value DESC LIMIT 1", ARRAY_A);
    return $rows[0]['meta_value'];
}



function similar_in_array($sNeedle, $aHaystack )
{
    foreach ($aHaystack as $sKey){
        if(stripos($sKey['meta_value'],$sNeedle ) !== false ){
            return true;
        }
    }
    return false;
}
