export class QcWooswAttribute {

    runPage() {

        const qcAdminField = document.querySelector('.qc-woosw-admin-field');
        this.#setAttrOption();

        if ( qcAdminField && qcAdminField.classList.contains('edit-page')) {
            this.#editPage( qcAdminField );
        }
        
    }

    #editPage( nodeWrapper ) {
   
        const label = nodeWrapper.querySelector('.qc-woosw-label');
        const th = document.createElement('th');
        th.appendChild(label);
        th.scope = 'row'
        nodeWrapper.prepend(th);
    }

    #setAttrOption() {
  
        const attribute_checkbox = document.querySelector('#qc-woosw-attribute-select-option');
  
        attribute_checkbox.addEventListener('change', (e) => {
            e.target.checked  ? e.target.value = '1' : e.target.value = '';
      
        })
    }
}