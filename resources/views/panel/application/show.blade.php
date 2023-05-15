@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Zgłoszenie</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Zgłoszenie</div>
                        <div class="panel-body">
                            <table class="item show data">
                                <tbody>
                                <tr>
                                    <td>Imię: </td>
                                    <td>{{ $application->firstname }}</td>
                                </tr>
                                <tr>
                                    <td>Nazwisko: </td>
                                    <td>{{ $application->lastname }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail: </td>
                                    <td>{{ $application->email }}</td>
                                </tr>
                                <tr>
                                    <td>Telefon: </td>
                                    <td>{{ $application->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Adres: </td>
                                    <td>{{ $application->address }}</td>
                                </tr>
                                <tr>
                                    <td>Miasto: </td>
                                    <td>{{ $application->city }}</td>
                                </tr>
                                <tr>
                                    <td>Kod pocztowy: </td>
                                    <td>{{ $application->code }}</td>
                                </tr>
                                <tr>
                                    <td>Województwo: </td>
                                    <td>{{ $application->voivodeship_id }}</td>
                                </tr>
                                <tr>
                                    <td>IBAN: </td>
                                    <td>{{ $application->iban }}</td>
                                </tr>
                                <tr>
                                    <td>Powód: </td>
                                    <td>{{ $application->reason }}</td>
                                </tr>
                                <tr>
                                    <td>Zdjęcie rachunku: </td>
                                    <td>
                                        <a href="{{ asset('/storage/' . $application->img_receipt) }}">
                                            <img src="{{ asset('/storage/' . $application->img_receipt) }}" alt="receiptimg" style="max-width: 50%; height: auto;" />
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Legal 1: </td>
                                    <td>@if($application->legal_1) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Legal 2: </td>
                                    <td>@if($application->legal_2) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Legal 3: </td>
                                    <td>@if($application->legal_3) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Legal 4: </td>
                                    <td>@if($application->legal_4) TAK @else NIE @endif</td>
                                </tr>
                                <tr>
                                    <td>Dodano: </td>
                                    <td>{{ $application->created_at }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.main-->
    </div>
@endsection
