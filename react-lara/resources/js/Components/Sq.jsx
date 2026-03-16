export default function Sq({sq, remove}) {

    return (
        <div className="kvadratas" style={{
            backgroundColor: sq.color + '77',
            borderColor: sq.color
        }}>{sq.number}
        <span className="removeButton" onClick={_ => remove(sq.id)}>X</span>
        </div>
    );

}