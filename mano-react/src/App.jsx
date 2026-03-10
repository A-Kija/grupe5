import { useState } from 'react';
import './App.css';
import Fun from './components/03/Fun';
import Select from './components/03/Select';
import Text from './components/03/Text';
import Texts from './components/03/Texts';
import rand from './functions/rand';
import randColor from './functions/randColor';
import Kv from './components/03/Kv';


function App() {

  const [sqs, setSqs] = useState([]);

  const addSq = _ => {
    const number = rand(1000, 9999);
    const color = randColor();

    setSqs(s => [...s, {number, color}]);

  }


  return (
    <div className="App">

      <div className="kvadrato-konteineris">
          {
            sqs.map(s => <Kv key={s.number + s.color} number={s.number} color={s.color}></Kv>)
          }
      </div>
      <button className="green" onClick={addSq}>ADD SQ</button>
      <h1>Mano React</h1>
          <Fun></Fun>
          <Text></Text>
          <Texts></Texts>
          <Select></Select>
    </div>
  );
}

export default App;