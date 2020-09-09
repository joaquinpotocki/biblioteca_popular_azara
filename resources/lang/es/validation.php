<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => ":Attribute debe ser aceptado.",
    "active_url"       => ":Attribute no es una URL válida.",
    "after"            => ":Attribute debe ser una fecha posterior a :date.",
    "alpha"            => ":Attribute solo debe contener letras.",
    "alpha_dash"       => ":Attribute solo debe contener letras, números y guiones.",
    "alpha_num"        => ":Attribute solo debe contener letras y números.",
    "array"            => ":Attribute debe ser un conjunto.",
    "before"           => ":Attribute debe ser una fecha anterior a :date.",
    "between"          => [
        "numeric" => ":Attribute tiene que estar entre :min - :max.",
        "file"    => ":Attribute debe pesar entre :min - :max kilobytes.",
        "string"  => ":Attribute tiene que tener entre :min - :max caracteres.",
        "array"   => ":Attribute tiene que tener entre :min - :max ítems.",
    ],
    "boolean"          => "El campo :Attribute debe tener un valor verdadero o falso.",
    "confirmed"        => "La confirmación de :Attribute no coincide.",
    "date"             => ":Attribute no es una fecha válida.",
    "date_format"      => ":Attribute no corresponde al formato :format.",
    "different"        => ":Attribute y :other deben ser diferentes.",
    "digits"           => ":Attribute debe tener :digits dígitos.",
    "digits_between"   => ":Attribute debe tener entre :min y :max dígitos.",
    "email"            => ":Attribute no es un correo válido",
    "exists"           => ":Attribute es inválido.",
    "filled"           => "El campo :Attribute es obligatorio.",
    "image"            => ":Attribute debe ser una imagen.",
    "in"               => ":Attribute es inválido.",
    "integer"          => ":Attribute debe ser un número entero.",
    "ip"               => ":Attribute debe ser una dirección IP válida.",
    "max"              => [
        "numeric" => ":Attribute no debe ser mayor a :max.",
        "file"    => ":Attribute no debe ser mayor que :max kilobytes.",
        "string"  => ":Attribute no debe ser mayor que :max caracteres.",
        "array"   => ":Attribute no debe tener más de :max elementos.",
    ],
    "mimes"            => ":Attribute debe ser un archivo con formato: :values.",
    "min"              => [
        "numeric" => "El tamaño de :Attribute debe ser de al menos :min.",
        "file"    => "El tamaño de :Attribute debe ser de al menos :min kilobytes.",
        "string"  => ":Attribute debe contener al menos :min caracteres.",
        "array"   => ":Attribute debe tener al menos :min elementos.",
    ],
    "not_in"           => ":Attribute es inválido.",
    "numeric"          => ":Attribute debe ser numérico.",
    "regex"            => "El formato de :Attribute es inválido.",
    "required"         => "El campo :Attribute es obligatorio.",
    "required_if"      => "El campo :Attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :Attribute es obligatorio cuando :values está presente.",
    "required_with_all" => "El campo :Attribute es obligatorio cuando :values está presente.",
    "required_without" => "El campo :Attribute es obligatorio cuando :values no está presente.",
    "required_without_all" => "El campo :Attribute es obligatorio cuando ninguno de :values estén presentes.",
    "same"             => ":Attribute y :other deben coincidir.",
    "size"             => [
        "numeric" => "El tamaño de :Attribute debe ser :size.",
        "file"    => "El tamaño de :Attribute debe ser :size kilobytes.",
        "string"  => ":Attribute debe contener :size caracteres.",
        "array"   => ":Attribute debe contener :size elementos.",
    ],
    "string"           => "The :Attribute must be a string.",
    "timezone"         => "El :Attribute debe ser una zona válida.",
    "unique"           => ":Attribute ya ha sido registrado.",
    "url"              => "El formato :Attribute es inválido.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
