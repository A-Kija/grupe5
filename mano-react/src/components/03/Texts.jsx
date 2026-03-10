import { useState } from 'react';

export default function Texts() {

    const [text, setText] = useState({ a: '', b: '', c: '' });

    const handleText = event => {
        const inputText = event.target.value;
        const inputName = event.target.name;

        setText(oldText => ({ ...oldText, [inputName]: inputText }));
    }


    return (
        <div className="inputs">
            <label>A</label>
            <input type="text" value={text.a} name="a" onChange={handleText} />
            <label>B</label>
            <input type="text" value={text.b} name="b" onChange={handleText} />
            <label>C</label>
            <input type="text" value={text.c} name="c" onChange={handleText} />
        </div>
    );

}