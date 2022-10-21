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


      <div class="qc-woosw-admin-field term form-field">

            <label for="qc-woosw-select-type">Choose swatch type</label>
            <?php
              
              $select_options = array(
                  'color'  => __('Color', 'woocommerce'),
                  'img'    => __('Image', 'woocommerce'),
                  'button' => __('Button', 'woocommerce'),
               );

               $select_meta_value = parent::termMetaValue( $taxonomy->term_id, 'qc-woosw-select-value', 'button');
               
               parent::createField( 'select', 'qc-woosw-select-type', $select_meta_value, '', '', $select_options );

               parent::createField( 'hidden', 'qc-woosw-select-value', $select_meta_value );
 
            ?>
      </div>

      <div class="qc-woosw-admin-field term form-field">
            <label>Choose swatch value</label>
            <!-- Color palette -->
            <div class="qc-woosw-color-swatch-wrap swatch-wrap hide">
               <?php

               $color_swatch_meta_value = parent::termMetaValue( $taxonomy->term_id, 'qc-woosw-color-value', '#ff4242');
               
               parent::createField( 
                  'text', 
                  'qc-woosw-color-value',
                  $color_swatch_meta_value,
                  'qc-woosw-color-palette',
               );
     
               ?>
            </div>

            <!-- Image Swatch -->
            <div class="qc-woosw-img-swatch-wrap swatch-wrap hide">
               <?php

                  $image_id = get_term_meta($taxonomy->term_id, 'qc-woosw-img-value', true);

                  if (isset($image_id)) {
                     $image_url = wp_get_attachment_url($image_id);
                     $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                  }
               ?>

               <img alt="<?php echo $image_alt; ?>" class="qc-woosw-img-preview" src="<?php echo sanitize_url($image_url); ?>" width="80px" />
               <!-- Upload image wrap -->
               <div class="qc-woosw-wrap upload">
                  <!-- uploaded attachmenet id -->
                  <?php

                  $img_swatch_meta_value = parent::termMetaValue( $taxonomy->term_id, 'qc-woosw-img-value', '');
                                 
                  parent::createField( 
                     'hidden', 
                     'qc-woosw-img-value',
                     $img_swatch_meta_value,
                     'qc-woosw-color-palette',
                  );
                  ?>
                  <button class="qc-woosw-upload-img-btn upload-button button-add-media button">Select image</button>
               </div>


               <!-- Remove image wrap -->
               <div class="qc-woosw-wrap remove hide">
                  <button class="qc-woosw-remove-img-btn button" type="button">Remove image</button>
                  <button class="qc-woosw-upload-img-btn change upload-button button-add-media button" type="button">Change image</button>
               </div>

            </div>

            <!-- Button Swatch -->
            <div class="qc-woosw-button-swatch-wrap swatch-wrap hide">
               
               <?php
               
               $btn_swatch_txt_meta_value = parent::termMetaValue( $taxonomy->term_id, 'qc-woosw-button-text', '');
                                 
               parent::createField( 
                  'text', 
                  'qc-woosw-button-text',
                  $btn_swatch_txt_meta_value,
                  __('Enter button text', 'woocommerce'),

               );
               ?>
               <div class="qc-woosw-button-colors">
                  <?php

                  $btn_swatch_bg_color_meta_value = parent::termMetaValue( $taxonomy->term_id, 'qc-woosw-btn-bg-color', '#f2f2f2');
                                 
                  parent::createField( 
                     'text', 
                     'qc-woosw-color-value',
                     $btn_swatch_bg_color_meta_value,
                     'qc-woosw-color-palette',
                     __('Background color', 'woocommerce'),
                  );

                  $btn_swatch_bg_color_meta_value = parent::termMetaValue( $taxonomy->term_id, 'qc-woosw-btn-txt-color', '#222222');
                                 
                  parent::createField( 
                     'text', 
                     'qc-woosw-color-value',
                     $btn_swatch_bg_color_meta_value,
                     'qc-woosw-color-palette',
                     __('Text color', 'woocommerce')
                  );
                  
                  ?>
               </div>

            </div>

   </div>