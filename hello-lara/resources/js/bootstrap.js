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

});