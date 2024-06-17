<?php
 class_exists( 'm4is_pms8y' ) || die();
 current_user_can( 'manage_options' ) || wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
 m4is_r03w::m4is_gm1n();
 
class m4is_r03w { private $m4is_k9vt = '';
 private $m4is_jwjgx = [];
 private $m4is_cum01;
 static 
function m4is_gm1n() : self { static $m4is_ye0_i;
 return $m4is_ye0_i ?? $m4is_ye0_i = new self();
 } private 
function __construct() { $this->m4is_cum01 = m4is_gk3xz::m4is_e5l8a9();
 $this->m4is_jwjgx = $this->m4is_iu612g();
 $this->m4is_k9vt = $this->m4is_wp4r( $_GET );
  $this->m4is_k_i3nb( $_POST );
 $this->m4is_teot9r();
 } 
function m4is_iu612g() { $m4is_jwjgx = [ 'leaderboards' => '<i class="fa fa-list-ol"></i> Create Leaderboards', 'about' => '<i class="fa fa-users"></i> About',  ];
 return $m4is_jwjgx;
 } 
function m4is_wp4r( $m4is_t6r3xw ) { return isset( $_GET['tab'] ) ? $_GET['tab'] : 'leaderboards';
 } 
function m4is_k_i3nb( $m4is_c2ah ) { if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) { return;
 } if ( isset( $m4is_c2ah['create-leaderboard'] ) ) { $this->m4is_ieg2z_( $m4is_c2ah );
 } elseif ( isset( $m4is_c2ah['update-leaderboard'] ) ) { $this->m4is_mrxkb3( $m4is_c2ah );
 } elseif ( isset( $m4is_c2ah['refresh'] ) ) { $this->m4is_kng_f( $m4is_c2ah );
 } } private 
function m4is_kng_f( $m4is_c2ah ) { $m4is_j5sy07 = (int) $_POST['refresh'];
 $m4is_toz0 = $this->m4is_cum01->m4is_lxyv();
 $m4is_toz0[$m4is_j5sy07] = m4is_e4e9x8::m4is_t49i3u( $m4is_toz0[$m4is_j5sy07] );
 $m4is_s8w15 = require_once __DIR__ . '/cron.php';
 $this->m4is_cum01->m4is__j5k( $m4is_toz0 );
 m4is_e4e9x8::m4is_t49i3u( $m4is_toz0[$m4is_j5sy07] );
 } private 
function m4is_mrxkb3( $m4is_c2ah ) { $m4is_toz0 = $this->m4is_cum01->m4is_lxyv();
 foreach( $m4is_c2ah['profile'] as $m4is_s2ge5 => $m4is__6cahu ) { $m4is_toz0[$m4is_s2ge5]['slots'] = $m4is__6cahu['slots'];
 $m4is_toz0[$m4is_s2ge5]['start_date'] = $m4is__6cahu['start_date'];
 $m4is_toz0[$m4is_s2ge5]['end_date'] = $m4is__6cahu['end_date'];
 $m4is_toz0[$m4is_s2ge5]['last_updated'] = 0;
  if ( ! empty( $m4is__6cahu['delete'] ) ) { unset( $m4is_toz0[$m4is_s2ge5] );
 } } $this->m4is_cum01->m4is__j5k( $m4is_toz0 );
 } private 
function m4is_ieg2z_( $m4is_c2ah ) { $m4is_toz0 = $this->m4is_cum01->m4is_lxyv();
 $m4is_rvy65 = [];
 $m4is_rvy65['name'] = empty( $m4is_c2ah['name'] ) ? '' : substr( trim( $m4is_c2ah['name'] ), 0, 40 );
 $m4is_rvy65['type'] = empty( $m4is_c2ah['type'] ) ? 'leads' : $m4is_c2ah['type'];
 $m4is_rvy65['slots'] = empty( $m4is_c2ah['slots'] ) ? 0 : $m4is_c2ah['slots'];
 $m4is_rvy65['start_date'] = empty( $m4is_c2ah['start_date'] ) ? '' : $m4is_c2ah['start_date'];
 $m4is_rvy65['end_date'] = empty( $m4is_c2ah['end_date'] ) ? '' : $m4is_c2ah['end_date'];
 $m4is_rvy65['products'] = empty( $m4is_c2ah['products'] ) ? '' : trim( $m4is_c2ah['products'], ',' );
 $m4is_rvy65['last_updated'] = 0;
 $m4is_rvy65['cache'] = [];
 if ( empty( $m4is_rvy65['name'] ) ) { return;
 } $m4is_toz0[] = $m4is_rvy65;
 $this->m4is_cum01->m4is__j5k( $m4is_toz0 );
 } 
