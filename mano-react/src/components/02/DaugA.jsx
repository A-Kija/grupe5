import { useState } from 'react';

export default function DaugA() {
    
    
    // const [a, setA] = useState('Nieko nėra');
    const [a, setA] = useState('');

    const addA = _ => {
        // setA((a + 'A').replace('Nieko nėra', ''));
        // setA(a + 'A'); // po jos a NEPAKINTA iš karto. Tai nutinka VĖLIAU
        // setA(a + 'A');
        // setA(a + 'A');
        // 3 X A = A

        // Visada kai norim modifikuoti
        setA(prevA => prevA + 'A');
        setA(ankstesneA => ankstesneA + 'A');
        setA(prev => prev + 'A');
        // 3 X A = AAA

    }

    const remA = _ => {
        setA(prevA => prevA.slice(0, -1)); // nukerpam stringo galą
    }

    const noA = _ => {
        // setA('Nieko nėra');
        setA('');
    }
    
    
    
    return (
        <>
            <div className="buttons">
                <button type="button" onClick={addA} className="yellow">+A</button>
                <button type="button" onClick={noA} className="red">NO A</button>
                <button type="button" onClick={remA} className="red">-A</button>
            </div>
            <h2>{a}</h2>
        </>
    );
}