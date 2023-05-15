@extends('layouts.rh')

@section('content')
<section class="thankyou-info" id="dziekujemy">
    <div class="container text-center">
        <h1 class="headline2">Dziękujemy za uzupełnienie formularza zwrotu <br />w ramach akcji Satysfakcja <br />Gwarantowana marki Remington.</h1>
        <p class="info" style="color: #ff0000;">Prosimy o przesłanie zwracanego produktu wraz paragonem fiskalnym lub fakturą pod adres: <br />Loyal Concept sp. z o. o. <br />Ul. Wolbromska 38 <br />03-680 Warszawa <br />Tel. 509 979 710 <br />Z dopiskiem: Satysfakcja gwarantowana z Remington</p>
        <p class="info">Potwierdzenie zostało wysłane na wskazany w formularzu adres mailowy. <br />Twój numer zgłoszenia to:</p>
        <h2 class="headline2">{{ $id }}</h2>
        <p class="info">Zgłoszenie zostanie zweryfikowane pod względem zgodności z Regulaminem. <br />Pamiętaj, że wiadomość może znajdować się w SPAMIE.</p>
    </div>
</section>
@endsection
