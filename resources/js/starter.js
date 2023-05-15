let event;
let height;

$(function () {
    console.log('STARTER');
});

$.fn.hasAttr = function (name) {
    return this.attr(name) !== undefined;
};

const starter = {
    _var: {},

    _const: {},

    init: function () {
        starter.click();
        starter.change();
        starter.input();
        starter.modal();
        starter.formStyled();
    },

    change: function () {
        $(document).on("change", ".select", function () {
            $(this).find('option[value=""]:checked').parent().addClass("empty");
            $(this)
                .find('option:not([value=""]):checked')
                .parent()
                .removeClass("empty");
        });

        $(document).on("change", ".checkbox", function (e) {
            e.target.checked === true ? $(this).addClass("valid").removeClass("invalid") : $(this).removeClass("valid");
        });

        $(document).on("change", ".upload-file", function () {
            const file = this.files[0];
            const fieldId = $(this).attr('id');

            $(`#${fieldId}_error`).text('');

            if (file) {
                if (file.size <= 4 * 1024 * 1024) {
                    const extension = file.name.split('.').pop().toLowerCase();
                    if (['jpg', 'jpeg', 'png'].indexOf(extension) !== -1) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $(`#${fieldId}_thumb`).attr('src', event.target.result);
                        }
                        reader.readAsDataURL(file);
                    } else {
                        // Wyświetlenie komunikatu o błędzie
                        $(`#${fieldId}_error`).text('Można wybrać tylko pliki graficzne JPG, JPEG lub PNG');
                        // Wyczyszczenie pola wyboru pliku
                        $(this).val('');
                    }
                } else {
                    // Wyświetlenie komunikatu o błędzie
                    $(`#${fieldId}_error`).text('Rozmiar pliku nie może przekraczać 4 MB');
                    // Wyczyszczenie pola wyboru pliku
                    $(this).val('');
                }
            }
        });

        $(document).on('change', '.input, .textarea, .checkbox', function () {
            console.log('onChange');
            const item = $(this);
            const value = $(this).val().trim();
            const name = $(this).attr('name');

            const valid = () => {
                switch (name) {
                    case 'firstname':
                        return starter.validator.isName(value, 'Imię');
                    case 'lastname':
                        return starter.validator.isName(value, 'Nazwisko');
                    case 'email':
                        return starter.validator.isEmail(value, 'Adres e-mail');
                    case 'phone':
                        return starter.validator.isPhone(value, 'Telefon');
                    case 'address':
                        return starter.validator.isAddress(value, 'Adres');
                    case 'city':
                        return starter.validator.isCity(value, 'Miasto');
                    case 'code':
                        return starter.validator.isCode(value, 'Kod pocztowy');
                    case 'voivodeship':
                        return starter.validator.isVoivodeship(value, 'Województwo')
                    case 'iban':
                        return starter.validator.isIban(value, 'Numer konta');
                    case 'reason':
                        return starter.validator.isReason(value, 'Przyczyna zwrotu');
                    case 'legal_1':
                        return starter.validator.isLegal(item);
                    case 'legal_2':
                        return starter.validator.isLegal(item);
                    case 'legal_3':
                        return starter.validator.isLegal(item);
                }
            }

            if (valid() !== true) {
                $(`.error-${name}`).text(valid());
            } else {
                $(`.error-${name}`).text('');
            }

        });
    },

    validator: {
        isName: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 3 || value.length > 128) {
                return `Pole ${name} musi mieć od 3 do 128 znaków.`;
            } else if (!/^[\p{L}\s-]+$/u.test(value)) {
                return `Pole ${name} może zawierać tylko litery.`;
            } else {
                return true;
            }
        },
        isEmail: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length > 255) {
                return `Pole ${name} może mieć maksymalnie 255 znaków.`;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                return 'Wprowadź poprawny adres email.';
            } else {
                return true;
            }
        },
        isPhone: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/.test(value)) {
                return 'Wprowadź poprawny numer telefonu.';
            } else {
                return true;
            }
        },
        isAddress: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length > 255) {
                return `Pole ${name} może mieć maksymalnie 255 znaków.`;
            } else {
                return true;
            }
        },
        isCity: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 2 || value.length > 64) {
                return `Pole ${name} musi mieć od 2 do 64 znaków.`;
            } else {
                return true;
            }
        },
        isCode: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^[0-9]{2}-[0-9]{3}$/.test(value)) {
                return 'Wprowadź poprawny kod pocztowy.';
            } else {
                return true;
            }
        },
        isVoivodeship: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 16) {
                return 'Wybierz województwo.';
            } else {
                return true;
            }
        },
        isIban: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^(PL(\s)?)?(\d{26})|(\d{2}(\s\d{4}){6})$/.test(value)) {
                return 'Wprowadź poprawny numer konta bankowego.';
            } else {
                return true;
            }
        },
        isReason: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 3 || value.length > 1024) {
                return `Pole ${name} musi mieć od 3 do 1024 znaków.`;
            } else {
                return true;
            }
        },
        isLegal: (item, name) => {
            if (item.val() === "") {
                return `Pole jest wymagane.`;
            } else if (!item.prop('checked')) {
                return `Pole jest wymagane.`;
            } else {
                return true;
            }
        },
        isFile: () => {
            // Nie trzeba walidować, walidacja odbywa się na etapie dodawania pliku
        }
    },

    input: function () {
        $(document).on("input", ".input", function (e) {
            e.target.value !== "" ? $(this).addClass("valid").removeClass("invalid") : $(this).removeClass("valid");
        });

        $(document).on("input", ".textarea", function (e) {
            e.target.value !== "" ? $(this).addClass("valid").removeClass("invalid") : $(this).removeClass("valid");
        });
    },

    click: function () {
        $(document).on("click", "button.submit", function () {
            const fields = starter.getFields($(this).closest('form'));

            axios({
                method: 'post',
                url: '/formularz/zapisz',
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fields,
            }).then(function (response) {
                window.location = response.data.results.url;
            }).catch(function (error) {
                $(`.error`).text('');
                if (error.response) {
                    console.log('error.response');
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    // console.log(error.response.data);
                    // console.log(error.response.status);
                    // console.log(error.response.headers);

                    Object.keys(error.response.data.errors).map((item) => {
                       $(`.error-${item}`).text(error.response.data.errors[item][0]);
                    });
                } else if (error.request) {
                    console.log('error.request');
                    // The request was made but no response was received
                    // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                    // http.ClientRequest in node.js
                    console.log(error.request);
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                }
            });

            return false;
        });

        $(document).on("click", "button.button-uploads", function () {
            $(`#${$(this).prev().find("input[type=file]").attr("id")}`).trigger("click");
        });

    },

    getFields: function ($form) {
        const inputs = $form.find('.input');
        const textareas = $form.find('.textarea');
        const checkboxes = $form.find('.checkbox');
        const files = $form.find('.file');

        const fields = {};

        $.each(inputs, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(textareas, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(checkboxes, function (index, item) {
            if ($(item).prop('checked')) {
                fields[$(item).attr('name')] = $(item).val();
            }
        });

        $.each(files, function (index, item) {
            if (item.files[0]) {
                fields[$(item).attr('name')] = item.files[0];
            }
        })

        fields['_token'] = $form.find('input[name=_token]').val();

        return fields;
    },

    modal: function () {
        document.getElementById('modal')?.addEventListener('shown.bs.modal', (e) => {
            const recipient = $(e.relatedTarget).data("product");

            let $modal = $('#modal');

            $modal.find(".modal-body .logos > div").remove();

            $.getJSON("/json/product.json", function (data) {
                $.each(data[recipient], function (index, value) {
                    $modal
                        .find(".modal-body .logos")
                        .append('<div class="col-12 col-sm-6 col-lg-4"><a href="' + value + '" title="Kup teraz" class="logo" target="_blank" rel="noopener noreferrer" data-fbpa="true"></a></div>');
                });
            });
        })
    },

    formStyled: function () {
        $(".select").find('option[value=""]:checked').parent().addClass("empty");

        $(".input")
            .find("~ .error:not(:empty)")
            .siblings(".input")
            .addClass("invalid");
        $('.input:not(.select):not([value=""])').addClass("valid");

        $(".textarea")
            .find("~ .error:not(:empty)")
            .siblings(".textarea")
            .addClass("invalid");
        $(".textarea:not(:empty)").addClass("valid");

        $(".checkbox")
            .parent()
            .find("~ .error:not(:empty)")
            .siblings(".label")
            .find(".checkbox")
            .addClass("invalid");
    }
};
$(window).on("load", function (e) {
    event = e || window.event;

    starter.init();
});

