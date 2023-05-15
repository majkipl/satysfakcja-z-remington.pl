<section class="form-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="headline1">wypełnij, aby otrzymać zwrot</h1>
            </div>
        </div>

        <form class="form row" id="form">
            @csrf

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="text" class="input" name="firstname" aria-label="Imię" required value=""/>
                <div class="placeholder">Imię</div>
                <div class="error error-firstname"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="text" class="input" name="lastname" aria-label="Nazwisko" required value=""/>
                <div class="placeholder">Nazwisko</div>
                <div class="error error-lastname"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="email" class="input" name="email" aria-label="Adres e-mail" required value=""/>
                <div class="placeholder">Adres e-mail</div>
                <div class="error error-email"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="tel" class="input" name="phone" aria-label="Numer telefonu" required value=""/>
                <div class="placeholder">Numer telefonu</div>
                <div class="error error-phone"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="address" class="input" name="address" aria-label="Adres" required value=""/>
                <div class="placeholder">Adres</div>
                <div class="error error-address"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="city" class="input" name="city" aria-label="Miasto" required value=""/>
                <div class="placeholder">Miasto</div>
                <div class="error error-city"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="code" class="input" name="code" aria-label="Kod pocztowy" required value=""/>
                <div class="placeholder">Kod pocztowy</div>
                <div class="error error-code"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <select class="input select empty" name="voivodeship" aria-label="Województwo" required>
                    <option selected></option>
                    @foreach($voivodeships as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="placeholder">Województwo</div>
                <div class="error error-voivodeship"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <input type="text" class="input" name="iban" aria-label="Numer konta" required value=""/>
                <div class="placeholder">Numer konta</div>
                <div class="error error-iban"></div>
            </div>

            <div class="col-12 col-lg-6 col-xl-5 offset-lg-1 offset-xl-2">
                <div class="file-thumb uploads-thumb uploads-thumb-receipt">
                    <img class="file-img" id="img_receipt_thumb" src="{{ asset('/images/svg/form/file.svg') }}"
                         alt="Zdjęcie dowodu zakupu"/>
                    <p class="file-text">Dodaj zdjęcie dowodu zakupu</p>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-xl-3">
                <div class="file-uploads field-uploads">
                    <div class="uploads uploads-receipt d-none">
                        <input type="file" name="img_receipt" id="img_receipt" required class="upload-file file"/>
                    </div>
                    <button class="button file-button button-uploads" type="button">Wybierz plik</button>
                </div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <div class="error error-img_receipt" id="img_receipt_error"></div>
            </div>

            <div class="col-12 col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <textarea class="textarea" name="reason" aria-label="Przyczyna zwrotu" required></textarea>
                <div class="placeholder">Przyczyna zwrotu</div>
                <div class="error error-reason"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <label class="label">
                    <input type="checkbox" class="checkbox" name="legal_1" required/>
                    <span class="checkbox-text">Zapoznałe(a)m się z regulaminem, dostępnym na stronie satysfakcja-z-remington.pl i wyrażam zgodę na wszystkie jego postanowienia.</span>
                </label>
                <div class="error error-legal_1"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <label class="label">
                    <input type="checkbox" class="checkbox" name="legal_2" required/>
                    <span class="checkbox-text">Zapoznałe(a)m się z Polityką prywatności, dostępną na stronie satysfakcja-z-remington.pl (zawierająca informację o przetwarzaniu danych osobowych).</span>
                </label>
                <div class="error error-legal_2"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <label class="label">
                    <input type="checkbox" class="checkbox" name="legal_3"/>
                    <span class="checkbox-text">(opcjonalne) Wyrażam zgodę na przesyłanie informacji handlowych dotyczących produktów Spectrum Brands (oferowanych pod markami Remington, Russell Hobbs oraz George Foreman) za pomocą środków komunikacji elektronicznej (w tym na podany przeze mnie adres e-mail) przez Spectrum Brands Poland sp. z o.o. z siedzibą w Warszawie. Oświadczam, że zostałam/em poinformowana/y, że zgoda jest dobrowolna, oraz że mogę ją wycofać w każdym czasie.</span>
                </label>
                <div class="error error-legal_3"></div>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1">
                <label class="label">
                    <input type="checkbox" class="checkbox" name="legal_4"/>
                    <span class="checkbox-text">(opcjonalne) Wyrażam zgodę na używanie telekomunikacyjnych urządzeń końcowych i automatycznych systemów wywołujących dla celów marketingu bezpośredniego dotyczącego produktów Spectrum Brands (oferowanych pod markami Remington, Russell Hobbs oraz George Foreman) przez Spectrum Brands Poland sp. z o.o. z siedzibą w Warszawie, za pomocą środków komunikacji elektronicznej (e-mail). Oświadczam, że zostałam/em poinformowana/y, że zgoda jest dobrowolna, oraz że mogę ją wycofać w każdym czasie.</span>
                </label>
                <div class="error error-legal_4"></div>
            </div>

            <div class="col-12 text-center">
                <div class="button-box">
                    <button class="button submit">Wyślij</button>
                </div>
            </div>

            <div class="col-12 text-center">
                <div class="error error-main"></div>
            </div>
        </form>

    </div>
</section>
