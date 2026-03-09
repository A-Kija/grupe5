import { useState } from 'react';

export default function Plus1() {
    
    
    const [sk, setSk] = useState(0);

    const plusOne = _ => {
        setSk(sk + 1);
    }
    
    
    
    return (
        <>
            <div className="buttons">
                <button type="button" onClick={plusOne} className="green">+1</button>
            </div>
            <h2>{sk}</h2>
        </>
    );
}

// sukurti komponentą DaugA
// Pradžioje nieko nėra
// Paspaudus mygtuka atsiranda "A"
// Dar kartą- atsiranda "AA"
// Dar kartą- "AAA"

// pridėti mygtuką kuris ištrina visas "A" raides
