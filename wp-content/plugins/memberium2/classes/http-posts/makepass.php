<?php
 class_exists('m4is_pms8y') || die();
  final 
class m4is_namu { private $m4is_bnd6ti;
 private $m4is_e2kg = 0;
 private $m4is_ex2_k = true;
 private $m4is_yh5y = false;
 private $m4is_q5pwc = 0;
 private $m4is_fliw = '';
 private $m4is__gr_w = false;
 private $m4is_vkmpdo = false;
 private $m4is_t6r3xw = [];
 private $m4is_xf9b = '';
 private $m4is_ydo2qh = [];
 private $m4is_q8vgfd = 0;
 private $m4is_pkd7 = false;
 private $m4is_j485e = '';
 private $m4is_dcf_7 = '';
 private $m4is_tfmod = 0;
 private $m4is_c2ah = [];
 private $m4is_x0_hk = null;
 private $m4is_gai6k = '';
 private $m4is_powbq2 = '';
 private $m4is_r5ucij = false;
 static 
function m4is_xexw( array $m4is_t6r3xw = [], array $m4is_c2ah = [] ) : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self( $m4is_t6r3xw, $m4is_c2ah );
 } private 
function __construct( array $m4is_t6r3xw = [], array $m4is_c2ah = [] ) { ini_set( 'display_errors', 1 );
 $m4is_t6r3xw = empty( $m4is_t6r3xw ) ? $_GET : $m4is_t6r3xw;
 $m4is_c2ah = empty( $m4is_c2ah ) ? $_POST : $m4is_c2ah;
 m4is_aoxw::m4is_djr4nd();
 $this->m4is_gbqd0( $m4is_t6r3xw, $m4is_c2ah );
 $this->m4is_ynpw();
 $this->m4is_jgq6();
 $this->m4is_vcpa4();
 $this->m4is_ddzbr_();
 $this->m4is_xfcs();
 $this->m4is_my9o();
 $this->m4is_oga9();
    $this->m4is_kx0u_d();
 $this->m4is_kc6ai();
 $this->m4is_e9m0g();
 $this->m4is_ftx9();
 $this->m4is_xb_9l();
 } 
function __destruct() { $this->close_log();
  } private 
function m4is_gbqd0( array $m4is_t6r3xw, array $m4is_c2ah ) { $this->m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 $this->m4is_t6r3xw = $m4is_t6r3xw;
 $this->m4is_c2ah = $m4is_c2ah;
 $this->m4is_dcf_7 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'password_field' );
 $this->m4is_tfmod = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'min_password_length' );
 $this->m4is_powbq2 = $this->m4is_bnd6ti->m4is_oiewvu( 'settings', 'username_field' );
 } private 
