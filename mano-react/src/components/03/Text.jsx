import { useState } from 'react';

export default function Text() {

    const [text, setText] = useState('');

    const handleText = event => {
        const inputText = event.target.value;
        setText(inputText);

        // console.log(text);
    }


    return (
        <div>
            <input type="text" value={text} onChange={handleText} />
        </div>
    );

}