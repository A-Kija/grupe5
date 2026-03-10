import { useState } from 'react';

export default function Select() {

    const [select, setSelect] = useState('');

    const options = [
        'Vilkas',
        'Meška',
        'Mamutas',
        'Drugelis',
        'Karvė',
        'Parazitas',
        'Partizanas'
    ];

    const handleSelect = event => {
        const inputSel = event.target.value;
        setSelect(inputSel);
    }

    return (
        <div>
            <select value={select} onChange={handleSelect}>
                <option value=''>Pasirink ką nors</option>
                {
                    options.map(o => <option key={o} value={o}>{o}</option>)
                }
            </select>
        </div>
    );

}