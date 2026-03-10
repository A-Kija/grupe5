import { useEffect, useState } from 'react';

export default function Text() {
    

    useEffect(_ => {
        console.log('TEXT START');
    }, []); // pasileis pirmą kartą atidarius komponentą


    

    const [text, setText] = useState('Aš galvoju kad,');

    const [h2, setH2] = useState(''); // jis turi būti surištas su text steitu


    // useEffect(_ => {
    //     setH2(h2 + '*');
    // }, [h2]); useEffect amžinas ciklas


    useEffect(_ => {
        setH2(text); // pririšta prie text steito
    }, [text]); // pasileis pirmą kartą atidarius komponentą + visus kartus kai pasikeičia text

    const handleText = event => {
        const inputText = event.target.value;
        setText(inputText);

        // setH2(inputText); // ne prie steito, bet prie teksto įvedimo
    }


    return (
        <div>
            <h2>{h2}</h2>
            <input type="text" value={text} onChange={handleText} />
        </div>
    );

}