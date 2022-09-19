<?php
global $woocommerce;
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Qc_Wooswatches
 * @subpackage Qc_Wooswatches/admin/partials
 */
?>




<table class="form-table">
   <tbody>
      <tr class="form-field">
         <th scope="row">
            <label for="qc_wooswatches_select_type">Choose swatch type</label> 
         </th>
         <td>
            <select name="qc_wooswatches_select_type" id="qc_wooswatches_select_type">
               <option value="color" default>Color</option>
               <option value="img">Image</option>
               <option value="text">Text</option>
            </select>
         </td>
      </tr>

      <tr class="form-field">
         <th scope="row">
            <label for="qc_wooswatches_select_value">Choose swatch value</label> 
         </th>
         <td>
            <!-- Color palette -->
            <div class="color_palette_wrap">
               <input type="text" value="#ff4242" id="color_palette" data-default-color="#effeff" />
            </div>

            <!-- Image upload -->
            <div class="qc_wooswatches_img_upload_wrap">
               <!-- upload image buttton -->
               <button class="upload_img upload-button button-add-media button">Select image</button>
               <!-- uploaded image -->
               <img class="img_preview" src="" width="80px" />
               <!-- remove image button -->
               <button class="remove_img button" type="button">Remove image</button>
            </div>
         </td>
      </tr>

   </tbody>
</table>