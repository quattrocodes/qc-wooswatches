import { QcWooswUtility } from "./class-qc-woosw-utility";

export class QcWooswImages {

  /**
   * Run Image swatch functions
  */
  runSwatch() {
    const uploadBtns = document.querySelectorAll(".qc-woosw-upload-img-btn");
    const removebtn = document.querySelector(".qc-woosw-remove-img-btn");
    const previewImg = document.querySelector(".qc-woosw-img-preview");
    const imgValue = document.querySelector('#qc-woosw-img-value');

    if ( imgValue.value !== ''  ) {
      this.#swatchState('remove');

    }
    this.#selectAction(uploadBtns, previewImg, imgValue );
    this.#removeAction(removebtn, previewImg, imgValue);
  }

  /**
   * Select image swatch.
   * 
   * @param { * } uploadElem Button HTML element 
   * @param { * } img Image HTML element
   */
  #selectAction(elems, imgElem, imgValue) {
    for (const btn of elems) {
      this.#selectWpMedia(btn, imgElem, imgValue);
    }   
  }

  /**
   * Remove image swatch.
   * 
   * @param {*} removeElem 
   * @param {*} imgElem 
   */
  #removeAction(elem, imgElem, imgValue) {
    elem.addEventListener("click", (ev) => {
      ev.preventDefault();  
      imgElem.src = "";
      imgValue.value = '';
      this.#swatchState('upload', elem);
    });
  }


  #selectWpMedia(elem, imgElem, imgValue) {

    elem.addEventListener('click', (e) => {
      e.preventDefault();

      let frame;

      if (frame) {
        frame.open();
        return;
      }

      frame = wp.media({
        frame: "select",
        library: {
          type: "image",
        },
        button: {
          text: "Insert image",
        },
      });

      frame.on("select", () => {
        const attachment = frame.state().get("selection").first().toJSON();
        imgElem.src = attachment.url;
        imgValue.value = attachment.id;
      });

      frame.open();

      this.#swatchState('remove', elem);
    })
  }

  #swatchState(state, elem) {   
    const elemList = document.querySelectorAll('.qc-woosw-img-swatch-wrap .qc-woosw-wrap'); 
    const qcUtils = new QcWooswUtility;

    switch (state) {
      case 'upload':
        qcUtils.toggleClasses(elemList, 'upload');
        break;
      case 'remove':
        qcUtils.toggleClasses(elemList, 'remove');
    }
  }
}
