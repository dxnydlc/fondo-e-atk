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
    "accepted"         => ":attribute debe ser aceptado.",
    "active_url"       => ":attribute no es una URL válida.",
    "after"            => ":attribute debe ser una fecha posterior a :date.",
    "alpha"            => ":attribute solo debe contener letras.",
    "alpha_dash"       => ":attribute solo debe contener letras, números y guiones.",
    "alpha_num"        => ":attribute solo debe contener letras y números.",
    "array"            => ":attribute debe ser un conjunto.",
    "before"           => ":attribute debe ser una fecha anterior a :date.",
    "between"          => [
        "numeric" => ":attribute tiene que estar entre :min - :max.",
        "file"    => ":attribute debe pesar entre :min - :max kilobytes.",
        "string"  => ":attribute tiene que tener entre :min - :max caracteres.",
        "array"   => ":attribute tiene que tener entre :min - :max ítems.",
    ],
    "boolean"          => "El campo :attribute debe tener un valor verdadero o falso.",
    "confirmed"        => "La confirmación de :attribute no coincide.",
    "date"             => ":attribute no es una fecha válida.",
    "date_format"      => ":attribute no corresponde al formato :format.",
    "different"        => ":attribute y :other deben ser diferentes.",
    "digits"           => ":attribute debe tener :digits dígitos.",
    "digits_between"   => ":attribute debe tener entre :min y :max dígitos.",
    "email"            => ":attribute no es un correo válido",
    "exists"           => ":attribute es inválido.",
    "filled"           => "El campo :attribute es obligatorio.",
    "image"            => ":attribute debe ser una imagen.",
    "in"               => ":attribute es inválido.",
    "integer"          => ":attribute debe ser un número entero.",
    "ip"               => ":attribute debe ser una dirección IP válida.",
    'json'             => 'The :attribute must be a valid JSON string.',
    "max"              => [
        "numeric" => ":attribute no debe ser mayor a :max.",
        "file"    => ":attribute no debe ser mayor que :max kilobytes.",
        "string"  => ":attribute no debe ser mayor que :max caracteres.",
        "array"   => ":attribute no debe tener más de :max elementos.",
    ],
    "mimes"            => ":attribute debe ser un archivo con formato: :values.",
    "min"              => [
        "numeric" => "El tamaño de :attribute debe ser de al menos :min.",
        "file"    => "El tamaño de :attribute debe ser de al menos :min kilobytes.",
        "string"  => ":attribute debe contener al menos :min caracteres.",
        "array"   => ":attribute debe tener al menos :min elementos.",
    ],
    "not_in"           => ":attribute es inválido.",
    "numeric"          => ":attribute debe ser numérico.",
    "regex"            => "El formato de :attribute es inválido.",
    "required"         => "El campo :attribute es obligatorio.",
    "required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
    "required_with"    => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_with_all" => "El campo :attribute es obligatorio cuando :values está presente.",
    "required_without" => "El campo :attribute es obligatorio cuando :values no está presente.",
    "required_without_all" => "El campo :attribute es obligatorio cuando ninguno de :values estén presentes.",
    "same"             => ":attribute y :other deben coincidir.",
    "size"             => [
        "numeric" => "El tamaño de :attribute debe ser :size.",
        "file"    => "El tamaño de :attribute debe ser :size kilobytes.",
        "string"  => ":attribute debe contener :size caracteres.",
        "array"   => ":attribute debe contener :size elementos.",
    ],
    "string"           => "The :attribute must be a string.",
    "timezone"         => "El :attribute debe ser una zona válida.",
    "unique"           => ":attribute ya ha sido registrado.",
    "url"              => "El formato :attribute es inválido.",
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
        'nombre' => [
            'required' => 'Es necesario un Nombre',
            'unique' => 'Ese Nombre ya está registrado'
        ],
        'name' => [
            'required' => 'Es necesario un Nombre',
            'unique' => 'Ese Nombre ya está registrado'
        ],
        'apellidos' => [
            'required' => 'Es necesario un Apellido',
        ],
        'telefono' => [
            'required' => 'Es necesario un Teléfono',
        ],
        'contacto' => [
            'required' => 'Es necesario un Contacto',
        ],
        'piso' => [
            'required' => 'Es necesario un Número de Piso',
        ],
        'numero' => [
            'required' => 'Es necesario un Número de Habitación',
        ],
        'dni' => [
            'required' => 'Es necesario un DNI',
            'unique' => 'El DNI ya existe',
        ],
        'email' => [
            'required' => 'Es necesario un Correo',
            'unique' => 'El Correo ya existe',
        ],
        'categoria' => [
            'required' => 'Es necesario una Categoría',
            'unique' => 'La Categoría ya existe',
        ],
        'marca' => [
            'required' => 'Es necesario una Marca',
            'unique' => 'La Marca ya existe',
        ],
        'clase' => [
            'required' => 'Es necesario una Clase',
            'unique' => 'La Clase ya existe',
        ],
        'proveedor' => [
            'required' => 'Es necesario una Proveedor',
            'unique' => 'El Proveedor ya existe',
        ],
        'destacado' => [
            'required' => 'indique si es destacado'
        ],
        'id_proveedor' => [
            'required' => 'Es necesario un Proveedor'
        ],
        'fecha' => [
            'required' => 'Es necesario una Fecha'
        ],
        'id_cliente' => [
            'required' => 'Es necesario una Cliente'
        ],
        'tipo_doc' => [
            'required' => 'Es necesario un tipo de documento'
        ],
        'forma_pago' => [
            'required' => 'Indique una forma de pago'
        ],
        'nombre_categoria' => [
            'required' => 'Seleccione una categoría'
        ],
        'producto' => [
            'required' => 'Seleccione un Producto'
        ],
        'tipo_menu' => [
            'required' => 'Seleccione un Tipo de Menú'
        ],
        'precio' => [
            'required' => 'Ingrese un Precio'
        ],
        'stock' => [
            'required' => 'Ingrese un Stock'
        ],
        'id_combo' => [
            'required' => 'Seleccione un Tipo de Combo'
        ],
        'formData' => [
            'dimensions' => 'Dimesiónes mínimas 400x400 píxeles'
        ],
        'nombre' => [
            'required' => 'Ingrese nombre'
        ],
        'titulo' => [
            'required' => 'Ingrese un título'
        ],
        'subtitulo' => [
            'required' => 'Ingrese un sub-título'
        ],
        'orden' => [
            'required' => 'Ingrese un orden'
        ],
        'texto_boton' => [
            'required' => 'Ingrese un texto de boton'
        ],
        'enlace' => [
            'required' => 'Ingrese un enlace'
        ],
        'imagen_desktop' => [
            'required' => 'Ingrese una imágen desktop'
        ],
        'imagen_movil' => [
            'required' => 'Ingrese una imágen movil'
        ],
        'imagen_publicacion' => [
            'required' => 'Ingrese una imágen publicacion'
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