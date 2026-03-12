import '../../css/box.css';

export default function HelloBox({number}) {

    return (
        <div className="layout">
            <h1>Hello Box {number}</h1>
        </div>
    );
}