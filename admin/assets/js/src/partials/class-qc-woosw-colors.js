import { QcWooswUtility } from "./class-qc-woosw-utility";
export class QcWooswColors {
    
    /**
     * Run color swatch for the admin area.
     * 
     */
    runSwatch() {
        const colorPalette = document.querySelector('#qc-woosw-color-value');
        const qcUtils = new QcWooswUtility;
        qcUtils.activatePalette(colorPalette);
   }
}