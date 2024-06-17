<?php
/**
 * Copyright (c) 2012-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
   
function memb_getContactId() : int { return (int) m4is_wbc8os::m4is_jjgo();
 }  
function memb_getContactIdByUserId( int $user_id ) : int { return (int) m4is_bnrdbo::m4is_ltwpgs( $user_id );
 }  
function memb_getUserIdByContactId(int $contact_id) : int { return m4is_bnrdbo::m4is_d3na($contact_id);
 }   
function memb_hasAnyTags( $tags, $contact_id = false ) : bool {  $m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
  if (( ! $contact_id ) && $m4is_bnd6ti->m4is_lvmz1b() ) { return true;
 }  if (! $contact_id) { $contact_id = isset($_SESSION['keap']['contact']['id']) ? $_SESSION['keap']['contact']['id'] : 0;
 }  if ($contact_id) {  $m4is_rt3vlo = isset($_SESSION['keap']['contact']['id']) ? $_SESSION['keap']['contact']['id'] == $contact_id : false;
   if ($m4is_rt3vlo) { $contact_tags = isset($_SESSION['keap']['contact']['groups']) ? $_SESSION['keap']['contact']['groups'] : '';
 } else { $contact_tags = m4is_bnrdbo::m4is_yvnol($contact_id)['Groups'];
 }  if (! empty($contact_tags)) { return $m4is_bnd6ti->m4is_v1dwme($tags, $contact_tags);
 } }  return false;
 }  
function memb_hasAllTags($tags, $contact_id = false) : bool { return m4is_pms8y::m4is_e5l8a9()->m4is_mhx6( $tags, $contact_id );
 }   
function memb_hasAnyMembership() : bool { return m4is_w0enbm::m4is_e5l8a9()->m4is_pwmt29();
 }  
function memb_hasMembership( string $level_name ) : bool { return m4is_w0enbm::m4is_e5l8a9()->m4is_qst2( $level_name );
 }  
function memb_hasMembershipLevel( int $level) : bool { return m4is_w0enbm::m4is_e5l8a9()->m4is_vw9n( $level );
 }   
function memb_overrideProhibitedAction( string $action = 'default' ) { return m4is_w0enbm::m4is_e5l8a9()->m4is_nnv5d( $action );
 }  
function memb_isPostProtected( $post ) : bool { return m4is_w0enbm::m4is_e5l8a9()->m4is_it1zf( $post );
 }  
function memb_hasPostAccess( int $post_id, int $user_id = 0 ) : bool { return m4is_w0enbm::m4is_e5l8a9()->m4is_k_4p2o( $post_id, $user_id );
 }  
function memb_hasTermAccess(int $term_id, $taxonomy) : bool { return m4is_nfu7hp::m4is_e5l8a9()->m4is_kwngbr( $term_id, $taxonomy );
 }   
function memb_changeContactEmail( string $email, int $user_id, bool $force_username = null ) : bool { return (bool) m4is_pms8y::m4is_e5l8a9()->m4is_az3tn8( $user_id, $email, 0, $force_username );
 }  
function memb_changeContactPassword( string $new_password, int $contact_id = 0 ) : bool { return (bool) m4is_pms8y::m4is_e5l8a9()->m4is_a1w0q( $new_password, $contact_id );
 }   
function memb_setContactField( string $key, $value, int $contact_id = 0) : bool { if ( empty( $key ) ) { return false;
 } return (bool) m4is_pms8y::m4is_e5l8a9()->m4is_wzxl_1( $key, $value, $contact_id );
 }  
function memb_getContactField( string $fieldname, bool $sanitize = false ) { return (string) m4is_w0enbm::m4is_e5l8a9()->m4is_tud7( $fieldname, $sanitize );
 }  
function memb_loadContactById( int $contact_id ) : array { return (array) m4is_bnrdbo::m4is_yvnol( $contact_id );
 }  
function memb_syncContact( int $contact_id, bool $cascade = false ) : bool { return (bool) m4is_pms8y::m4is_e5l8a9()->m4is_leu58( $contact_id, $cascade );
 }  
function memb_setTags( $tags, int $contact_id = 0, bool $force = false) : bool { return (bool) m4is_pms8y::m4is_e5l8a9()->m4is_tcle75( $tags, $contact_id, $force );
 }  
function memb_getSession( int $user_id ) : array { return ( isset($_SESSION['memb_user']['user_id'] ) && $_SESSION['memb_user']['user_id'] == (int) $user_id ) ? $_SESSION : m4is_pms8y::m4is_e5l8a9()->m4is_akz3( $user_id );
 }  
function memb_getAffiliateField( string $fieldname, bool $sanitize = false ) : string { return m4is_w0enbm::m4is_e5l8a9()->m4is_fkajlu( $fieldname, $sanitize );
 }   
function memb_runActionset( $actionset_ids = '', int $contact_id = 0 ) : bool { return (bool) m4is_pms8y::m4is_e5l8a9()->m4is_u86vzq( $actionset_ids, $contact_id );
 }   
function memb_getReceipt( array $args = []) : array { return m4is_pms8y::m4is_e5l8a9()->m4is_u3zvs( $args );
 }   
function memb_getUserFields(string $field_name, int $user_id = 0) { return m4is_wbc8os::m4is_u3dzkp($field_name, $user_id);
 }  
function memb_setUserField(string $field_name, $value, int $user_id = 0) { return m4is_wbc8os::m4is_ehvrpa($field_name, $value, $user_id);
 }  
function memb_getMembershipMap() : array { return m4is_pms8y::m4is_e5l8a9()->m4is_oiewvu('memberships');
 } 
function memb_getTagMap( bool $cache_bust = false, bool $negatives = false ) : array { return m4is_pwtg7::m4is_i0au6j( $cache_bust ,$negatives );
 } 
function memb_getContactFieldsMap() : array { return m4is_ho3l::m4is_kjedy2( 'Contact', false );
 } 
function memb_createTag( $tag_name, $category_id = 0, $description = 'Created by Memberium PHP API' ) { $tag_name = trim( $tag_name );
 $category_id = (int) $category_id;
 $description = trim( $description );
 return m4is_pwtg7::m4is_icnizm( $tag_name, $category_id, $m4is_ljzrq0 );
 } 
function memb_loadPostPermissions( int $post_id ) { return m4is_rv9lt::m4is_sj0z( $post_id );
 } 
function memb_savePostPermissions( int $post_id, $permissions, $value = null ) { return m4is_rv9lt::m4is_y34p( $post_id, $permissions, $value );
 }   
function memb_get_keap_api() { return m4is_pms8y::m4is_e5l8a9()->m4is_zw_n();
 } 
function memb_getAppName() : string { return m4is_pms8y::m4is_e5l8a9()->m4is_d14zr('appname');
 }  
function memb_getPostSettings( int $post_id ) { return m4is_rv9lt::m4is_sj0z($post_id);
 } 
function memb_get_license_status() : string { return m4is_u68pu::m4is_u6mkaw();
 } 
function memb_has_license_tags( $tags ) : bool { $tags = is_array($tags) ? $tags : explode(',', $tags);
 return m4is_u68pu::m4is_u26m8u($tags);
 } 
function memb_is_license_trial() : bool { return m4is_u68pu::m4is_o3ey18();
 }   
function memb_getLoggedIn() : bool { return is_user_logged_in();
 }  
function memb_is_loggedin() : bool { return is_user_logged_in();
 }  
function memb_doShortcode( string $content, bool $do_regular_shortcodes = true ) : string { return do_shortcode($content);
 } 
function doMemberiumLogin( string $username, string $password = '', bool $idempotent = false ) { return m4is_ypvg9::m4is_lo2vuf($username, $password, $idempotent);
 } 
function memb_setSSOMode( bool $mode = true ) { return m4is_pms8y::m4is_e5l8a9()->m4is_y903nq($mode);
 }

