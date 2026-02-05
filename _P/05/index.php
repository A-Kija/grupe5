<?php


$masyvas = range('A', 'K');

echo '<pre>';

print_r($masyvas);

// Surasti "G".

/*

KAIP ir KAS


KAIP surasti G masyve?

KAS žymi vietą masyve? ----> Indeksas

KAIP surasti masyvo indeksą?

KAS yra ieškojimas masyve? ----> ėjimas per visus elementus kol surandi ko ieškai

KAIP eiti per masyvą ----> daryti foreach ciklą

KAIP surasti G raidę 

KAS patvirtina suradimą? ----> palyginimas su if

KAIP lygint masyvo reikšme su duota reikšme? ---> naudojant foreach duodamą kintamą su reikšme


*/


foreach ($masyvas as $indeksas => $raide) {
    if ($raide == 'G') {
        echo 'Suradau ' .$indeksas;
    }
}

/*
Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi skairtingas
formas- vieną GET ir kitą POST. Nenaudodami jokių konkrečių $_GET ar $_POST reikšmių,
nuspalvinkite foną žaliai, kai paspaustas mygtukas iš GET formos
ir geltonai- kai iš POST


Kaip padaryti puslapį su 2 mygtukais?

Kaip įdėti mygtukus į formas?
Kas yra forma? <form>
Kas yra GET forma
Kas yra POST forma

kas yra $_GET reikšmė
kas yra $_GET? ---> masyvas kuriame laikoma per query metodą perduodami duomenys

kaip duomenys perduodami ---> dedant input laukelis į formą?


Kas yra POST forma ---> su post metodu
kas yra POST metodas ---> būdas perduoti informaciją į serverį

kaip serveris sužino koks būdas naudojamas

kas rodo serveryje perdavimo būdą? $_SERVER



*/