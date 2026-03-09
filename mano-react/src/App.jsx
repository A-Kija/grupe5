import './App.css';
import DaugA from './components/02/DaugA';
import Mas from './components/02/Mas';
import Plus1 from './components/02/Plus1';
import Skaicius from './components/02/Skaicius';

function App() {

  return (
    <div className="App">
      <h1>Mano React</h1>
      <Skaicius></Skaicius>
      <Plus1></Plus1>
      <DaugA></DaugA>
      <Mas></Mas>
    </div>
  );
}

export default App;