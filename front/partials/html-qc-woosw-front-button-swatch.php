<?php

/**
 * Provide a front-facing view for the plugin
 *
 * This file is used to markup front view for color swatches.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Wooswatches
 * @subpackage Qc_Wooswatches/front/partials
 */

    $button_txt_meta = get_term_meta( $term_id, 'qc-woosw-button-text', true );
    $button_txt = is_string($button_txt_meta) && !empty($button_txt_meta) ? $button_txt_meta : $option;

    $bg_color_meta = get_term_meta( $term_id, 'qc-woosw-btn-bg-color', true );
    $bg_color = is_string($bg_color_meta) ? $bg_color_meta : "#f2f2f2";

    $txt_color_meta = get_term_meta( $term_id, 'qc-woosw-btn-txt-color', true );
    $txt_color = is_string($txt_color_meta) ? $txt_color_meta : "#222222";
?> 
    <button class="qc-woosw-swatch-item button" type="button" style="background-color: <?php echo $bg_color; ?>; color: <?php echo $txt_color;?>"><?php echo $button_txt ?></button>
<?php
?>