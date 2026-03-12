import { useEffect, useState } from 'react';
import '../../css/box.css';
import axios from 'axios';
import Sq from '@/Components/Sq';
import rand from '@/Functions/rand';
import randColor from '@/Functions/randColor';

export default function HelloBox({ number, boxesUrl }) {


    const [sq, setSq] = useState(null);

    useEffect(_ => {
        // console.log('Kreipiuosi į serverį adresu: ' + boxesUrl);
        axios.get(boxesUrl)
            .then(res => {
                const boxesFromServer = res.data.boxes;
                setSq(boxesFromServer);
            })
            .catch(e => console.log(e))
    }, []);

    const addSq = _ => {
        const number = rand(1000, 9999);
        const color = randColor();
        const id = rand(100000000, 999999999);

        setSq(s => [...s, { number, color, id }]);

    }


    if (sq === null) {
        return (
            <div className="layout">
                <h2 className="loading"><span>LOADING...</span></h2>
            </div>
        );
    }


    return (
        <div className="layout">
            <h1>Hello Box {number}</h1>
            <div className="kvadrato-konteineris">
                {
                    sq.length === 0
                        ?
                        <h3>Kvadratukų nėra. Galite sukurti.</h3>
                        :
                        sq.map(s => <Sq key={s.id} sq={s}></Sq>)
                }
            </div>
            <div className="buttons">
                <button className="green" onClick={addSq}>ADD SQ</button>
            </div>
        </div>
    );
}