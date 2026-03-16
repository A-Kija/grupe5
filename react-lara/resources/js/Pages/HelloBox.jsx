import { useEffect, useState } from 'react';
import '../../css/box.css';
import axios from 'axios';
import Sq from '@/Components/Sq';
import rand from '@/Functions/rand';
import randColor from '@/Functions/randColor';
import EditSq from '@/Components/EditSq';

export default function HelloBox({ number, boxesUrl, saveBoxesUrl, updateBoxesUrl }) {


    const [sq, setSq] = useState(null);
    const [editSq, setEditSq] = useState(null); // seni duomenys
    const [updateSq, setUpdateSq] = useState(null); // nauji duomenys

    useEffect(_ => {
        // console.log('Kreipiuosi į serverį adresu: ' + boxesUrl);
        axios.get(boxesUrl)
            .then(res => {
                const boxesFromServer = res.data.boxes;
                setSq(boxesFromServer);
            })
            .catch(e => console.log(e))
    }, []);

    useEffect(_ => {
        if (updateSq === null) {
            return;
        }
        axios.put(updateBoxesUrl + '/' + updateSq.id, updateSq)
        .then(res => {
            console.log(res.data)
        })
        .catch(e => console.log(e))

    }, [updateSq]);

    const addSq = _ => {
        const number = rand(1000, 9999);
        const color = randColor();
        const id = rand(100000000, 999999999);

        setSq(s => [...s, { number, color, id }]);

    }

    const saveSq = _ => {
        axios.post(saveBoxesUrl, {sq})
        .then(res => {
            console.log(res.data)
        })
        .catch(e => console.log(e))
    }

    const remove = id => {
        setSq(oldBoxes => oldBoxes.filter(box => box.id !== id)); // iš masyvo išmetam elementą pagal
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
                        sq.map(s => <Sq key={s.id} sq={s} remove={remove} setEditSq={setEditSq}></Sq>)
                }
            </div>
            <div className="buttons">
                <button className="green" onClick={addSq}>ADD SQ</button>
                <button className="orange" onClick={saveSq}>Save SQ</button>
            </div>
            {
              editSq === null ? null : <EditSq editSq={editSq} setEditSq={setEditSq} setUpdateSq={setUpdateSq}/>
            }
        </div>
    );
}