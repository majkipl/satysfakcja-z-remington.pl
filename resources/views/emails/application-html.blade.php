<!DOCTYPE html><html>
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        {literal}
        u + .body .foo {
            line-height: 100% !important;
        }
        {/literal}
    </style>
</head>
<body style="background-color:#1D2024;">
<div style="margin: 0 auto; width: 650px; background-color:#1D2024;">
    <table style="float: left; " width="650" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td>
                <img src="{{ asset('/images/mail/img-7.jpg') }}" alt="Remington"  moz-do-not-send="true" />
            </td>
        </tr>
        </tbody>
    </table>

    <table style="float: left; background-color:#1D2024;" width="650" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff; text-align: center;">Informujemy, że otrzymaliśmy uzupełniony formularz zwrotu w ramach akcji <br />Satysfakcja Gwarantowana marki Remington.</td>
        </tr>

        <tr>
            <td style="height: 30px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ff0000; text-align: center;">Prosimy o przesłanie zwracanego produktu wraz paragonem fiskalnym lub fakturą pod adres: <br />Loyal Concept sp. z o. o. <br />Ul. Wolbromska 38 <br />03-680 Warszawa <br />Tel. 509 979 710 <br />Z dopiskiem: Satysfakcja gwarantowana z Remington</td>
        </tr>

        <tr>
            <td style="height: 30px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff; text-align: center;">Twoje zgłoszenie zostanie zweryfikowane pod względem zgodności z Regulaminem.</td>
        </tr>

        <tr>
            <td style="height: 30px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff; text-align: center;">Nr zgłoszenia to:</td>
        </tr>

        <tr>
            <td style="height: 30px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="font-size: 24px; font-family: Arial, Helvetica, sans-serif; color: #ffffff; text-align: center;">{{ $details['id'] }}</td>
        </tr>

        <tr>
            <td style="height: 30px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff; text-align: center;">W razie braków w formularzu skontaktujemy się z Tobą mailowo w celu ich uzupełnienia. <br />Pamiętaj, że wiadomość od nas może trafić do SPAMU.</td>
        </tr>

        <tr>
            <td style="height: 30px;">&nbsp;</td>
        </tr>
        </tbody>
    </table>

    <table style="float: left;" width="650" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td>
                <img src="{{ asset('/images/mail/img-2.jpg') }}" alt="Remington" moz-do-not-send="true" style="float: left;" />
            </td>
        </tr>
        </tbody>
    </table>

    <table style="float: left; background-color: #000000;" width="650" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td style="height: 30px;" colspan="6">&nbsp;</td>
        </tr>

        <tr>
            <td style="width: 30px;">&nbsp;</td>
            <td style="width: 378px; vertical-align: bottom;">
                <a href="https://pl.remington-europe.com/" title="remington-europe.com" style="font-size: 10px; font-family: Arial, Helvetica, sans-serif; color: #ffffff; text-align: left; font-weight: bold; text-decoration: none; text-transform: uppercase;">remington-europe.com</a>
            </td>
            <td style="width: 84px; text-align: left;">
                <a href="https://www.instagram.com/remingtonstyle/?hl=pl">
                    <img src="{{ asset('/images/mail/img-3.gif') }}" style="border: 0; margin: 0; padding: 0;" alt="" moz-do-not-send="true">
                </a>
            </td>
            <td style="width: 49px; text-align: center;">
                <a href="https://www.facebook.com/RemingtonPolska/">
                    <img src="{{ asset('/images/mail/img-4.gif') }}" style="border: 0; margin: 0; padding: 0;" alt="" moz-do-not-send="true">
                </a>
            </td>
            <td style="width: 79px; text-align: right;">
                <a href="https://www.youtube.com/user/remingtonpolska">
                    <img src="{{ asset('/images/mail/img-5.gif') }}" style="border: 0; margin: 0; padding: 0;" alt="" moz-do-not-send="true">
                </a>
            </td>
            <td style="width: 30px;">&nbsp;</td>
        </tr>

        <tr>
            <td style="height: 30px;" colspan="6">&nbsp;</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
