export default function Sq({sq}) {

    return (
        <div className="kvadratas" style={{
            backgroundColor: sq.color + '77',
            borderColor: sq.color
        }}>{sq.number}</div>
    );

}