<?php
/** */
class Qc_Woosw_Admin_Fields {
    /**
     * 
     * @param $field - Field type
     * @param $id - Field id
     */
    protected function createField( $field, $id, $value, $classes = "", $label = "", $options = array(), $description = "" ) {
        
        if ( $field === 'select' ) {

            woocommerce_wp_select(
                array(
                    'id' => $id,
                    'value' => $value,
                    'class' => $classes,
                    'options' => $options
                )
            );
        }

        if ( $field === 'hidden' ) {

            woocommerce_wp_hidden_input(
                array(
                    'id' => $id,
                    'value' => $value,
                    'class' => $classes,
                )
            );
        }

        if ( $field === 'text' ) {

            woocommerce_wp_text_input(
                array(
                    'id' => $id,
                    'value' => $value,
                    'class' => $classes,
                    'label' => $label,
                )
            );
        }

        if ( $field === 'checkbox' ) { 
            if ( !empty( $label ) ) {
            ?>
                <label for="<?php echo $id; ?>" class="qc-woosw-label"><?php echo $label; ?></label> 
            <?php 
            } 
            ?>   
       
            <input
                type="checkbox"
                id="<?php echo $id; ?>"
                value="<?php echo $value; ?>"
                name="<?php echo $id; ?>"
                <?php checked($value, '1'); ?>
            >
        <?php   
            if ( !empty( $description ) ) { ?>
                <p class="description"><?php echo $description; ?></p>
            <?php
            }
        }
    }


    protected function termMetaValue( $term, $id, $defaultValue) {
       
        $term_meta = get_term_meta($term, $id, true);
        $term_meta_value = $term_meta ? $term_meta : $defaultValue;
       
        return $term_meta_value;
    }

}
?>