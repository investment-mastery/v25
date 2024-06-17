<?php
/**
 * Copyright (c) 2022 David J Bullock
 * Web Power and Light
 */

 class_exists('m4is_pms8y') || die();
  
class m4is_b4rbzn { private $api_key;
 private $api_secret;
 private $api_base = 'https://api.zoom.us/v2/';
 private $api_count = 0;
 
function __construct( $m4is_s2ge5, $m4is__djm5 ){ $this->api_key = $m4is_s2ge5;
 $this->api_secret = $m4is__djm5;
 }  
function m4is_lwcua6($m4is_h7j0, $m4is_k4yeul = false) { $m4is_gqid = ['headers' => $this->m4is_fkj95()];
 if( is_array($m4is_k4yeul) ){ $m4is_gqid = wp_parse_args($m4is_k4yeul, $m4is_gqid);
 } $m4is_d71ub = wp_remote_get($this->api_base.$m4is_h7j0, $m4is_gqid);
 $this->api_count++;
 return $this->m4is_pp51xf($m4is_d71ub);
 }  
function m4is_n64p8f($m4is_h7j0, $m4is_gey9o = false){ return $this->m4is_ds3w( $this->api_base.$m4is_h7j0, 'POST', $m4is_gey9o );
 }  
function m4is_ldwz( $m4is_h7j0, $m4is_gey9o = false ){ return $this->m4is_ds3w( $this->api_base.$m4is_h7j0, 'PATCH', $m4is_gey9o );
 }  
function m4is_j8r1dz( $m4is_h7j0, $m4is_gey9o = false ){ return $this->m4is_ds3w( $this->api_base.$m4is_h7j0, 'PUT', $m4is_gey9o );
 }  
function m4is_k2n4( $m4is_h7j0, $m4is_gey9o = false ){ return $this->m4is_ds3w( $this->api_base.$m4is_h7j0, 'DELETE', $m4is_gey9o );
 }  
function m4is_ds3w( $m4is_imdo6, $m4is_h7j0, $m4is_gey9o = false ){ $m4is_gqid = [ 'method' => $m4is_h7j0, 'headers' => $this->m4is_fkj95() ];
 if($m4is_gey9o){ $m4is_gqid['body'] = ( is_array($m4is_gey9o) ) ? json_encode($m4is_gey9o) : $m4is_gey9o;
 } $m4is_d71ub = wp_remote_request($m4is_imdo6, $m4is_gqid);
 $this->api_count++;
 return $this->m4is_pp51xf($m4is_d71ub);
 }  
function m4is_fkj95() { return [ 'Authorization' => 'Bearer ' . $this->m4is_l6kb(), 'Content-Type' => 'application/json', 'Accept' => 'application/json', ];
 }  
function m4is_l6kb(){ $m4is_n260nx = time() * 1000 - 30000;
 $m4is_rrm56 = json_encode(['typ' => 'JWT','alg' => 'HS256']);
 $m4is_obhx0r = $this->m4is_i961($m4is_rrm56);
 $m4is_vv4s9k = json_encode(['iss' => $this->api_key, 'exp' => $m4is_n260nx]);
 $m4is_cdltk = $this->m4is_i961($m4is_vv4s9k);
 $m4is_k1k7oj = hash_hmac('sha256', $m4is_obhx0r . "." . $m4is_cdltk, $this->api_secret, true);
 $m4is_v8rz = $this->m4is_i961($m4is_k1k7oj);
 $m4is__blvz = $m4is_obhx0r . "." . $m4is_cdltk . "." . $m4is_v8rz;
 return $m4is__blvz;
 } 
function m4is_i961($m4is_etj2){ $m4is_tf1p = base64_encode($m4is_etj2);
 if ($m4is_tf1p === false) { return false;
 } $m4is_imdo6 = strtr($m4is_tf1p, '+/', '-_');
 return rtrim($m4is_imdo6, '=');
 }  
function m4is_bvwhl( $m4is_j5sy07, $m4is_smxn ){ $m4is_n260nx = time() * 1000 - 30000;
 $m4is_etj2 = base64_encode($this->api_key.$m4is_j5sy07.$m4is_n260nx.$m4is_smxn);
 $m4is_i978y = hash_hmac('sha256', $m4is_etj2, $this->api_secret, true);
 $m4is_i978y = base64_encode($m4is_i978y);
 $m4is_k1k7oj = "{$this->api_key}.{$m4is_j5sy07}.{$m4is_n260nx}.{$m4is_smxn}.{$m4is_i978y}";
 return rtrim(strtr(base64_encode($m4is_k1k7oj), '+/', '-_'), '=');
 }  
function m4is_pp51xf( $m4is_d71ub ){ if ( is_wp_error($m4is_d71ub) ){ return $m4is_d71ub;
 } else { return json_decode(wp_remote_retrieve_body($m4is_d71ub));
 } } }

