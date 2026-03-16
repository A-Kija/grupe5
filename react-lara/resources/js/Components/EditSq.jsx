import { useEffect, useState } from 'react';

export default function EditSq({editSq, setEditSq, setUpdateSq}) {

    const [number, setNumber] = useState(editSq.number);
    const [color, setColor] = useState(editSq.color);

    useEffect(_ => {
        setNumber(editSq.number);
        setColor(editSq.color);

    }, [editSq]);

    const update = _ => {
        setUpdateSq(
            {
                number,
                color,
                id: editSq.id
            }
        );
    }


    return (
        <div className="edit">
            <h2>Edit <span onClick={_ => setEditSq(null)}>X</span></h2>
            <input type="color" value={color} onChange={e => setColor(e.target.value)}></input>
            <input type="text" value={number} onChange={e => setNumber(e.target.value)}></input>
            <div className="buttons">
                <button className="green" onClick={update}>Update SQ</button>
            </div>
        </div>
    );
}