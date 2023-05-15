@extends('layouts.rh')

@section('content')
<section class="warranty">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="item-top">
                    <div class="image">
                        <img src="{{ asset('/images/warranty/warranty.jpg') }}" alt="Gwarancja i Serwis" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-xl-5 my--50">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-4 text-center">
                        <img src="{{ asset('/images/svg/warranty/ico-gwarancja.svg') }}" alt="Gwarancja" />
                    </div>
                    <div class="col-12 col-sm-9 col-md-8 align-self-center">
                        <h2 class="headline2">Gwarancja</h2>
                    </div>
                    <div class="col-12 desc">
                        <p>Ciesz się pełną gwarancją na nasze produkty! Dokładamy wszelkich starań, aby sprzęt, który produkujemy, spełniał Wasze oczekiwania i służył jak najlepiej i najdłużej. Pewni jakości naszych produktów, oferujemy Wam przedłużoną o rok gwarancję na zakupione urządzenia.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-5 offset-xl-1 my--50">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-4 text-center">
                        <img src="{{ asset('/images/svg/warranty/ico-wystarczy-ze.svg') }}" alt="Wystarczy że" />
                    </div>
                    <div class="col-12 col-sm-9 col-md-8 align-self-center">
                        <h2 class="headline2">wystarczy, że:</h2>
                    </div>
                    <div class="col-12 desc">
                        <p>1. W przeciągu 28 dni od momentu nabycia zarejestrujesz produkt poprzez formularz na naszej stronie internetowej:</p>
                        <a href="https://pl.remington-europe.com/rejestracja-produktu" title="zarejestruj produkt" class="button" target="_blank" rel="noopener noreferrer">zarejestruj produkt</a>
                        <p>2. Dzięki temu zyskujesz rok dodatkowej gwarancji gratis!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-xl-5 my--50">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-4 text-center">
                        <img src="{{ asset('/images/svg/warranty/ico-serwis.svg') }}" alt="Serwis" />
                    </div>
                    <div class="col-12 col-sm-9 col-md-8 align-self-center">
                        <h2 class="headline2">Serwis</h2>
                    </div>
                    <div class="col-12 desc">
                        <p>Coś poszło nie tak? Serwisuj swoje urządzenia Remington bez wychodzenia z domu. Niezwykle wygodna opcja, jaką jest realizacja naprawy urządzenia door to door, ułatwi i przyspieszy proces reklamacyjny. Na czym to polega? Kurier bezpłatnie odbierze wadliwy sprzęt, dostarczy go do jednego z autoryzowanych punktów serwisowych na terenie Polski, a po naprawie, przywiezie go wprost pod Twoje drzwi - również na koszt serwisanta.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-5 offset-xl-1 my--50">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-4 text-center">
                        <img src="{{ asset('/images/svg/warranty/ico-problem-z-glowy.svg') }}" alt="Problem z głową" />
                    </div>
                    <div class="col-12 col-sm-9 col-md-8 align-self-center">
                        <h2 class="headline2">Problem z głowy!</h2>
                    </div>
                    <div class="col-12 desc">
                        <p>1. Wystarczy wypełnić formularz</p>
                        <a href="https://ql.quadra-net.pl/command/www.spectrOrderForm" title="zarejestruj produkt" class="button" target="_blank" rel="noopener noreferrer">zarejestruj produkt</a>
                        <p>2. Kurier bezpłatnie odbierze wadliwy sprzęt. </p>
                        <p>3. Po naprawie, przywiezie go wprost pod Twoje drzwi.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
