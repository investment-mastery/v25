<?php
/*
 * Template name: New Announcement board
 *
 */

get_header();
?>

<?php the_content(); ?>
</div>
<style>

    .tab-wrapper {
        display: block;
    }

    .tabs {
        margin: 0;
        padding: 0;
        display: flex;
        border-bottom: 2px solid #122b46;
        /* justify-content: center; */
    }

    .tab-link {
        font-family: "Montserrat", Sans-serif;
        font-size: 22px;
        font-weight: 600;
        list-style: none;
        padding: 20px 25px;
        color: #aaa;
        cursor: pointer;
       transition: all ease 0.5s;
    }

    .tab-link:hover {
        color: #122B46;
        border-bottom: 2px solid #0099f0 !important;
    }

    .tab-link.active {
        color: #122B46;
        border-bottom: 2px solid #0099f0 !important;
    }

    .content-wrapper {
        padding: 40px 30px;
    }

    .tab-content {
        display: none;
        opacity: 0;
        transform: translateY(15px);
        animation: fadeIn 0.5s ease 1 forwards;
    }
    .accordian-content-col li, .accordian-content-col p {
        color: #7B838E;
        font-family: "Source Sans Pro", Sans-serif;
        font-size: 16px;
        font-weight: 400;
    }
    .tab-content.active {
        display: block;
    }
    .accordian_wrp_title {
        color: #1F3C61;
        font-family: "Montserrat", Sans-serif;
        font-size: 16px;
        font-weight: 700;
        line-height: 28px;
        margin-bottom: 20px;
    }

    @keyframes fadeIn {
        100% {
            opacity: 1;
            transform: none;
        }
    }

    .accordion {
        max-width: 1170px;
    }

    .at-tab {
        display: none;
        padding: 15px 20px;
        border: 1px solid #dddddd;
        border-top: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .at-title {
        cursor: pointer;
        background-color: #f5f5f5;
        position: relative;
        transition: background-color 0.3s ease;
        border: 1px solid #d5d8dc;
    }

    .at-title:hover {
        background-color: #e0e0e0;
    }

    .at-title:after {
        font-weight: 600;
        content: "+";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 17px;
        transition: all 0.3s ease;
        font-size: 28px;
        color: #1F3C61;
    }

    .at-title.active:after {
        content: "-";
    }

    .at-item {
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .at-title h2 {
        padding: 15px 20px;
        background-color: #fff;
        font-family: "Montserrat", Sans-serif;
        font-size: 16px;
        color: #1F3C61;
        font-weight: 700;
        line-height: 28px;
        margin-bottom: 0;
    }
    .at-title.active h2 {
        background-color: #f3f3f3;
    }

    .accordion-header {
        text-align: center;
        background-color: #222222;
        color: white;
        padding: 20px 0;
    }
    .accordian-content-wrp {
        display: flex;
        gap: 50px;
        justify-content: space-between;
    }
    .accordian-content-col img {
        width: 300px;
    }
	.accordian_wrp_title p.text_muted.event_bult{
		 color: #7A7A7A;
        font-family: "Montserrat", Sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 28px;
	}
    h2.accordian_wrp_title.event-heading p {
        color: #7A7A7A;
        font-family: "Montserrat", Sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 28px;
    }
	h2.accordian_wrp_title.event-heading p{
		font-size: 9px;
		transform: translate(0px, -2px);
	}
	.accordian_wrp_title p.text_muted.event_bult i {
		font-size: 9px;
		transform: translate(0px, -2px);
	}
    .event-heading a {
        color: #1F3C61 !important;
        font-weight: 600;
            text-decoration: underline;
    }
    
     /* Media query for mobile devices */
    @media only screen and (max-width: 768px) {
        .tab-wrapper {
            width: 100%;
            overflow-y: hidden;
            border-bottom: 2px solid #122b46 !important;
        }
        .tabs {
            width: auto;
            border-bottom:0px;
        }
        .tab-link{
            font-size: 18px;
            padding: 15px 15px;
            white-space: nowrap;
        }
        .content-wrapper{
            padding: 25px 10px;
            
        }
        .accordian-content-wrp{
            display:block;
        }
        .accordion .at-title.active {
            background-color: #f5f5f5; /* Adjust active accordion title background color */
        }

        .at-tab {
            display: block; /* Hide all accordion content by default on mobile */
        }
        .accordian-content-col img {
            width: 100%;
        }
    }
</style>
<div class="announcements-wrapper" id="announcement-board">
	<?php 
		$post_id 		= get_the_ID(); 
		$user_id 		= get_current_user_id();
		$club 			= get_field('club');
		$active_tab_id 	= get_field('active_tab');
		$flag 			= 0;
	
		if($club == '3880') : 
			$flag = get_field('gold_announcement_flag', 'user_' .$user_id); 
		elseif($club == '1249'):
			$flag = get_field('crypto_announcement_flag', 'user_' .$user_id); 
		elseif($club == '2579'):
			$flag = get_field('trading_announcement_flag', 'user_' .$user_id); 
		endif;
	
		$active_tab = ($flag == 1) ? $active_tab_id : 0 ;
		$rowcount = count(get_field("trading_club_announcement"));
	
		//$active_tab = $active_tab_id;
	?>
    <?php if( have_rows('trading_club_announcement') ): 
        $tabCount = 0; ?>
        <div class="tab-wrapper">
            <ul class="tabs">
                <?php while( have_rows('trading_club_announcement') ): the_row(); 
                    $tabCount++; 
				
					if($active_tab != 0):
						if($active_tab > $rowcount ):
							$active_class = ($tabCount == 1) ? 'active' : '' ;
						else:
							$active_class = ($tabCount == $active_tab) ? 'active' : '' ;
						endif;
					else:
						$active_class = ($tabCount == 1) ? 'active' : '' ;
					endif;
				?>
                <li class="tab-link <?php echo $active_class; ?>" data-tab="<?php echo $tabCount; ?>"><?php the_sub_field('tab_title') ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if( have_rows('trading_club_announcement') ): 
        $tabContentCount = 0; ?>
        <div class="content-wrapper">
                <?php while( have_rows('trading_club_announcement') ): the_row(); 
                    $tabContentCount++; 
					
                    if($active_tab != 0):
						if($active_tab > $rowcount ):
							$active_class = ($tabContentCount == 1) ? 'active' : '' ;
						else:
							$active_class = ($tabContentCount == $active_tab) ? 'active' : '' ;
						endif;
					else:
						$active_class = ($tabContentCount == 1) ? 'active' : '' ;
					endif;
                    $event_heading_class = (get_sub_field('tab_title') == "Events") ? 'event-heading' : '';
					
                ?>
                <div id="tab-<?php echo $tabContentCount; ?>" class="tab-content <?php echo $active_class; ?>" data-date="<?php the_sub_field('modification_date'); ?>">
                    <?php if( have_rows('tab_content') ): ?>
                        <?php while( have_rows('tab_content') ): the_row(); ?>
							<div class="tab-content-wrapper">
                                <h2 class="accordian_wrp_title <?php echo $event_heading_class; ?>"><?php the_sub_field('heading') ?></h2>
                                <div class="accordion">
                                    <?php if( have_rows('accordian') ): ?>
                                        <?php while( have_rows('accordian') ): the_row(); ?>
                                            <div class="at-item">
                                                <div class="at-title">
                                                    <h2><?php the_sub_field('heading') ?></h2>
                                                </div>
                                                <?php if( have_rows('image_group') ): ?>
                                                    <?php while( have_rows('image_group') ): the_row(); ?>
                                                    <?php $image = get_sub_field('image'); ?>
                                                        <div class="at-tab" style="display: none;">
                                                            <div class="accordian-content-wrp">
                                                                <div class="accordian-content-col"><?php the_sub_field('text') ?></div>
                                                                <div class="accordian-content-col"><a href="<?php the_sub_field('image_link') ?>" target="_blank"><img src="<?php echo $image['url']; ?>"></a></div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<script>
   

    jQuery(document).ready(function ($) {
        $('.tab-link').click(function () {

            var tabID = $(this).attr('data-tab');

            $(this).addClass('active').siblings().removeClass('active');

            $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
        });

        $(".at-title").click(function () {
            $(this).toggleClass("active").next(".at-tab").slideToggle().parent().siblings().find(".at-tab").slideUp().prev().removeClass("active");
        });
    });
</script>
<?php
get_footer();?>