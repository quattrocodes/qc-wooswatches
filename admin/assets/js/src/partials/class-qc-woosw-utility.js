export class QcWooswUtility {
    
    /**
    * Initiating wpColorPicker palettes for the admin area.
    * jQuery is required for wpColorPicker.
    * 
    * @param {*} elem
    */
     activatePalette(elem) {    
        jQuery(elem).wpColorPicker();
    }

    /**
     * Toggle show and hide classes at admin area.
     * 
     * @param {*} nodeList 
     * @param {String} className 
     */
    toggleClasses(nodeList, className) {
        const elemList = nodeList;
        const elems = Array.from(elemList);
        
        const activeElem = elems.filter((el,i) => {
          return el.classList.contains(className);
        });
    
        const hiddenElem = elems.filter((el, i) => {
          return el !== activeElem[0];
        });
    
        activeElem[0].classList.add('show');
        activeElem[0].classList.remove('hide');
    
        hiddenElem.forEach((el) => {
          el.classList.remove('show');
          el.classList.add('hide');
        });
    }
}