import { v4 as manoUuid } from 'uuid'; // paimu ne default metodą v4 ir pavadinu jį manoUuid
import axios from 'axios';


// console.log('Labas, ką tu?', 'Labas, aš gerai!', 5 * 5);

const naujasId = manoUuid();
console.log('Sugeneruotas UUID:', naujasId);

// fetch('https://jsonplaceholder.typicode.com/todos/1')
//       .then(response => response.json())
//       .then(json => console.log(json))

axios.get('https://jsonplaceholder.typicode.com/todos/1')
    .then(res => console.log(res.data))