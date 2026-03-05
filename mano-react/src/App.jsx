import './App.css';
import Bebras from './components/01/Bebras';
import Zb from './components/01/ZaliasBarsukas';

function App() {

  return (
    <div className="App">
      <h1>Mano <br/> React</h1>
      <Bebras koks='geras' dydis='80px'></Bebras>
      <Bebras koks='piktas' dydis='40px'></Bebras>
      <Zb></Zb>
    </div>
  );
}

export default App;