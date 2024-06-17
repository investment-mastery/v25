<?php

if (!defined('ABSPATH')) {
	die();
}

$unlocks = get_option('memberium_protectlaunch_unlocks', false);

if ($unlocks === false) {
	$unlocks = array();
	$unlocks['welcome'] = true;
	add_option('memberium_protectlaunch_unlocks', $unlocks);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$modifyoption = get_option('memberium_wizards_astra_theme');

	if (isset($_POST['astratheme'])) {

		if ($_POST['astratheme'] == 'true') {
			$modifyoption = "true";

			update_option('memberium_wizards_astra_theme', $modifyoption, false);

			if (!file_exists(WP_CONTENT_DIR . '/themes/astra/')) {
				$this->loadModule('theme', 'https://downloads.wordpress.org/theme/astra.latest-stable.zip');
			}
			if (!file_exists(WP_CONTENT_DIR . '/themes/astra-memberium-child/')) {
				$this->loadModule('theme', 'https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/page_templates/8-2020/astra-memberium-child.zip');
			}

			if (file_exists(WP_CONTENT_DIR . '/themes/astra-memberium-child/style.css')) {
				switch_theme('astra-memberium-child');
			}

		} else if ($_POST['astratheme'] == 'false') {
			$modifyoption = "false";
			update_option('memberium_wizards_astra_theme', $modifyoption, false);
		}

		$unlocks['builder'] = true;
		$_GET['tab'] = 'builder';
	}

	if (isset($_POST['elementor'])) {
		$modifyoption = get_option('memberium_wizards_elementor');
		if ($_POST['elementor'] == 'true') {
			$modifyoption = "true";
			update_option('memberium_wizards_elementor', $modifyoption, false);

			while (!is_plugin_active('elementor/elementor.php')) {
				if (!file_exists(WP_PLUGIN_DIR . '/elementor/')) {
					$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/elementor.2.9.9.zip');
				}

				if (file_exists(WP_PLUGIN_DIR . '/elementor/elementor.php')) {
					activate_plugin('elementor/elementor.php');
					delete_transient('elementor_activation_redirect');
				}
			}


			$astra_enabled = get_option('memberium_wizards_astra_theme');

			if ($astra_enabled == 'false') {

				if (!is_plugin_active('memberium-page-templates-add-on/memberium-style.php')) {
					if (!file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/')) {
						$this->loadModule('plugin', 'https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/page_templates/8-2020/memberium-page-templates-add-on.zip');
					}
					
					if (file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/memberium-style.php')) {
							activate_plugin('memberium-page-templates-add-on/memberium-style.php');
					}
				}

			}
		} else if ($_POST['elementor'] == 'false') {
			$modifyoption = "false";
			update_option('memberium_wizards_elementor', $modifyoption, false);
		}
		$unlocks['lms'] = true;
		$_GET['tab'] = 'lms';
	}


	if (isset($_POST['usinglms'])) {
		if ($_POST['usinglms'] == 'true') {
			//$_POST['lmssytem'] will tell lms system being used
			if (isset($_POST['lmssystem'])) {
				$modifyoption = get_option('memberium_wizards_lms');
				if ($_POST['lmssystem'] == 'learndash') {
					$modifyoption = "learndash";
					update_option('memberium_wizards_lms', $modifyoption, false);
					if (isset($_POST['learndash_closecourse']) && $_POST['learndash_closecourse'] == 'true') {
						//TODO
					}
					//TODO
				} else if ($_POST['lmssystem'] == 'lifterlms') {
					$modifyoption = "lifterlms";
					update_option('memberium_wizards_lms', $modifyoption, false);
				} else if ($_POST['lmssystem'] == 'wpep') {
					$modifyoption = "nolms";
					update_option('memberium_wizards_lms', $modifyoption, false);
				} else if ($_POST['lmssystem'] == 'wpcourseware') {
					$modifyoption = "nolms";
					update_option('memberium_wizards_lms', $modifyoption, false);
				} else if ($_POST['lmssystem'] == 'sensei') {
					$modifyoption = "nolms";
					update_option('memberium_wizards_lms', $modifyoption, false);
				}
				//TODO
			}
			//TODO
		} else if ($_POST['usinglms'] == 'false') {
			$modifyoption = "nolms";
			update_option('memberium_wizards_lms', $modifyoption, false);
		}

		$unlocks['pages'] = true;
		$_GET['tab'] = 'pages';
	}

	if (isset($_POST['pages'])) {

		$elementor_enabled = get_option('memberium_wizards_elementor');
		$astra_enabled = get_option('memberium_wizards_astra_theme');
		$whatlms = get_option('memberium_wizards_lms');

/////////////////////////////////////////////////////////////////////////////////////////
/*
		if ($_POST['pages'] == 'true') {

			if ($astra_enabled == 'true') {
				if ($elementor_enabled == 'true') {
					if (!is_plugin_active('press-elements/press-elements.php')) {

						if (!file_exists(WP_PLUGIN_DIR . '/press-elements/')) {
							$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/press-elements.latest-stable.zip');
						}
						if (file_exists(WP_PLUGIN_DIR . '/press-elements/press-elements.php')) {
							activate_plugin('press-elements/press-elements.php');
							delete_transient('get_after_plugin_activation_redirect_url');

						}					
					}
				}
			}else if ($astra_enabled == 'false'){

			}
*/////////////////////////////////////////////////////////////////////////////////////////////////			
		if ($_POST['pages'] == 'true') {
			if ($elementor_enabled == 'true') {

				if (!is_plugin_active('press-elements/press-elements.php')) {
					if (!file_exists(WP_PLUGIN_DIR . '/press-elements/')) {
						$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/press-elements.latest-stable.zip');
					}
					if (file_exists(WP_PLUGIN_DIR . '/press-elements/press-elements.php')) {
						activate_plugin('press-elements/press-elements.php');
						delete_transient('get_after_plugin_activation_redirect_url');

					}
				}

				if ($astra_enabled == 'false') {

					if (!is_plugin_active('memberium-page-templates-add-on/memberium-style.php')) {
						if (!file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/')) {
							$this->loadModule('plugin', 'https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/page_templates/8-2020/memberium-page-templates-add-on.zip');
						}
						if (file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/memberium-style.php')) {
							activate_plugin('memberium-page-templates-add-on/memberium-style.php');
						}
					}

				}

/*
				while (!is_plugin_active('menu-items-visibility-control/init.php')) {
					if (!file_exists(WP_PLUGIN_DIR . '/menu-items-visibility-control/')) {
						$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/menu-items-visibility-control.zip');
					}
					if (file_exists(WP_PLUGIN_DIR . '/menu-items-visibility-control/init.php')) {
						activate_plugin('menu-items-visibility-control/init.php');
					}
				}
*/
				autoimport($whatlms, true);

////// final check for inactive plugins to be activated ///////////////////////////////////////////////

				if (file_exists(WP_PLUGIN_DIR . '/press-elements/press-elements.php')) {
					activate_plugin('press-elements/press-elements.php');
					delete_transient('get_after_plugin_activation_redirect_url');

				}

				if (file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/memberium-style.php')) {
					activate_plugin('memberium-page-templates-add-on/memberium-style.php');
				}		

/////////////////////////////////////////////////////////////////////////////////////////////////////////		

			} else if ($elementor_enabled == 'false') {


				if (!is_plugin_active('ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php')) {
					if (!file_exists(WP_PLUGIN_DIR . '/ultimate-addons-for-gutenberg/')) {
						$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/ultimate-addons-for-gutenberg.1.16.1.zip');
					}
					if (file_exists(WP_PLUGIN_DIR . '/ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php')) {
						activate_plugin('ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php');
					}
				}
				
									///// Full Width ///

				if (!is_plugin_active('fullwidth-templates/fullwidth-page-template.php')) {
					if (!file_exists(WP_PLUGIN_DIR . '/fullwidth-templates/')) {
						$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/fullwidth-templates.latest-stable.zip');
					}
					if (file_exists(WP_PLUGIN_DIR . '/fullwidth-templates/fullwidth-page-template.php')) {
						activate_plugin('/fullwidth-templates/fullwidth-page-template.php');
					}
				}


				if ($astra_enabled == 'false') {

					if (!is_plugin_active('memberium-page-templates-add-on/memberium-style.php')) {
						if (!file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/')) {
							$this->loadModule('plugin', 'https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/page_templates/8-2020/memberium-page-templates-add-on.zip');
						}
						if (file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/memberium-style.php')) {
							activate_plugin('memberium-page-templates-add-on/memberium-style.php');
						}
					}

				}


				autoimport($whatlms, false);

///////////////////////// final check for inactive plugins to be activated ///////////////////////////////////////////////
				if (file_exists(WP_PLUGIN_DIR . '/ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php')) {
						activate_plugin('ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php');
				}


				
				if (file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/memberium-style.php')) {
							activate_plugin('memberium-page-templates-add-on/memberium-style.php');
				}


				if (file_exists(WP_PLUGIN_DIR . '/fullwidth-templates/fullwidth-page-template.php')) {
						activate_plugin('/fullwidth-templates/fullwidth-page-template.php');
				}
			} 
		}

///////////////////////////////////////////////////////////////////////////////////
       /*
		if ($_POST['pages'] == 'true') {
			if ($elementor_enabled == 'false') {


				if (!is_plugin_active('ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php')) {
					if (!file_exists(WP_PLUGIN_DIR . '/ultimate-addons-for-gutenberg/')) {
						$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/ultimate-addons-for-gutenberg.1.16.1.zip');
					}
					if (file_exists(WP_PLUGIN_DIR . '/ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php')) {
						activate_plugin('ultimate-addons-for-gutenberg/ultimate-addons-for-gutenberg.php');
					}
				}
				
									///// Full Width ///

				while (!is_plugin_active('fullwidth-templates/fullwidth-page-template.php')) {
					if (!file_exists(WP_PLUGIN_DIR . '/fullwidth-templates/')) {
						$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/fullwidth-templates.latest-stable.zip');
					}
					if (file_exists(WP_PLUGIN_DIR . '/fullwidth-templates/fullwidth-page-template.php')) {
						activate_plugin('/fullwidth-templates/fullwidth-page-template.php');
					}

				autoimport($whatlms, false);


				}	

			}
		}

		*/	

		//$unlocks['membershipsettings'] = true;
		//$_GET['tab'] = 'membershipsettings';
		$unlocks['golive'] = true;
		$_GET['tab'] = 'golive';
	}

/*
	if ($elementor_enabled == 'true'){
		

			if (!is_plugin_active('elementor/elementor.php')) {
				if (!file_exists(WP_PLUGIN_DIR . '/elementor/')) {
					$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/elementor.2.9.9.zip');
				}

				if (file_exists(WP_PLUGIN_DIR . '/elementor/elementor.php')) {
					activate_plugin('elementor/elementor.php');
					delete_transient('elementor_activation_redirect');
				}
			}

	}



	if (($elementor_enabled == 'false') and ($astra_enabled == 'false')) {
		if (file_exists(WP_PLUGIN_DIR . '/memberium-page-templates-add-on/memberium-style.php')) {
				activate_plugin('memberium-page-templates-add-on/memberium-style.php');
		}
	
		if (file_exists(WP_PLUGIN_DIR . '/fullwidth-templates/fullwidth-page-template.php')) {
				activate_plugin('fullwidth-templates/fullwidth-page-template.php');
		}
		
	}

*/


//	if (isset($_POST['prebuilt_menus'])) {
//		$modifyoption = get_option('memberium_wizards_elementor');
	//	if ($_POST['prebuilt_menus'] == 'true') {

		/*if (!is_plugin_active('menu-items-visibility-control/init.php')) {
			if (!file_exists(WP_PLUGIN_DIR . '/menu-items-visibility-control/')) {
				$this->loadModule('plugin', 'https://downloads.wordpress.org/plugin/menu-items-visibility-control.zip');
			}
			if (file_exists(WP_PLUGIN_DIR . '/menu-items-visibility-control/init.php')) {
				activate_plugin('menu-items-visibility-control/init.php');
			}
		}*/
			// Check if the menu exists
		/*
			$menu_name = 'My First Menu';
			$menu_exists = wp_get_nav_menu_object( $menu_name );

			// If it doesn't exist, let's create it.
			           if( !$menu_exists){
				        $menu_id = wp_create_nav_menu($menu_name);

				        // Set up default menu items
				        wp_update_nav_menu_item($menu_id, 0, array(
					    'menu-item-title' =>  __('Home'),
					    'menu-item-classes' => 'home',
					    'menu-item-url' => home_url( '/' ),
					    'menu-item-status' => 'publish'));


					    wp_update_nav_menu_item($menu_id, 0, array(
						'menu-item-title' =>  __('Login'),
						'menu-item-url' => home_url( '/login/' ),
						'menu-item-status' => 'publish'));


						wp_update_nav_menu_item($menu_id, 0, array(
							'menu-item-title' =>  __('Logout'),
							'menu-item-url' => home_url( '/memberium:logout' ),
							'menu-item-status' => 'publish'));
						}

						$menucreated=0;

						$nav_menu_items = wp_get_nav_menu_items( $menu_id );
						foreach( $nav_menu_items as $nav_menu_item ) {

							if ($menucreated==1){
								update_post_meta( $nav_menu_item->ID, '_menu_item_visibility', '!is_user_logged_in()' );
							}
							else if ($menucreated==2){
								update_post_meta( $nav_menu_item->ID, '_menu_item_visibility', 'is_user_logged_in()' );
							}

							$menucreated=$menucreated+1;
						}

						$locations = get_theme_mod('nav_menu_locations');
						$locations['primary'] = $menu_id;
						set_theme_mod( 'nav_menu_locations', $locations );


		} else if ($_POST['prebuilt_menus'] == 'false') {
	      }

			$unlocks['lms'] = true;
			$_GET['tab'] = 'golive';
		}
             */
			}


			$tabs = array();
			$tabs['welcome'] = 'Welcome!';
			$tabs['theme'] = 'Theme';
			$tabs['builder'] = 'Builder';
			$tabs['lms'] = 'LMS';
			$tabs['pages'] = 'Pages';
			//$tabs['membershipsettings'] = 'Membership Settings';
			//$tabs['otheroptions'] = 'Other Options';
			$tabs['golive'] = 'Go Live';

			$current_tab = isset($_GET['tab']) && isset($tabs[$_GET['tab']]) ? strtolower($_GET['tab']) : 'welcome';

			echo '<div class="memb-wrap">';
			echo '<div class="memberium-navigation">';

			$tab_number = 0;
			foreach ($tabs as $tab => $name) {
				$tab_number++;
				$tab_unlocked = isset($unlocks[$tab]) && $unlocks[$tab] == true;

				if ($tab == $current_tab) {
					$memberium_wizards_progress['protectlaunch'] = 100 * $tab_number / count($tabs);
					$memberium_wizards_lasttab['protectlaunch'] = $tab;
					echo "<span class='memberium-navigation-chevron selected'><span class='memberium-navigation-tab'>$name</span></span>";
				} else if ($tab_unlocked) {
					echo "<span class='memberium-navigation-chevron active'><a class='memberium-navigation-tab' href='?page=", $_GET['page'], "&wizard=protectlaunch&tab=$tab'>$name</a></span>";
				} else {
					echo "<span class='memberium-navigation-chevron inactive'><span class='memberium-navigation-tab'>$name</span></span>";
				}
			}


			echo '</div>';
			echo '<div class="memberium-tabcontent tabcontent" style="margin-top:10px;">';

			$filename = MEMBERIUM_INSTALLER_LIB . '/screens/starthere-protectlaunch-' . $current_tab . '-show.php';
			if (file_exists($filename)) {
				require_once $filename;
			}

			echo '</div>';
			echo '</div>';

			update_option('memberium_protectlaunch_unlocks', $unlocks, false);


			function autoimport($whatlms, $withelementor)
			{
				// get the file
				$filename = MEMBERIUM_INSTALLER_LIB . '/autoimporter.php';
				if (file_exists($filename)) {
					require_once $filename;
				}

				$args = array();

				// call the function
				if ($withelementor) {
					if ($whatlms == "nolms") {

						$thexmlpath='https://memberiumaddons.s3.us-east-2.amazonaws.com/m4is/page+templates/m4is-NO-LMS-elementor-page-templates-shortcodes-8-2018.xml';
						$thexmlfile=MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-NO-LMS-elementor-page-templates-shortcodes-8-2018.xml';

						$args = array(
							'file' => MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-NO-LMS-elementor-page-templates-shortcodes-8-2018.xml',
							'map_user_id' => 1
						);
					} else if ($whatlms == "learndash") {

						$thexmlpath='https://memberiumaddons.s3.us-east-2.amazonaws.com/m4is/page+templates/2019/m4is-LearnDash-elementor-page-templates-shortcodes-10-2019.xml';
						$thexmlfile=MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LearnDash-elementor-page-templates-shortcodes-8-2018.xml';

						$args = array(
							'file' => MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LearnDash-elementor-page-templates-shortcodes-8-2018.xml',
							'map_user_id' => 1
						);
					} else if ($whatlms == "lifterlms") {

						$thexmlpath='https://memberiumaddons.s3.us-east-2.amazonaws.com/m4is/page+templates/2019/m4is-LifterLMS-elementor-page-templates-shortcodes-10-2019.xml ';
						$thexmlfile=MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LifterLMS-elementor-page-templates-shortcodes.xml';

						$args = array(
							'file' => MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LifterLMS-elementor-page-templates-shortcodes.xml',
							'map_user_id' => 1
						);
					}
				} else {
					if ($whatlms == "nolms") {

						$thexmlpath='https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/page_templates/8-2020/m4is-NO-LMS-RAW-page-templates-shortcodes.xml';
						$thexmlfile=MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-NO-LMS-RAW-page-templates-shortcodes.xml';

						$args = array(
							'file' => MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-NO-LMS-RAW-page-templates-shortcodes.xml',
							'map_user_id' => 1
						);
					} else if ($whatlms == "learndash") {

						$thexmlpath='https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/page_templates/8-2020/m4is-LearnDash-raw-page-templates-shortcodes.xml';
						$thexmlfile=MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LearnDash-raw-page-templates-shortcodes.xml';

						$args = array(
							'file' => MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LearnDash-raw-page-templates-shortcodes.xml',
							'map_user_id' => 1
						);
					} else if ($whatlms == "lifterlms") {

						$thexmlpath='https://memberiumwizard.s3-us-west-1.amazonaws.com/m4is/page_templates/8-2020/m4is-LifterLMS-raw-page-templates-shortcodes.xml';
						$thexmlfile=MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LifterLMS-raw-page-templates-shortcodes.xml';


						$args = array(
							'file' => MEMBERIUM_INSTALLER_LIB . '/page-templates/m4is-LifterLMS-raw-page-templates-shortcodes.xml',
							'map_user_id' => 1
						);
					}
				}

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$thexmlpath);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$xml = curl_exec($ch);
				curl_close($ch);



				if (file_put_contents ($thexmlfile, $xml) !== false) {
					//echo 'Success!<br>';
					//echo $whatlms;
				} else {
					echo 'Failed <br>';
					//echo $whatlms;
				}


				auto_import($args);

			}
