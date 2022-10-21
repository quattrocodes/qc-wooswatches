<?php
global $woocommerce;
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://quattrocodes.net
 * @since      1.0.0
 *
 * @package    Qc_Woosw
 * @subpackage Qc_Woosw/admin/partials
 */
?>
<div class="qc-woosw-admin-field attribute add-page form-field">
    <?php
        $attr_id = isset( $_GET['edit'] ) ? absint( $_GET['edit'] ) : 0;
        $attr_meta_value = $attr_id ? get_option( "qc-woosw-attribute-select-option-$attr_id" ) : '';

        parent::createField(
            'checkbox',
            'qc-woosw-attribute-select-option',
            $attr_meta_value,
            '',
            'Enable dropdown select',
            array(),
            'Set attribute terms to use select dropdown instead of custom swatches'
        );
    ?>
</div>