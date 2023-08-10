<?php
add_filter( 'the_posts', function( $posts )
{

    if (isset($_REQUEST['utm_campaign']) && is_single())
    {


	    $posts = array_map( function( $p )
	    {
            $ads250 = html_entity_decode(get_option('breakpost_inads_250x250px'), ENT_QUOTES, 'UTF-8');
            $ads728 = html_entity_decode(get_option('breakpost_inads_728x90px'), ENT_QUOTES, 'UTF-8');

	        if ( false !== strpos( $p->post_content, '<h2>' ) )
	            $p->post_content = str_replace( 
	            	array(  '<h2>',
                            '<h2 class="Body">',
                            '[ads250]',
                            '[ads728]'
                         ), 

	            	array(  '<!--nextpage--><h2>',
                            '<!--nextpage--><h2 class="Body">',
                            '<div id="inads" class="inads">'.$ads250.'</div>',
                            $ads728
                         ), 

	            	$p->post_content ); 
	        return $p;
	    }, $posts );
	    return $posts;
	}
	else{

		$posts = array_map( function( $p )
	    {
	        
	            $p->post_content = str_replace( 

	            	array('[ads250]','[ads728]'), 
	            	array('',''), 

	            	$p->post_content ); 
	        return $p;
	    }, $posts );
	    return $posts;
	}
});




function breakpost_add_to_content( $content ) {    
    if( is_single() ) {
        $content .=  html_entity_decode(get_option('breakpost_after_content_ads'), ENT_QUOTES, 'UTF-8');
    }
    return $content;
}
add_filter( 'the_content', 'breakpost_add_to_content' );






function page_break_pagination(){
global $page, $numpages, $multipage, $more;
$output = '';
            if ( $multipage ) {
                $injection = 'class="styled-button"';
                if ( $more ) {
                    $prev = $page - 1;
                    if ( $prev >=2) {
                        $link = _wp_link_page($prev).'Previous Page</a>';
                        $output .= apply_filters( 'wp_link_pages_link', $link, $prev );
                    } elseif ( $prev == 1) {
                        $link = _wp_link_page($prev.'11').'Previous Page</a>';
                        $output .= apply_filters( 'wp_link_pages_link', $link, $prev );
                    } elseif ( $prev < 1) {
                        $link = _wp_link_page($prev).'</a>';
                        $output .= apply_filters( 'wp_link_pages_link', $link, $prev );
                    } 
                    $next = $page + 1;
                    if($page==1){
                        $link = _wp_link_page($next).'Start Slideshow</a>';
                        $output .= apply_filters( 'wp_link_pages_link', $link, $next );
                    }
                    elseif( $next <= $numpages) {
                        if ( $prev ) {
                            $output .= ' ';
                        }
                        
                        $link = _wp_link_page($next).'Next Page</a>';
                        $output .= apply_filters( 'wp_link_pages_link', $link, $next );
                    }
                }
             echo str_replace('<a href=', '<a '.$injection.' href=', $output);
            } 
}

add_filter('wp_link_pages', 'page_break_pagination');

