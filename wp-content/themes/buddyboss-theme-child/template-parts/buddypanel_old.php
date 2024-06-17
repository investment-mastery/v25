<style>
/**
 * note: CSS styles here are temporary only, will
 * transfer it later to style.css
 */
.buddypanel.gold-membership-sidebar, .buddypanel.gold-membership-sidebar .panel-head {
    background: #222;
}
.buddypanel.your-trading-club-sidebar, .buddypanel.your-trading-club-sidebar .panel-head {
    background: #0096f0;
}
.buddypanel.your-success-and-wealth-club-sidebar, .buddypanel.your-success-and-wealth-club-sidebar .panel-head {
    background: #42B99F;
}



.buddypanel.gold-membership-sidebar .panel-head {
    border-bottom: 1px solid #383838; 
}
.buddypanel.your-trading-club-sidebar .panel-head {
    border-bottom: 1px solid #19A0F2; 
}
.buddypanel.your-success-and-wealth-club-sidebar .panel-head {
    border-bottom: 1px solid #55C0A9; 
}



.buddypanel.gold-membership-sidebar .current-menu-item a {
    background: #333;
}
.buddypanel.your-trading-club-sidebar .current-menu-item a {
    background: #0087D8;
}
.buddypanel.your-success-and-wealth-club-sidebar .current-menu-item a {
    background: #3BA78F;
}
.panel-head .club_logo {
    height: auto;
    width: auto;
    max-width: 135px;
} 

.side-panel-menu a {
    padding-right: 15px;
}  


</style>
<?php
    global $post, $club_settings;
    //echo "<pre>";print_r($club_settings);
    $current_page_id = $post->ID;
    $menu = is_user_logged_in() ? 'buddypanel-loggedin' : 'buddypanel-loggedout';
    $header = buddyboss_theme_get_option( 'buddyboss_header' );
    $default_user_dashboard = get_user_meta( get_current_user_id(),"default_user_dashboard", true );
    $memberium = get_option("memberium");
    $current_club_name = "";
    $club_page_ids = array($current_page_id, get_field('club'));

    if(!get_field("club")  || get_field("club") == '-- Select club --'){ //get the parent course id 'club' ACF value if current post's 'club' is empty
        $club_page_ids = array($current_page_id, get_field("club", learndash_get_course_id() ));
    }
    $club_logo="";
    $tm_items = "";

    //$club_settings = get_fields('option');      
    foreach($club_settings as $val ) {
      $clubs[$val['order']] = $val['club_id'];
    }
    //ksort($clubs);  
    //echo "<pre>";print_r($clubs);
 
    
    $temp_clubs = [];
    $sorted_clubs = [];

    foreach($club_settings as $val ) {            
        $sorted_clubs[$val['name']] = $val['name'];
    }

    //echo "<pre>";print_r($memberium);exit;
    
    foreach($memberium['memberships'] as $club) {
		
        //$club_menu_item = array_search($club['login_page'], $clubs);
        //$key = array_search($club_menu_item, array_map("strval", array_keys($sorted_clubs))); 
        $key = array_search($club['login_page'], $clubs);   
		if( $key ){        
			$temp_clubs[$key] = $club;
			$temp_clubs[$key]['club_locked_url'] = $club_settings[$club_menu_item]['club_locked_url'];
			$temp_clubs[$key]['club_hidden'] = $club_settings[$club_menu_item]['club_hidden'];
		}
	}  
    //ksort($temp_clubs);  
	//print_r($temp_clubs);exit;

    if(count($memberium['memberships']) == count($temp_clubs)) 
        $club_memberships = $temp_clubs;
    else 
        $club_memberships = $memberium['memberships'];    

	//for Specifix clubs
	$club_memberships = $temp_clubs;
	
	
    foreach($club_memberships as $club) {
       
		$key = array_search($club['login_page'], $clubs);   
		if( $key ){        
	   
			$has_access = memb_hasAnyTags($club['addltag_ids']); 
			$active_class="";
			
			if( in_array($club["login_page"], $club_page_ids) ){
				$active_class = ($current_page_id == $club["login_page"]) ? "active" : "";
				$current_club_name = $club['name'];
				$club_logo = $club['main_id'] . "_logo.png";
			}

		   
			if($club["club_hidden"])
				continue;
			
			if($has_access){
				$tm_items .= '<li>
								<a href="'.get_permalink($club["login_page"]).'" class="'.$active_class.'">'.$club['name'].'</a>
							</li>';
			}
			else{
				$tm_items .= '<li class="tmi_lock" style="background-image: url('.get_stylesheet_directory_uri() .'/assets/img/lock_icon.png);">
				<a href="'.$club["club_locked_url"].'">'.$club['name'].'</a></li>';
			}
		}

        if($club['addltag_ids'] == 14094){
            $has_access = memb_hasAnyTags($club['addltag_ids']);
            if($has_access){
                $tm_items = "";
           
                $key = array_search($club['login_page'], $clubs);   
                if( $key ){        
               
                     
                    
                    foreach($club_memberships as $in_club) {
                        $active_class="";
                    
                        if( in_array($in_club["login_page"], $club_page_ids) ){
                            $active_class = ($current_page_id == $in_club["login_page"]) ? "active" : "";
                            $current_club_name = $in_club['name'];
                            $club_logo = $in_club['main_id'] . "_logo.png";
                        }
                
                        $tm_items .= '<li>
                                        <a href="'.get_permalink($in_club["login_page"]).'" class="'.$active_class.'">'.$in_club['name'].'</a>
                                    </li>';
                    }
                }
            }


        }
        
    }

   // echo 'club name 1: '.$current_club_name;
    
    // Added by joe. july 23, 2021
    // so pages that doesn't have Club select, will show sidebar menu based on select club from meta
    if(!empty($default_user_dashboard)){
        if( empty($current_club_name)){
            $current_club_name = "";
            $club_logo = "";
            foreach($memberium["memberships"] as $ctid=>$memb){
                if( $default_user_dashboard == $memb["addltag_ids"]){
                  $current_club_name = $memb["name"];
                  $club_logo = $memb['main_id'] . "_logo.png";
                }
            }
            #$current_club_name = $memberium['memberships'][$default_user_dashboard]["name"];
            #$club_logo = $memberium['memberships'][$default_user_dashboard]['main_id'] . "_logo.png";
        }
    }