function m4is_teot9r() { m4is_wr40w::m4is_kj4sp();
 $this->m4is_ojvd();
 if ($this->m4is_k9vt == 'about' ) { $this->m4is_dd51vj();
 } elseif ( $this->m4is_k9vt == 'leaderboards' ) { $this->m4is_rs0m();
 } $this->m4is_lo38du();
 } private 
function m4is_ojvd() { echo '</h2>';
 echo '<div class="memberium_tabcontent" style="margin-top:10px;">';
 echo '<div class="wrap">';
 echo '<h2>', __( 'Affiliate Leaderboard Settings' ), '</h2>';
 echo '<h2 class="nav-tab-wrapper">';
 foreach ( $this->m4is_jwjgx as $m4is_r2l5 => $m4is_t5ot4 ) { $m4is_nz3t = ( $m4is_r2l5 == $this->m4is_k9vt ) ? ' nav-tab-active' : '';
 if ( $m4is_r2l5 == $this->m4is_k9vt ) { echo "<span class='nav-tab$m4is_nz3t'>$m4is_t5ot4</span>";
 } else { echo "<a class='nav-tab{$m4is_nz3t}' href='?page=", $_GET['page'], "&tab={$m4is_r2l5}'>{$m4is_t5ot4}</a>";
 } } echo '</h2>';
 echo '<div class="memberium_tabcontent" style="margin-top:10px;">';
 } 
function m4is_dd51vj() { $m4is_bu7y = __( 'Version' ) . ' ' . $this->m4is_cum01->m4is_u04m();
 echo <<<HTMLBLOCK
			<h2>
				Memberium Affiliate Leaderboard Extension for Keap
			</h2>
			<p>{$m4is_bu7y}</p>
			<p>Copyright &copy; 2017-2024 David Bullock, Web Power and Light</p>
		HTMLBLOCK;
 } 
