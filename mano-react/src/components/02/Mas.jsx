import { useState } from "react";

export default function Mas() {

    const kv = <div className="kvadratas melynas"></div> // elementas

    const mas = [
        <div key="apelsinas" className="kvadratas apelsinas"></div>,
        <div key="citrinas" className="kvadratas citrinas"></div>,
        <div key="apelsinas2" className="kvadratas apelsinas"></div>,
        <div key="melionas" className="kvadratas melionas"></div>
    ];

    const [duomenuMas, setDuomenuMas] = useState([
        'apelsinas',
        'citrinas',
        'apelsinas',
        'melionas'
    ]);

    // const duomenuMas = [
    //     'apelsinas',
    //     'citrinas',
    //     'apelsinas',
    //     'melionas'
    // ];

    const sumapintasMas = duomenuMas.map((vaisius, indeksas) => {
        return <div key={indeksas} className={'kvadratas ' + vaisius}></div>
    });

    const addMelionas = _ => {
        setDuomenuMas(senasMas => [...senasMas, 'melionas']);
    }


    return (
        <>
            <div>
                {kv}
            </div>
            <div className="kvadrato-konteineris">
                {mas}
            </div>
            <div className="kvadrato-konteineris">
                {sumapintasMas}
            </div>
            <div className="kvadrato-konteineris">
                {
                    duomenuMas.map((vaisius, indeksas) => {
                        return <div key={indeksas} className={'kvadratas ' + vaisius}></div>
                    })
                }
            </div>
            <div className="buttons">
                <button type="button" onClick={addMelionas} className="green">+ melionas</button>
            </div>
        </>
    );

}