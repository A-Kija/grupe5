import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.addEventListener('DOMContentLoaded', () => {
   
    const logoInput = document.querySelector('input[name="logo_image"]');
    const removeLogoLabel = document.querySelector('input[name="remove_logo"]')?.closest('label'); // rasti "Pašalinti logotipą" checkbox labelį

    console.log('logoInput:', logoInput);
    console.log('removeLogoLabel:', removeLogoLabel);

    if (logoInput && removeLogoLabel) {
        logoInput.addEventListener('input', () => {
            if (logoInput.files.length > 0) {
                removeLogoLabel.style.display = 'none'; // paslėpti "Pašalinti logotipą" checkbox, jei pasirenkamas naujas failas
            } else {
                removeLogoLabel.style.display = 'inline-flex'; // parodyti checkbox, jei nėra pasirinkto failo
            }
        });
    }

    /*

        <div class="image-upload-section">
        <label>Nuotraukos:</label>
        <div data-gallery class="images-inputs">
            <div data-master class="image-input">
                <input type="file" name="images[]">
                <button type="button" class="remove-image-button" data-remove>-</button>
            </div>
        </div>
        <button type="button" class="add-image-button" data-add-image>Pridėti nuotrauką</button>
    </div>

    */

    const gallery = document.querySelector('[data-gallery]');
    if (!gallery) return; // jei nėra galerijos, išeiti iš funkcijos
    const masterImageInput = gallery.querySelector('[data-master]');
    const addImageButton = document.querySelector('[data-add-image]');

    addImageButton.addEventListener('click', () => {
        const newImageInput = masterImageInput.cloneNode(true);
        // remove data-master attribute from the cloned element to avoid confusion
        newImageInput.removeAttribute('data-master');
        // add data-input attribute to the cloned element for easier targeting when removing
        newImageInput.dataset.input = 'true';
        newImageInput.querySelector('input').value = ''; // išvalyti failo įvestį
        gallery.appendChild(newImageInput);
    });

    gallery.addEventListener('click', (event) => {
        if (event.target.matches('[data-remove]')) {
            const imageInput = event.target.closest('[data-input]'); // nelabai gražu, bet veikia - rasti artimiausią tėvinį elementą su data-master atributu
            if (imageInput) {
                imageInput.remove();
            }
        }
    });

});