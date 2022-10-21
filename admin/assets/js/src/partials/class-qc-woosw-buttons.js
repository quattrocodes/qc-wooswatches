import { QcWooswUtility } from "./class-qc-woosw-utility";

export class QcWooswButtons {

    runSwatch() {
        const btnSwatchPalettesWrap = document.querySelector('.qc-woosw-button-swatch-wrap');
        const btnSwatchPalettesList = btnSwatchPalettesWrap.querySelectorAll('.qc-woosw-color-palette');
        
        const btnSwatchPalettes = Array.from(btnSwatchPalettesList);
        
        const qcUtils = new QcWooswUtility;

        btnSwatchPalettes.forEach(element => {
            qcUtils.activatePalette(element);
        });
    }
}