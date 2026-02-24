@extends('tevas')

@section('turinys')
<h1 id="myButton">Žydi kieme bijūnai</h1>
@if ($skaicius > 5)
    <h2>Šiame kieme yra daug bijūnų!</h2>
@else
    <h2>Šiame kieme yra keletas bijūnų.</h2>
@endif
<p>Bijūnai yra vieni iš gražiausių ir populiariausių gėlių, kurios žydi kieme. Jie turi didelius, spalvingus žiedus, kurie gali būti įvairių spalvų, įskaitant rožinę, raudoną, baltą ir violetinę. Bijūnai yra ne tik gražūs, bet ir kvapnūs, todėl jie dažnai naudojami kaip dekoratyvinės gėlės soduose ir gėlių kompozicijose.</p>
<p>Bijūnai žydi pavasarį ir vasarą, priklausomai nuo veislės. Jie gali būti vienmečiai arba daugiamečiai, o jų žiedai gali būti viengubos arba dvigubos formos. Bijūnai yra lengvai auginami ir reikalauja nedaug priežiūros, todėl jie yra puikus pasirinkimas tiek pradedantiesiems, tiek patyrusiems sodininkams.</p>
@include('bijunas.gele')
<p>Be to, bijūnai turi simbolinę reikšmę daugelyje kultūrų. Jie dažnai siejami su meilės, grožio ir laimės simboliais. Bijūnai taip pat yra populiarūs vestuvių gėlės, nes jie simbolizuoja santuokos laimę ir klestėjimą.</p>
<p>Jei norite turėti žydinčius bijūnus savo kieme, svarbu pasirinkti tinkamą veislę ir tinkamai juos prižiūrėti. Bijūnai mėgsta saulėtą vietą ir gerai drenuotą dirvą. Jie taip pat reikalauja reguliaraus laistymo, ypač karštomis vasaros dienomis. Be to, svarbu pašalinti nuvytusius žiedus, kad skatintumėte naujų žiedų augimą.</p>

<ul>
@foreach($geles as $gele)
    <li>{{ $gele }}</li>
@endforeach
</ul>

@endsection

@section('pavadinimas') Žydi kieme bijūnai @endsection