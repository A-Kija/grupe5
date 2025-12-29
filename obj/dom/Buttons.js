
class Buttons {

    constructor() {
        this.buttons = document.querySelectorAll('button');
        this.h1 = document.querySelector('h1');
        // Kviečiame metodą, kuris priskiria įvykio klausytoją pirmajam mygtukui.
        // addEventToButton1 pačių sugalvotas pavadinimas.
        this.addEventToButton1();
        this.addEventToButton2();
        // senovinis variantas su bind
        this.addEventToButton3();
    }

    addEventToButton1() {
        // Arrow function neturi savo "this"
        this.buttons[0].addEventListener('click', _ => {
            console.log(this);
            this.h1.textContent = 'Miau!';
        });
    }

    addEventToButton2() {
        // Regular function turi savo "this"
        this.buttons[1].addEventListener('click', function() {
            console.log(this);
            // Čia "this" nurodo į mygtuką, ant kurio paspausta.
            // Pats mygtukas yra "this" ir mes keičiame jo tekstą.
            this.textContent = 'Purr!';
        });
    }

    addEventToButton3() {
        // Regular function turi savo "this"
        this.buttons[2].addEventListener('click', function() {
            console.log(this);
            this.h1.textContent = 'Roar!';
            // Čia "this" nurodo į mygtuką, ant kurio paspausta.
            // Kadangi mums reikia "this" iš Buttons klasės, 
            // naudojame bind(this), kuris priskiria "this" reikšmę iš Buttons klasės.
        }.bind(this));
    }
}

new Buttons(); 
// Paleidžiame klasę Buttons. 
// Objekto niekam nepriskiriame, nes mums nereikia prie jo vėliau kreiptis.