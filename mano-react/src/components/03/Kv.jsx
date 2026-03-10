import { useEffect } from 'react';

export default function Kv({number, color}) {

    useEffect(_ => {
        console.log('%cNAUJAS ' + number, 'color: ' + color + '; font-weight: bold;');
        return _ => console.log('%cNEBĖRA ' + number, 'color: ' + color + '; font-weight: bold;')
    }, []);

    return (
        <div className="kvadratas" style={{
            backgroundColor: color + '77',
            borderColor: color
        }}>{number}</div>
    );

}