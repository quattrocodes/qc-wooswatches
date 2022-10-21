import { QcWooswUtility } from "./class-qc-woosw-utility";

export class QcWooswSelect {
    constructor() {}

    /**
     * Method to select swatch type for a variation at the admin area.
     * 
     */
    runSwatch() {
        const selectWrap = document.querySelector('#qc-woosw-select-type');
        const selectValue = document.querySelector('#qc-woosw-select-value');
        const defaultState = selectWrap.value;

        this.#swatchState(defaultState);
        
        selectWrap.addEventListener('change', (ev) => {
            const selectedOption = ev.target.options[ev.target.options.selectedIndex].value
            this.#swatchState(selectedOption);
            selectValue.value = selectedOption;
        })
    }

    /**
     * Active swatch in a variation at admin area.
     * 
     * @param { String } state activated swatch type
     */
    #swatchState(state) { 
        const elemList = document.querySelectorAll('.swatch-wrap');
        const qcUtils = new QcWooswUtility;
        switch (state) {
            case 'img':
                qcUtils.toggleClasses(elemList, 'qc-woosw-img-swatch-wrap');
                break;
            case 'color':
                qcUtils.toggleClasses(elemList, 'qc-woosw-color-swatch-wrap');
                break;
            case 'button':
                qcUtils.toggleClasses(elemList, 'qc-woosw-button-swatch-wrap');
        }
    }

}