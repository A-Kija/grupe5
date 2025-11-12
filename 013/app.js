console.log('Labas, Ifai');


//Loginis Boolean

const taip = true;
const ne = false;

console.log(taip, typeof taip);
console.log(ne, typeof ne);

let bebras = 'Bebras'; // true
const nieko = ''; // false

/*

Neigimas !
Arba ||
Ir &&


*/

console.log('!taip', !taip);
console.log('!ne', !ne);

console.log('!!taip', !!taip);
console.log('!!ne', !!ne);

{

    console.log('!!bebras', !!bebras);
    console.log('!!nieko', !!nieko);

}


if (bebras) {
    console.log('TAIP');
} else {
    console.log('NE');
}

if (nieko) {
    console.log('TAIP');
} else {
    console.log('NE');
}

if (5 > 13) {
    console.log('TAIP');
} else {
    console.log('NE');
}

/*

> daugiau
< maziau
>= daugiau arba lygu
<= maziau arba lygu
== lygu
=== grieztai lygu


*/

const sk1 = -124;
let sk2 = 0;
const sk3 = NaN;
const sk4 = Infinity;

console.log(!!sk1, !!sk2, !!sk3, !!sk4);


if (10 == '10') {
    console.log('TAIP');
} else {
    console.log('NE');
}

if (10 === '10') {
    console.log('TAIP');
} else {
    console.log('NE');
}


if ('a' > 'A') {
    console.log('TAIP');
} else {
    console.log('NE');
}