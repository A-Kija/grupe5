export default function Bebras({koks, dydis}) {

    const helloStyle = {
        color: 'crimson',
        fontSize: '47px'
    }

    return (

        <>
            <h2 className="go-orange"
            style={{fontSize: dydis}}
            >Aš esu {koks} Bebras</h2>
            <div>
                <div>
                    <section>
                        <span style={helloStyle}>Hello</span>
                    </section>
                </div>
            </div>
            <span style={
                {
                    color: 'orange',
                    letterSpacing: '5px'
                }
            }>Apelsininis</span>
        </>

    );

}