function m4is_ynpw() { $this->m4is_p9r_8e = $this->m4is_c2ah;
 $this->m4is_e2kg = isset( $this->m4is_p9r_8e['Id'] ) ? (int) $this->m4is_p9r_8e['Id'] : 0;
 $this->m4is_gai6k = isset( $this->m4is_c2ah[ $this->m4is_powbq2 ] ) ? $this->m4is_c2ah[ $this->m4is_powbq2 ] : 'Email';
 $this->m4is_fliw = isset( $this->m4is_p9r_8e['Email'] ) ? $this->m4is_p9r_8e['Email'] : '';
 $this->m4is_ex2_k = isset( $this->m4is_t6r3xw['adduser'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['adduser'], true ) : true;
 $this->m4is_yh5y = isset( $this->m4is_t6r3xw['debug'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['debug'], false ) : false;
 $this->m4is_pkd7 = isset( $this->m4is_t6r3xw['overwrite'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['overwrite'], false ) : false;
 $this->m4is_q5pwc = empty( $this->m4is_t6r3xw['delay'] ) ? 0 : (int) $this->m4is_t6r3xw['delay'];
 $this->m4is_xf9b = empty( $this->m4is_t6r3xw['goal'] ) ? '' : $this->m4is_t6r3xw['goal'];
 $this->m4is_s54hod = empty( $this->m4is_t6r3xw['sync'] ) ? [] : array_filter( explode( ',', strtolower( trim( $this->m4is_t6r3xw['sync'] ) ) ) );
 $this->m4is_x25z14 = empty( $this->m4is_t6r3xw['tagids'] ) ? [] : array_filter( explode( ',', $this->m4is_t6r3xw['tagids'] ) );
 $this->m4is_r5ucij = isset( $this->m4is_t6r3xw['verbose'] ) ? $this->m4is_jbxts( $this->m4is_t6r3xw['verbose'], false ) : false;
 $this->m4is_j485e = isset( $this->m4is_p9r_8e[ $this->m4is_dcf_7 ] ) ? trim( $this->m4is_p9r_8e[ $this->m4is_dcf_7 ] ) : '';
 $this->m4is_gai6k = isset( $this->m4is_p9r_8e[ $this->m4is_powbq2 ] ) ? trim( $this->m4is_p9r_8e[ $this->m4is_powbq2 ] ) : '';
 $this->m4is_q8vgfd = m4is__gu52::m4is_eh6lg( $this->m4is_e2kg, 'httppost', 'MakePass' );
 $this->m4is_ydo2qh[] = sprintf( "Contact ID = %d, Username = %s", $this->m4is_e2kg, $this->m4is_gai6k );
 $this->m4is_ydo2qh[] = sprintf( "AddUser = %s, OverWrite = %s, Sync = %s, Tags = %s", $this->m4is_oyar9d( $this->m4is_ex2_k ), $this->m4is_oyar9d( $this->m4is_pkd7 ), implode( ',', $this->m4is_s54hod ), implode( ',', $this->m4is_x25z14 ) );
 if ( $this->m4is_yh5y ) { echo __LINE__, " - Begin MakePass at ", microtime(true) ,"\n";
 echo __LINE__, " - Debug Mode Enabled\n";
 echo __LINE__, " - Contact ID = ", $this->m4is_e2kg, "\n";
 echo __LINE__, " - Username = ", $this->m4is_gai6k, "\n";
 echo __LINE__, " - Password Field = ", $this->m4is_dcf_7, "\n";
 echo __LINE__, " - Password Value = ", empty( $this->m4is_p9r_8e[ $this->m4is_dcf_7 ] ) ? 'Empty' : 'Populated', "\n";
 echo __LINE__, " - AddUser = ", $this->m4is_oyar9d( $this->m4is_ex2_k ), "\n";
 echo __LINE__, " - OverWrite = ", $this->m4is_oyar9d( $this->m4is_pkd7 ), "\n";
 echo __LINE__, " - Delay = ", $this->m4is_q5pwc, "\n";
 echo __LINE__, " - Goal = ", $this->m4is_xf9b, "\n";
 echo __LINE__, " - Sync Flags = ", implode( ', ', $this->m4is_s54hod ), "\n";
 echo __LINE__, " - Tag IDs = ", implode( ', ', $this->m4is_x25z14 ), "\n";
 if ( $this->m4is_r5ucij ) { foreach( $this->m4is_t6r3xw as $m4is_s2ge5 => $m4is_w_o7al ) { echo __LINE__, " - GET[{$m4is_s2ge5}] = ", $m4is_w_o7al, "\n";
 } } } }  private 
function m4is_jgq6() { $this->m4is_x0_hk = get_user_by( 'email', $this->m4is_fliw );
 if ( $this->m4is_x0_hk ) { $m4is_wbgl5s = sprintf( "User '%s' found in WordPress database.", $this->m4is_x0_hk->user_login );
 $this->m4is_ydo2qh[] = $m4is_wbgl5s;
 if ( $this->m4is_yh5y ) echo __LINE__, " - {$m4is_wbgl5s}\n";
 } else { if ( $this->m4is_yh5y ) echo __LINE__, " - No user found with email '{$this->m4is_fliw}'\n";
 } }  private 
function m4is_vcpa4() { if ( ! $this->m4is_x0_hk ) { return;
 } if ( user_can( $this->m4is_x0_hk, 'manage_options' ) ) { $m4is_p6_h[] = 'Error:  Contact email matches an admin account.';
 } if ( ! empty( $m4is_p6_h ) ) { $m4is_p6_h[] = 'Aborting account creation.';
 if ( $this->m4is_yh5y ) { echo implode( "\n", $m4is_p6_h ), "\n";
 printf( "%d - Finished MakePass at %s\n", __LINE__, microtime( true ) );
 } $this->m4is_ydo2qh = array_merge( $this->m4is_ydo2qh, $m4is_p6_h );
 $this->close_log();
 die();
 } }  private 
function m4is_ddzbr_() { if ( $this->m4is_pkd7 == true && $this->m4is_x0_hk == false ) { return;
 } if ( $this->m4is_dcf_7 !== 'Password' ) { return;
 } if( ! empty( $this->m4is_p9r_8e[$this->m4is_dcf_7] ) ) { return;
 } $m4is_w_8g = [ 'Password' ];
 $m4is_p9r_8e = m4is_bnrdbo::m4is_i38y7c( $this->m4is_e2kg, $m4is_w_8g );
 $this->m4is_p9r_8e['Password'] = empty( $m4is_p9r_8e['Password'] ) ? '' : $m4is_p9r_8e['Password'];
 ksort( $this->m4is_p9r_8e );
 if ($this->m4is_yh5y) echo __LINE__, " - Retrieved Built-in Password Field from API\n";
 }  private 
function m4is_xfcs() { $m4is_k85b = true;
 $m4is_p6_h = [];
 if ( $this->m4is_pkd7 == false && $this->m4is_x0_hk ) { $m4is_p6_h[] = __LINE__ . " - User '{$this->m4is_x0_hk->user_login}' found in WordPress database.  Password generation skipped.";
 $m4is_k85b = false;
 } if ( $this->m4is_p9r_8e[$this->m4is_dcf_7] && strlen( $this->m4is_p9r_8e[$this->m4is_dcf_7] ) >= $this->m4is_tfmod ) { $m4is_p6_h[] = __LINE__ . " - Using supplied password.  Password passes length test.";
 $m4is_k85b = false;
 } if ( $this->m4is_pkd7 == true && empty( $this->m4is_p9r_8e[$this->m4is_dcf_7] ) ) { $m4is_p6_h[] = __LINE__ . " - Generating new password due to empty Password Field.";
 $m4is_k85b = true;
 } if ( $this->m4is_pkd7 == true && $this->m4is_p9r_8e[$this->m4is_dcf_7] === 'PASSWORD_PLACEHOLDER' ) { $m4is_p6_h[] = __LINE__ . " - Generating new password due to PASSWORD_PLACEHOLDER.";
 $m4is_k85b = true;
 } if ( $this->m4is_yh5y ) { foreach( $m4is_p6_h as $m4is_jadl06 ) { echo $m4is_jadl06 . "\n";
 } } $this->m4is_vkmpdo = $m4is_k85b;
 }  private 
function m4is_my9o() { $m4is_p6_h = [];
 if ( ! $this->m4is_e2kg ) { $m4is_p6_h[] = 'Error:  Invalid Keap contact ID';
 } if ( empty( $this->m4is_fliw ) ) { $m4is_p6_h[] = 'Error:  Email address missing or invalid';
 } if ( empty( $this->m4is_gai6k ) ) { $m4is_p6_h[] = 'Error:  No valid username defined in Memberium settings';
 } if ( ! empty( $this->m4is_p9r_8e[ $this->m4is_dcf_7 ] ) ) { if ( strlen( $this->m4is_p9r_8e[ $this->m4is_dcf_7 ] ) < $this->m4is_tfmod ) { $m4is_p6_h[] = 'Error:  Supplied Password is too short';
 } } if ( empty( $this->m4is_p9r_8e['FirstName'] ) ) { $m4is_p6_h[] = 'Error:  First Name Missing.  The First Name field is required.';
 } if ( ! empty( $m4is_p6_h ) ) { $m4is_p6_h[] = 'Aborting account creation.';
 if ( $this->m4is_yh5y ) { echo implode( "\n", $m4is_p6_h ), "\n";
 printf( "%d - Finished MakePass at %s\n", __LINE__, microtime( true ) );
 } $this->m4is_ydo2qh = array_merge( $this->m4is_ydo2qh, $m4is_p6_h );
 $this->close_log();
 die();
 } }  private 
function m4is_oga9() { $this->m4is_bnd6ti->m4is_dhpr( $this->m4is_p9r_8e );
 if ( $this->m4is_yh5y ) { echo __LINE__, " - Updating Local Contact Cache\n";
 if ( $this->m4is_r5ucij ) { foreach( $this->m4is_p9r_8e as $m4is_s2ge5 => $m4is_w_o7al ) { echo __LINE__, " - Contact[{$m4is_s2ge5}] = ", $m4is_w_o7al, "\n";
 } } } }    private 
function m4is_kx0u_d() { $m4is_f2e5 = true;
 if ( $this->m4is_x0_hk ) { $m4is_gai6k = $this->m4is_x0_hk->user_login;
 $m4is_f2e5 = false;
 $this->m4is_vkmpdo = false;
 if ( $this->m4is_pkd7 ) { $m4is_vf_b = sprintf( "Warning: User %s found in WordPress database. Overwriting Password.", $m4is_gai6k );
 $m4is_f2e5 = true;
 $this->m4is_vkmpdo = true;
 } else { $m4is_vf_b = sprintf( 'Warning: User %s found in WordPress database. Password creation skipped.', $m4is_gai6k );
 $this->m4is_vkmpdo = false;
 } if ( $this->m4is_yh5y ) { echo __LINE__, ' - ', $m4is_vf_b, "\n";
 } $this->m4is_ydo2qh[] = $m4is_vf_b;
 } } private 
function m4is_kc6ai() { $m4is_m5mq = false;
 $m4is_j485e = empty( $this->m4is_p9r_8e[ $this->m4is_dcf_7 ] ) ? '' : $this->m4is_p9r_8e[ $this->m4is_dcf_7 ];
  if ( ! empty( $m4is_j485e ) ) { $m4is_m5mq = true;
 $this->m4is_j485e = $m4is_j485e;
 $this->m4is_ydo2qh[] = 'Using Password from Keap Contact Record';
 if ( $this->m4is_yh5y ) echo __LINE__, " - Using Password from Keap contact record\n";
 } if ( isset( $m4is_j485e ) && $m4is_j485e == 'PASSWORD_PLACEHOLDER' ) { $m4is_m5mq = false;
 $this->m4is_pkd7 = true;
 $this->m4is_j485e = '';
 } if ( $this->elv_generate_passord ) { if ( $m4is_m5mq && ! $this->m4is_pkd7 ) { $this->m4is_ydo2qh[] = 'Password Generation Disabled';
 $this->m4is_vkmpdo = false;
 } else { $this->m4is_vkmpdo = true;
 } } if ($this->m4is_yh5y ) { printf( "%d - Password Exists    = %s\n", __LINE__, $this->m4is_oyar9d( $m4is_m5mq ) );
 printf( "%d - Password Overwrite = %s\n", __LINE__, $this->m4is_oyar9d( $this->m4is_pkd7 ) );
 printf( "%d - Generate Password  = %s\n", __LINE__, $this->m4is_oyar9d( $this->m4is_vkmpdo ) );
 printf( "%d - Password Length    = %d\n", __LINE__, $this->m4is_tfmod );
 } } private 
function m4is_e9m0g() { if ( ! $this->m4is_vkmpdo ) { return;
 }  $this->m4is_j485e = $this->m4is_bnd6ti->m4is_e9m0g();
 if ( $this->m4is_yh5y ) { echo __LINE__, " - Password Generated: {$this->m4is_j485e}\n";
 } $this->m4is_ydo2qh[] = "New password generated.";
 $this->m4is_p9r_8e[ $this->m4is_dcf_7 ] = $this->m4is_j485e;
 $updated_fields = [ $this->m4is_dcf_7 => $this->m4is_j485e, ];
 $m4is_oa_z = m4is_bnrdbo::m4is_cseh( $this->m4is_e2kg, $updated_fields );
  $this->m4is_bnd6ti->m4is_jtmik_( $this->m4is_e2kg, $this->m4is_p9r_8e );
 if ( $this->m4is_yh5y ) { echo __LINE__, " - password_field = ", $this->m4is_dcf_7, "\n";
 echo __LINE__, " - Updated Password to {$this->m4is_j485e} \n";
 foreach( $m4is__xn_jt as $m4is_s2ge5 => $m4is_w_o7al ) { echo __LINE__, " - Updated Field: {$m4is_s2ge5} = {$m4is_w_o7al}\n";
 } } } private 
function m4is_ftx9() { $m4is_ig9p6 = $this->m4is_bnd6ti->m4is_b34y( $this->m4is_e2kg, $this->m4is_j485e );
 if ( $this->m4is_yh5y ) { echo __LINE__, " - Contact ID #", $this->m4is_e2kg, "\n";
 echo __LINE__, " - Password:  '", $this->m4is_j485e, "'\n";
 if ( $m4is_ig9p6 ) { echo __LINE__, " - User ID (", $m4is_ig9p6, ") Added / Updated\n";
 } else { echo __LINE__, " - User Not Added / Updated\n";
 } } if ( $m4is_ig9p6 ) { if ( is_multisite() && ! is_user_member_of_blog( $m4is_ig9p6 ) ) { $m4is_zjx_ = get_current_blog_id();
 $m4is_e_u17 = get_blog_option( $m4is_zjx_, 'default_role', 'subscriber' );
 add_user_to_blog( $m4is_zjx_, $m4is_ig9p6, $m4is_e_u17 );
 } $this->m4is_bnd6ti->m4is_akz3( $m4is_ig9p6 );
 } } private 
function m4is_xb_9l() { if ( ! empty( $this->m4is_x25z14 ) ) { $this->m4is_bnd6ti->m4is_tcle75( $this->m4is_x25z14, $this->m4is_e2kg );
 if ($m4is_xxcq3i) { echo __LINE__, " - Added Tags: ", implode(', ', $this->m4is_x25z14 ), "\n";
 } $this->m4is_ydo2qh[] = sprintf('Added Tags ', implode( ', ', $this->m4is_x25z14 ) );
 } if ( ! empty( $this->m4is_xf9b ) ) {  $m4is_xm2h = m4is_ho3l::m4is_xy3j( $this->m4is_e2kg, $this->m4is_xf9b );
 if ( $this->m4is_yh5y ) { printf( "%d - Goal Achieved with %s\n", __LINE__, $this->m4is_xf9b );
 print_r( $m4is_xm2h );
 } } if ( $this->m4is_yh5y ) { echo __LINE__, " - Updated Contact\n";
 echo __LINE__, " - Sleeping: {$this->m4is_q5pwc} seconds\n";
 } $this->m4is_bnd6ti->m4is_m3vz( $this->m4is_e2kg );
 $this->m4is_bnd6ti->m4is_q285('send_http_post');
 sleep( $this->m4is_q5pwc );
 } private 
function m4is_oyar9d( $m4is_w_o7al ) { return $m4is_w_o7al ? 'Yes' : 'No';
 } private 
function m4is_jbxts( $m4is_w_o7al, bool $m4is_koi38 = false ) : bool { $m4is_w_o7al = strtolower( substr( trim( $m4is_w_o7al ), 0, 1 ) );
 return in_array( $m4is_w_o7al, [ 'y', 't', '1' ] ) ? true : ( in_array( $m4is_w_o7al, [ 'n', 'f', '0' ] ) ? false : $m4is_koi38 );
 }  private 
function close_log() { if ( $this->m4is_q8vgfd && ! empty( $this->m4is_ydo2qh ) ) { m4is__gu52::m4is_qyunz0( $this->m4is_q8vgfd, implode( "\n", $this->m4is_ydo2qh ) );
 } if ( $this->m4is_yh5y ) { printf( "Exiting MakePass HTTP POST Process at %s\n", microtime( true ) );
 } } }

