<?php

/**
 * Provide a front-facing view for the plugin
 *
 * This file is used to markup the front-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Wooswatches
 * @subpackage Qc_Wooswatches/front/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="qc-woosw-front-swatches">
    <?php 
  
    foreach ($options as $option):

        $term = get_term_by('slug', $option, $attribute);
 
        $term_id = $term->term_id;
 
        $swatchType = get_term_meta($term_id, 'qc-woosw-select-value', true);
 
        if ($swatchType === 'color'):
            
            include 'html-qc-woosw-front-color-swatch.php';

        elseif ($swatchType === 'img'):
            include 'html-qc-woosw-front-image-swatch.php';

        else:
            include 'html-qc-woosw-front-button-swatch.php';

        endif; 

    endforeach;
    ?>
</div>