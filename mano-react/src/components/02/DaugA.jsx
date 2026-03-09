import { useState } from 'react';

export default function DaugA() {
    
    
    const [a, setA] = useState('');

    const addA = _ => {
        setA(a + 'A');
    }
    
    
    
    return (
        <>
            <div className="buttons">
                <button type="button" onClick={addA} className="yellow">+A</button>
            </div>
            <h2>{a}</h2>
        </>
    );
}