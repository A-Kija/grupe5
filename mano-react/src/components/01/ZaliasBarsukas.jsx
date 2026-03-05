export default function ZaliasBarsukas() {

    const a = 2 + 3;

    const kas = 'ba';

    let darzove;

    if (kas == 'b') {
        darzove = 'baklažanai';
    } else {
        darzove = 'kita';
    }



    return (

        <>
            <h2 className="go-green">Aš esu žalias Barsukas</h2>
            <span>Agurkai: {2 + 3}</span>
            <br />
            <span>Agurkai: {a}</span>
            <br />
            <span>{darzove}</span>
            <br />
            <span>{kas == 'b' ? 'baklažanai' : <h3>kita {5 + 11}</h3>}</span>
        </>

    );

}