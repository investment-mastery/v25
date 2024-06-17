<?php
 class_exists('m4is_pms8y') || die();
 ?><fieldset data-asset-id="<?= $m4is_gpwr1c;
 ?>" data-asset-type="<?= $m4is_r54a;
 ?>" data-user-status="<?= $m4is_uqykhj;
 ?>" class="memb-asset-access-fieldset">

    <legend class="memb-asset-access-legend">Memberium</legend>

    <?php foreach ($m4is_w_8g as $m4is_g1ru50){ $m4is_t5ot4 = $m4is_g1ru50['name'];
 $m4is_u23rl = $m4is_g1ru50['type'];
 $m4is_o7tdnl = $m4is_g1ru50['id'];
 $m4is_iqdn = $m4is_g1ru50['field_name'];
 $m4is_w_o7al = $m4is_g1ru50['value'];
 $m4is_fk6e78 = !empty($m4is_g1ru50['info']) ? $m4is_g1ru50['info'] : false;
  echo "<div class=\"memb-asset-access-field-control\" data-setting=\"{$m4is_t5ot4}\">";
 $m4is_unc_q = $m4is_g1ru50['label'];
 if( $m4is_fk6e78 ){ $m4is_unc_q .= "<div class=\"memb-asset-access-tooltip\"><span class=\"dashicons dashicons-info\"></span>";
 $m4is_unc_q .= "<span class=\"memb-asset-access-tooltiptext\">{$m4is_fk6e78}</span></div>";
 } echo sprintf('<label for="%s" class="memb-asset-access-field-label">%s</label>', $m4is_o7tdnl, $m4is_unc_q);
 if( $m4is_u23rl === 'text' ){ echo sprintf('<input type="%s" name="%s" id="%s" value="%s" class="widefat %s-field-input"/>', $m4is_u23rl, $m4is_iqdn, $m4is_o7tdnl, esc_attr($m4is_w_o7al), $m4is_qqwj1c );
 } else if ($m4is_u23rl === 'select2') { $m4is_etj2 = isset($m4is_g1ru50['data']) ? $m4is_g1ru50['data'] : 0;
 $m4is_p02bmy = isset($m4is_g1ru50['multiple']) ? (int)$m4is_g1ru50['multiple'] : 0;
 $m4is_vrhj4 = $m4is_p02bmy > 0 ? " data-multiple=\"1\"" : "";
 $m4is_pjo3k = isset($m4is_g1ru50['change']) ? $m4is_g1ru50['change'] : false;
 $m4is_bgur = !empty($m4is_pjo3k) ? " data-change=\"{$m4is_pjo3k}\"" : "";
 $m4is_bgur .= isset($m4is_g1ru50['disable-search']) ? " data-disable-search=\"1\"" : "";
 echo sprintf('<input type="text" name="%s" id="%s" value="%s" class="widefat %s-field-input" data-memb-asset-select2="%s"%s%s/>', $m4is_iqdn, $m4is_o7tdnl, esc_attr($m4is_w_o7al), $m4is_qqwj1c, $m4is_etj2, $m4is_vrhj4, $m4is_bgur );
 } else if($m4is_u23rl === 'textarea') { $m4is_hpn9y = isset($m4is_g1ru50['rows']) ? (int)$m4is_g1ru50['rows'] : 1;
 echo sprintf('<textarea name="%s" id="%s" class="widefat %s-field-textarea" rows="%s">%s</textarea>', $m4is_iqdn, $m4is_o7tdnl, $m4is_qqwj1c, $m4is_hpn9y, $m4is_w_o7al );
 } if( isset($m4is_g1ru50['desc']) && $m4is_g1ru50['desc'] > '' ){ echo sprintf('<p class="memb-asset-access-description description">%s</p>', $m4is_g1ru50['desc']);
 } echo '</div>';
 } ?>

</fieldset>

