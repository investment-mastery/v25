<?php
/*
 * Template name: Club Profile Template
 *
 */

get_header();
$club = get_club_slug();

$is_buddyboss_bbpress = function_exists( 'buddyboss_bbpress' );
?>
<div id="primary" class="content-area">
    <?php
    $bbpress_banner = buddyboss_theme_get_option( 'bbpress_banner_switch' );
    
    ?>
    <main id="main" class="site-main">


        <article id="post-9" class="bp_members type-bp_members post-9 page type-page status-publish hentry">

            <div class="entry-content">
                <div id="buddypress" class="buddypress-wrap bp-dir-hori-nav">

                    <div id="item-header" role="complementary" data-bp-item-id="44" data-bp-item-component="members" class="users-header single-headers">

                    </div><!-- #item-header -->

                    <div class="bp-wrap bp-fullwidth-wrap">


                        <div class="bb-profile-grid ">
                            <div id="item-body" class="item-body">
                                <div class="item-body-inner">

                                    <header class="profile-header flex align-items-center">
                                        <h1 class="entry-title bb-profile-title"><?php the_title();?></h1>
                                    </header>

                                    <div class="bp-profile-wrapper">


                                        <nav class="bp-navs bp-subnavs no-ajax user-subnav" id="subnav" role="navigation" aria-label="Sub Menu">
                                            <ul class="subnav">

                                                <li id="general-personal-li" class="bp-personal-sub-tab" data-bp-user-scope="general">
                                                    <a href="/members/<?php $current_user = wp_get_current_user(); echo $current_user->user_nicename;?>/settings/" id="general">Login Information</a>
                                                </li>

                                                <li id="general-update-cc-li" class="bp-personal-sub-tab  <?php echo (is_page( 14028 )) ? 'current selected': ''?>" data-bp-user-scope="change-avatar">
                                                    <a href="/members/update-your-credit-card" id="update-cc">
                                                        Update Your Credit Card
                                                    </a>
                                                </li>

                                                <li id="general-add-cc-li" class="bp-personal-sub-tab <?php echo (is_page( 14091 )) ? 'current selected': ''?>" data-bp-user-scope="change-avatar">
                                                    <a href="/members/add-a-credit-card" id="add-cc">
                                                        Add A Credit Card
                                                    </a>
                                                </li>
                                                <?php /*
                                                <li id="general-add-cc-li" class="bp-personal-sub-tab <?php echo (is_page( 14370 )) ? 'current selected': ''?>" data-bp-user-scope="change-avatar">
                                                    <a href="/members/update-membership-status" id="update-membership">
                                                        Update Membership Status
                                                    </a>
                                                </li>
                                                */ ?>

                                            </ul>
                                        </nav><!-- .item-list-tabs#subnav -->

                                        <div class="bp-profile-content">


                                            <div class="cc edit">

                                                    <?php the_content(); ?>

                                            </div><!-- .cc -->


                                        </div>

                                    </div>
                                </div>
                            </div><!-- #item-body -->

                        </div>

                    </div><!-- // .bp-wrap -->


                </div><!-- #buddypress -->
            </div><!-- .entry-content -->

        </article>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
if ( ! function_exists( 'buddyboss_bbpress' ) && 'right' == $sidebar_position ) {
    get_sidebar( 'bbpress' );
}
?>

<?php
get_footer();

