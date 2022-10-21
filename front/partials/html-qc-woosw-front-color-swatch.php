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

$color = get_term_meta( $term_id, 'qc-woosw-color-value', true );
?>
<button type="button" class="qc-woosw-swatch-item color" style="background-color: <?php echo $color; ?>"></button>