function m4is_rs0m() { $m4is_toz0 = $this->m4is_cum01->m4is_lxyv();
 $m4is_s8w15 = m4is_e4e9x8::m4is_e5l8a9();
 $m4is_z8sd = m4is_untczd::m4is_j68se();
 if ( ! empty( $m4is_toz0 ) ) { echo '<h3>Live Leaderboards</h3>';
 echo '<form method="post">';
 echo '<table class="widefat">';
 echo '<tr>';
 echo '<td style="width:50px;">Delete</td>';
 echo '<td>Name</td>';
 echo '<td style="width:50px;">Type</td>';
 echo '<td style="width:50px;">Slots</td>';
 echo '<td style="width:75px;">Start</td>';
 echo '<td style="width:75px;">End</td>';
 echo '<td>Products</td>';
 echo '<td style="width:75px;">&nbsp;</td>';
 echo '</tr>';
 foreach( $m4is_toz0 as $m4is_s2ge5 => $m4is_gvpi6 ) { echo '<tr>';
 echo '<td><input type="checkbox" name="profile[',$m4is_s2ge5,'][delete]" value="1"></td>';
 echo '<td>', $m4is_gvpi6['name'] ,'</td>';
 echo '<td>', ucwords( $m4is_gvpi6['type'] ) ,'</td>';
 echo '<td><input type="number" style="width:50px;" value="', $m4is_gvpi6['slots'], '" step="1" min="1" name="profile[',$m4is_s2ge5,'][slots]"></td>';
 echo '<td><input type="date" value="', $m4is_gvpi6['start_date'], '" name="profile[',$m4is_s2ge5,'][start_date]"></td>';
 echo '<td><input type="date" value="', $m4is_gvpi6['end_date'], '" name="profile[',$m4is_s2ge5,'][end_date]"></td>';
 echo '<td>';
 $m4is_jg7jo = empty( $m4is_gvpi6['products'] ) ? [] : array_filter( explode( ',', $m4is_gvpi6['products'] ) );
 $m4is_uzfw8j = '';
 if ( ! empty( $m4is_jg7jo ) ) { foreach( $m4is_jg7jo as $m4is_j5sy07 ) { $m4is_uzfw8j .= $m4is_z8sd[$m4is_j5sy07]['ProductName'] . ', ';
 } unset( $m4is_jg7jo, $m4is_j5sy07 );
 } echo trim( $m4is_uzfw8j, ', ' );
 echo '</td>';
 echo '<td><button name="refresh" class="button button-primary" value="', $m4is_s2ge5, '">Refresh</button></td>';
  echo '</tr>';
 } echo '</table>';
 echo '<p><input type="submit" name="update-leaderboard" value="Update Leaderboards" class="button-primary"></p>';
 echo '</form>';
 } else { echo '<p>You have no affiliate leaderboards created.  Create one now!</p>';
 } echo <<<HTMLBLOCK
			<form method="post" id="newprofile">
				<ul>
					<h3>Create New Leaderboard</h3>
		HTMLBLOCK;
 $m4is_k4yeul = [ 'id' => 'newprofile_name', 'label' => 'Profile Name', 'placeholder' => 'Enter a name for your Leaderboard here', 'required' => true, 'size' => 40, ];
 echo m4is_wr40w::m4is_ymnfe7('name', $m4is_k4yeul);
 $m4is_wov2 = [ 'leads' => 'Most Leads', 'dollars' => 'Most Sales by Dollar Amount', 'invoices' => 'Most Sales by Invoice Count', ];
 $m4is_k4yeul = [ 'id' => 'newprofile_type', 'class' => 'basic-single', 'style' => 'width:250px;', ];
 $m4is_lh4p70 = null;
 echo '<li><label>Leaderboard Type</label>';
 echo m4is_q1zh2::get_instance()->m4is_xevs('type', $m4is_wov2, $m4is_lh4p70, $m4is_k4yeul);
 echo m4is_wr40w::m4is_vgnp( 0000 ), '</li>';
 $m4is_k4yeul = [ 'id' => 'newprofile_slots', 'label' => 'Slots', 'placeholder' => '', 'type' => 'number', 'min' => 1, 'step' => 1, 'value' => 10, 'style' => 'width:50px;', 'required' => true, ];
 echo m4is_wr40w::m4is_ymnfe7( 'slots', $m4is_k4yeul );
 $m4is_k4yeul = [ 'id' => 'newprofile_start_date', 'label' => 'Start Date', 'placeholder' => 'mm/dd/yyyy', 'size' => 10, 'type' => 'date', 'required' => true, ];
 echo m4is_wr40w::m4is_ymnfe7( 'start_date', $m4is_k4yeul );
 $m4is_k4yeul = [ 'id' => 'newprofile_end_date', 'label' => 'End Date', 'placeholder' => 'mm/dd/yyyy', 'size' => 10, 'type' => 'date', 'required' => true, ];
 echo m4is_wr40w::m4is_ymnfe7( 'end_date', $m4is_k4yeul );
 $m4is_k4yeul = [ 'id' => 'newprofile_products', 'label' => 'Products', 'placeholder' => 'Select the products for your leaderboard, or leave blank for all', 'type' => 'text', 'class' => 'multiproductlistdropdown', 'style' => 'width:500px;', 'required' => false, ];
 echo m4is_wr40w::m4is_ymnfe7( 'products', $m4is_k4yeul );
 echo '</ul>';
 echo '<p><input type="submit" name="create-leaderboard" value="Create Leaderboard" class="button-primary"></p>';
 echo '</form>';
 echo '<hr>';
 echo '</div>';
 echo '</div>';
 } 
function m4is_lo38du() { $m4is_z8sd = m4is_untczd::m4is_j68se();
 $m4is__hq73p = [];
 if ( empty( $m4is_z8sd) || ! is_array( $m4is_z8sd ) ) { return;
 }  foreach( $m4is_z8sd as $m4is_si73 ) { $m4is__hq73p[] = [ 'id' => $m4is_si73['Id'], 'text' => $m4is_si73['ProductName'] . ' (' . $m4is_si73['Id'] . ')' ];
 } $m4is__hq73p = json_encode( $m4is__hq73p );
 echo '<script>';
 echo 'var productlist = ', $m4is__hq73p, ';';
 echo '</script>';
 } } ?>
<script>
	jQuery( '#newprofile').change( function() {
		var profile_type = jQuery( '#newprofile_type' ).val();
		if ( profile_type == 'leads' ) {
			jQuery(".filteroptions").prop( 'disabled', true );
			jQuery(".filteroptions").hide();
		}
		else {
			jQuery(".filteroptions").prop( 'disabled', false );
			jQuery(".filteroptions").show();
		}
	});

</script>

