import 'bootstrap';
import Sortable from 'sortablejs';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

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

window.addEventListener('DOMContentLoaded', () => {
    const sortableImages = document.querySelectorAll('[data-sortable-images]');

    sortableImages.forEach((imageList) => {
        Sortable.create(imageList, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function (_) { // pasileidžia, kai baigiamas drag-and-drop
                const url = imageList.dataset.url; // gauti URL iš data-url atributo
                const imageItems = imageList.querySelectorAll('.truck-image-item');
                const imagesOrder = Array.from(imageItems).map(item => +item.dataset.imageId); // sukurti masyvą su nuotraukų ID tvarka

                // Siųsti naują nuotraukų tvarką į serverį per AJAX
                axios.post(url, {
                    images_order: imagesOrder
                })
                    .then(response => {
                        console.log('Nuotraukų tvarka sėkmingai atnaujinta!');
                    })
                    .catch(error => {
                        console.error('Klaida atnaujinant nuotraukų tvarką:', error);
                    });
            }
        });
    });
});

const swiper = new Swiper('.swiper', {
    modules: [Navigation, Pagination],
    // Optional parameters
     slidesPerView: 2,
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});



window.addEventListener('DOMContentLoaded', () => {

    const autoTagInput = document.querySelector('[data-auto-tag]');
    const suggestionsList = document.querySelector('[data-tag-suggestions-list]');

    if (autoTagInput) {
        autoTagInput.addEventListener('input', () => {
            const query = autoTagInput.value;

            if (query.length === 0) {
                suggestionsList.innerHTML = '';
                suggestionsList.style.display = 'none'; // paslėpti pasiūlymų sąrašą, jei įvestis tuščia
                return;
            }

            const url = suggestionsList.dataset.url;

            axios.get(url, {
                params: { query }
            })
                .then(response => {
                    const suggestions = response.data;
                    suggestionsList.innerHTML = '';
                    suggestionsList.style.display = 'block'; // parodyti pasiūlymų sąrašą
                    suggestions.forEach(suggestion => {
                        const li = document.createElement('li');
                        li.textContent = suggestion.name;
                        // list all trucks that have this tag
                        if (suggestion.trucks && suggestion.trucks.length > 0) {
                            const trucksText = suggestion.trucks.map(truck => truck.color).join(', ');
                            li.textContent += ` (${trucksText})`;
                        }


                        li.addEventListener('click', () => {
                            autoTagInput.value = suggestion.name;
                            suggestionsList.innerHTML = '';
                            suggestionsList.style.display = 'none'; // paslėpti pasiūlymų sąrašą po pasirinkimo
                        });
                        suggestionsList.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Klaida gaunant tagų pasiūlymus:', error);
                });
        });
    }


});