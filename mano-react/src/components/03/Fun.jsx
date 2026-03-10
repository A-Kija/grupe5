export default function Fun() {


    const green = _ => {
        console.log('%cGREEN', 'color: green; font-weight: bold;');
    }

    const blueRed = color => {
        if (color === 'blue') {
            console.log('%cBLUE', 'color: skyblue; font-weight: bold;');
        }
        if (color === 'red') {
            console.log('%cRED', 'color: crimson; font-weight: bold;');
        }
    }

    const yellow = (size, event) => {
        console.log('%c' + event.target.innerText, 'color: yellow; font-weight: bold; font-size:' + size + ';');
    }



    return (
        <div className="buttons">
            <button className="green" onClick={green}>GREEN</button>
            <button className="blue" onClick={_ => blueRed('blue')}>Blue</button>
            <button className="red" onClick={_ => blueRed('red')}>Red</button>
            <button className="yellow" onClick={e => yellow('10px', e)}>Small sweet yellow</button>
            <button className="yellow" onClick={e => yellow('20px', e)}>Big fat yellow</button>
            <button className="orange" onClick={_ => console.log('%cORANGE', 'color: orange; font-weight: bold;')}>ORANGE</button>

        </div>
    );

}