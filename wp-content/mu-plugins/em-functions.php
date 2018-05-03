<?php

if(!function_exists('em_paginate')){ //overridable e.g. in you mu-plugins folder.
/**
 * Takes a few params and determines a pagination link structure
 * @param string $link
 * @param int $total
 * @param int $limit
 * @param int $page
 * @param array $data If supplied and EM_USE_DATA_ATTS is true/defined, this set of data will be stripped from the URL and added as a data-em-ajax attribute containing data AJAX can use
 * @return string
 */
function em_paginate($link, $total, $limit, $page=1, $data=array()){
	if($limit > 0){
		$pagesToShow = defined('EM_PAGES_TO_SHOW') ? EM_PAGES_TO_SHOW : 10;
		$url_parts = explode('?', $link);
		$base_link = $url_parts[0];
		$base_querystring = '';
		$data_atts = '';
    	//Get querystring for first page without page
    	if( count($url_parts) > 0 ){
	    	$query_arr = array();
	    	parse_str($url_parts[1], $query_arr);
	    	//if $data was passed, strip any of these vars from both the $query_arr and $link for inclusion in the data-em-ajax attribute
	    	if( !empty($data) && is_array($data) && (!defined('EM_USE_DATA_ATTS') || EM_USE_DATA_ATTS) ){
	    		//remove the data attributes from $query_arr
	    		foreach( array_keys($data) as $key){
	    			if( array_key_exists($key, $query_arr) ){
	    				unset($query_arr[$key]);
	    			}
	    		}
	    		//rebuild the master link, without these data attributes
	    		if( count($query_arr) > 0 ){
	    			$link = $base_link .'?'. build_query($query_arr);
	    		}else{
	    			$link = $base_link;
	    		}
	    		$data_atts = 'data-em-ajax="'.esc_attr(build_query($data)).'"'; //for inclusion later on
	    	}
	    	//proceed to build the base querystring without pagination arguments
	    	unset($query_arr['page']); unset($query_arr['pno']);
	    	$base_querystring = esc_attr(build_query($query_arr));
	    	if( !empty($base_querystring) ) $base_querystring = '?'.$base_querystring;
    	}
    	//calculate
		$maxPages = ceil($total/$limit); //Total number of pages
		$startPage = ($page <= $pagesToShow) ? 1 : $pagesToShow * (floor($page/$pagesToShow)) ; //Which page to start the pagination links from (in case we're on say page 12 and $pagesToShow is 10 pages)
		$placeholder = urlencode('%PAGE%');
		$link = str_replace('%PAGE%', $placeholder, esc_url($link)); //To avoid url encoded/non encoded placeholders
	    //Add the back and first buttons
		    $string = ($page>1 && $startPage != 1) ? '<li class="page-item"><a class="prev page-link" href="'.str_replace($placeholder,1,$link).'" title="1">&lt;&lt;</a></li> ' : '';
		    if($page == 2){
		    	$string .= '<li class="page-item"> <a class="prev page-numbers page-link" href="'.esc_url($base_link.$base_querystring).'" title="2">&lt;</a></li> ';
		    }elseif($page > 2){
		    	$string .= '<li class="page-item"><a class="prev page-numbers page-link" href="'.str_replace($placeholder,$page-1,$link).'" title="'.($page-1).'">&lt;</a></li> ';
		    }
		//Loop each page and create a link or just a bold number if its the current page
		    for ($i = $startPage ; $i < $startPage+$pagesToShow && $i <= $maxPages ; $i++){
	            if($i == $page || (empty($page) && $startPage == $i)) {
	                $string .= '<li class="page-item active"><a class="page-link" href="#">'.$i.' <span class="sr-only">(current)</span></a></li>';
	            }elseif($i=='1'){
	                $string .= '<li class="page-item"><a class="page-numbers page-link" href="'.esc_url($base_link.$base_querystring).'" title="'.$i.'">'.$i.'</a></li> ';
	            }else{
	                $string .= '<li class="page-item"><a class="page-numbers page-link" href="'.str_replace($placeholder,$i,$link).'" title="'.$i.'">'.$i.'</a></li> ';
	            }
		    }
		//Add the forward and last buttons
		    $string .= ($page < $maxPages) ? '<li class="page-item"><a class="next page-numbers page-link" href="'.str_replace($placeholder,$page+1,$link).'" title="'.($page+1).'">&gt;</a></li> ' :' ' ;
		    $string .= ($i-1 < $maxPages) ? '<li class="page-item"> <a class="next page-numbers page-link" href="'.str_replace($placeholder,$maxPages,$link).'" title="'.$maxPages.'">&gt;&gt;</a></li> ' : ' ';
		//Return the string
		    return apply_filters('em_paginate', '<ul class="pagination justify-content-center" '.$data_atts.'>'.$string.'</ul>');
	}
}
}

