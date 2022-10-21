import { QcWooswColors } from '../partials/class-qc-woosw-colors';
import { QcWooswImages } from '../partials/class-qc-woosw-images';
import { QcWooswSelect } from '../partials/class-qc-woosw-select';
import { QcWooswButtons } from '../partials/class-qc-woosw-buttons';
import { QcWooswAttribute } from '../partials/class-qc-woosw-attribute';

export class QcWooswAdmin {

    /**
     * Method to run Admin area functions
     * 
     */
    runAdmin() {

        const qcWooswAdminWrap = document.querySelectorAll('.qc-woosw-admin-field');

        if ( qcWooswAdminWrap && qcWooswAdminWrap[0].classList.contains('term') ) {
            const qcColorsSwatch  = new QcWooswColors;
            const qcImagesSwatch  = new QcWooswImages;
            const qcSelectSwatch  = new QcWooswSelect;
            const qcButtonsSwatch = new QcWooswButtons;

            qcSelectSwatch.runSwatch();
            qcColorsSwatch.runSwatch();
            qcImagesSwatch.runSwatch();
            qcButtonsSwatch.runSwatch();
        }

        if ( qcWooswAdminWrap && qcWooswAdminWrap[0].classList.contains('attribute') ) {
            const qcAttribute  = new QcWooswAttribute;
            qcAttribute.runPage();
        }
        
    }

    

}