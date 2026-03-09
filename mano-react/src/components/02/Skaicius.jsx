import { useState } from 'react'; // hooko importas iš recto

export default function Skaicius() {

    // hooko funkcija
    // ji gražina masyvą su 2 dalykais
    // 1 steitas
    // 2 funkcija tam steitui valdyti
    // const [sk, setSk] ===> 
    // const sk; 
    // const setSk;
    // useState(pradinė_reikšmė)
    
    const [sk, setSk] = useState(Math.random());

    // kitaip:
    // const steitas = useState(); gaunam masyvą
    // const sk = steitas[0];
    // const setSk = steitas[1];
    
    
    const goRandom = _ => {
        console.log('Go!');
        const naujasRand = Math.random();
        setSk(naujasRand); // keičia sk reikšmę
    }
  


    return (
        <>
        <div className="buttons">
            <button type="button" onClick={goRandom} className="orange">RAND</button>
        </div>
        <h2>{sk}</h2>
        </>
    );


}