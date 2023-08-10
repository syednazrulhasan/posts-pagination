<?php 

add_action( 'admin_menu', 'hwg_page_break_menu' );

function hwg_page_break_menu(){

  $page_title = 'HWG Break Post Settings';
  $menu_title = 'Post Ad Settings';
  $capability = 'administrator';
  $menu_slug  = 'break-post-settings';
  $function   = 'break_post_function';
  $icon_url   = 'dashicons-paperclip';
  $position   = '';

  add_menu_page( $page_title,
                 $menu_title, 
                 $capability, 
                 $menu_slug, 
                 $function, 
                 $icon_url, 
                 $position );

  add_action( 'admin_init', 'register_break_post_settings' );
}



function register_break_post_settings() {
	register_setting( 'break_post_settings-group', 'breakpost_after_content_ads' );
  register_setting( 'break_post_settings-group', 'breakpost_inads_728x90px' );
  register_setting( 'break_post_settings-group', 'breakpost_inads_250x250px' );
}


function break_post_function(){                   ?>

<div class="wrap">
<h1><?php _e('Break Post Ads','breakposts');?></h1>

<form method="post" action="options.php">
    <?php settings_fields( 'break_post_settings-group' ); ?>
    <?php do_settings_sections( 'break_post_settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('Below Content Ads 720px by 90px','breakposts');?></th>
        <td>
        	<textarea col="75" rows="7" class="regular-text" 
          name="breakpost_after_content_ads"><?php echo get_site_option('breakpost_after_content_ads') ; ?></textarea>
        </td>
        </tr>  

        <tr valign="top">
        <th scope="row"><?php _e('Between Content Ads 720px by 90px. (Use [ads728] as shortcode ).','breakposts');?></th>
        <td>
          <textarea col="75" rows="7" class="regular-text" name="breakpost_inads_728x90px"><?php echo get_site_option('breakpost_inads_728x90px') ; ?></textarea>
        </td>
        </tr>  

        <tr valign="top">

        <th scope="row"><?php _e('Between Content Ads 250px by 250px. (Use [ads250] as shortcode )','breakposts');?></th>
        <td>
          <textarea col="75" rows="7" class="regular-text" name="breakpost_inads_250x250px"><?php echo get_site_option('breakpost_inads_250x250px') ; ?></textarea>
        </td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php }
