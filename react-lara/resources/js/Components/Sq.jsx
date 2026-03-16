export default function Sq({sq, remove, setEditSq}) {

    return (
        <div className="kvadratas" style={{
            backgroundColor: sq.color + '77',
            borderColor: sq.color
        }}>{sq.number}
        <span className="removeButton" onClick={_ => remove(sq.id)}>X</span>
        <span className="editButton" onClick={_ => setEditSq(sq)}>✎</span> 
        </div>
    );

}