//echo '<br>club name 2: '.$current_club_name;

	if( !is_buddypress() && !is_page( 14028 ) && !is_page( 14091 ) && !is_page( 14370 ) ) {
		// universal class for each club name to be used in buddypanel sidebar style 
		// e.g. background-color of the buddypanel 
		$bp_club_class = strtolower(str_replace(' ','-',$current_club_name));
		$bp_club_class = str_replace('&','and',$bp_club_class);
	}
	
	
    ?>
	
    <aside class="buddypanel <?=$bp_club_class;?>-sidebar">


    <?php    
    
    $tooltip_menu = '<div class="tooltip_menu">
                        <ul class="tm_items">
                        <a href="'.get_home_url().'/?back=1" style="color: #A6B0BB;">CHOOSE YOUR CLUB</a>
                            '.$tm_items.'
                        </ul>
                    </div>';


	if( !is_buddypress() && !is_page( 14028 ) && !is_page( 14091 ) && !is_page( 14370 ) ) {
    
    if ( $header == '3' && !buddypanel_is_learndash_inner() ) {

        get_template_part( 'template-parts/site-logo' );

    } elseif ( $header == '3' && buddypanel_is_learndash_inner() ) { ?>

        <header class="panel-head">
            <img src="<?php echo get_stylesheet_directory_uri() . "/assets/img/" .$club_logo ?>" class="club_logo" alt="<?php echo $current_club_name. " Logo"; ?>" />
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dropdown.png" class="ph_dropdown" />
            <?php echo $tooltip_menu; ?>
		</header>

        <?php
        if ( buddyboss_is_learndash_brand_logo() && buddyboss_theme_ld_focus_mode() ) { ?>
            <div class="site-branding ld-brand-logo"><img src="<?php echo esc_url(wp_get_attachment_url(buddyboss_is_learndash_brand_logo())); ?>" alt="<?php echo esc_attr(get_post_meta(buddyboss_is_learndash_brand_logo() , '_wp_attachment_image_alt', true)); ?>"></div>  
        <?php } else {
            get_template_part( 'template-parts/site-logo' );   
        }

    } else { ?>

        <header class="panel-head">
            <img src="<?php echo get_stylesheet_directory_uri() . "/assets/img/" .$club_logo ?>" class="club_logo" alt="<?php echo $current_club_name. " Logo"; ?>" />
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dropdown.png" class="ph_dropdown" />
            <?php echo $tooltip_menu; ?>
		</header>

    <?php } ?>

	<div class="side-panel-inner">
        <div class="side-panel-menu-container">
            <div class="spmc_toggle">
                <!-- <a href="#" class="bb-toggle-panel"><img src="<?php echo get_stylesheet_directory_uri() . "/assets/img/toggle.png";?>" class="toggle_icon" /></a> -->
                <a href="#" class="custom_bb-toggle-panel"><img src="<?php echo get_stylesheet_directory_uri() . "/assets/img/toggle.png";?>" class="toggle_icon" /></a>
            </div>
    		<?php


            //echo $current_club_name;
            
            $club_menu["Gold Membership"] = 53;
            $club_menu["Your Crypto Club"] = 23;
            $club_menu["Your Forex Club"] = 29;
            $club_menu["Your Success & Wealth Club"] = 28;
            $club_menu["Your Trading Club"] = 24;

            $response = [];
        
            $menu_args = [];
            
            if(!empty($club_menu[ $current_club_name ])) 
            $menu_args['menu'] = $club_menu[ $current_club_name ];
    		$menu_args['theme_location'] = $menu;
    		$menu_args['menu_id']		 = 'buddypanel-menu';
    		$menu_args['container']		 = false;
    		$menu_args['fallback_cb']	 = '';
    		$menu_args['walker']         = new BuddyBoss_BuddyPanel_Menu_Walker();
    		$menu_args['menu_class']	 = 'buddypanel-menu side-panel-menu';
             
    		wp_nav_menu( $menu_args );
    		?>
        </div>
	</div>
	<?php }else{ ?>
        <header class="panel-head">
            <img src="/wp-content/uploads/2021/06/whitelogo-2048x628.png" class="club_logo" alt="Investment Mastery" />
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dropdown.png" class="ph_dropdown" />
            <?php echo $tooltip_menu; ?>
		</header>
		<div class="side-panel-inner">
			<div class="side-panel-menu-container">
				<div class="spmc_toggle">
					<a href="#" class="custom_bb-toggle-panel"><img src="<?php echo get_stylesheet_directory_uri() . "/assets/img/toggle.png";?>" class="toggle_icon" /></a>
				</div>
			</div>
		</div>
	<?php } ?>
</aside>