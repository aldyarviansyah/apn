<?php

return [
    'accepted' => 'Field :attribute harus diterima.',
    'active_url' => 'Field :attribute bukan URL yang valid.',
    'after' => 'Field :attribute harus tanggal setelahnya :date.',
    'after_or_equal' => 'Field :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => 'Field :attribute hanya boleh berisi huruf.',
    'alpha_dash' => 'Field :attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'Field :attribute hanya boleh berisi huruf dan angka.',
    'array' => 'Field :attribute harus berupa larik.',
    'before' => 'Field :attribute harus tanggal sebelumnya :date.',
    'before_or_equal' => 'Field :attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => 'Field :attribute harus di antara :min dan :max.',
        'file' => 'Field :attribute harus di antara :min dan :max kilobytes.',
        'string' => 'Field :attribute harus di antara :min dan :max characters.',
        'array' => 'Field :attribute harus di antara :min dan :max items.',
    ],
    'boolean' => 'Field :attribute harus diisi true atau false.',
    'confirmed' => 'Field :attribute konfirmasi tidak cocok.',
    'date' => 'Field :attribute bukan tanggal yang valid.',
    'date_equals' => 'Field :attribute harus tanggal yang sama dengan :date.',
    'date_format' => 'Field :attribute tidak sesuai dengan format :format.',
    'different' => 'Field :attribute and :other harus berbeda.',
    'digits' => 'Field :attribute harus :digits digit.',
    'digits_between' => 'Field :attribute harus di antara :min dan :max digits.',
    'dimensions' => 'Field :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Field :attribute memiliki nilai duplikat.',
    'email' => 'Field :attribute harus alamat e-mail yang valid.',
    'ends_with' => 'Field :attribute harus diakhiri dengan salah satu dari berikut ini: :values.',
    'exists' => 'Field :attribute yang terpilih tidak valid.',
    'file' => 'Field :attribute harus berupa file.',
    'filled' => 'Field :attribute harus punya nilai.',
    'gt' => [
        'numeric' => 'Field :attribute harus lebih besar dari :value.',
        'file' => 'Field :attribute harus lebih besar dari :value kilobytes.',
        'string' => 'Field :attribute harus lebih besar dari :value characters.',
        'array' => 'Field :attribute harus lebih besar dari :value item.',
    ],
    'gte' => [
        'numeric' => 'Field :attribute harus lebih besar dari atau sama :value.',
        'file' => 'Field :attribute harus lebih besar dari atau sama :value kilobytes.',
        'string' => 'Field :attribute harus lebih besar dari atau sama :value characters.',
        'array' => 'Field :attribute harus memiliki :value item atau lebih.',
    ],
    'image' => 'Field :attribute harus berupa gambar.',
    'in' => 'Field :attribute tidak valid.',
    'in_array' => 'Field :attribute tidak ada di :other.',
    'integer' => 'Field :attribute harus berupa bilangan bulat.',
    'ip' => 'Field :attribute harus alamat IP yang valid.',
    'ipv4' => 'Field :attribute harus alamat IPv4 yang valid.',
    'ipv6' => 'Field :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Field :attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => 'Field :attribute harus kurang dari :value.',
        'file' => 'Field :attribute harus kurang dari :value kilobytes.',
        'string' => 'Field :attribute harus kurang dari :value characters.',
        'array' => 'Field :attribute harus kurang dari :value items.',
    ],
    'lte' => [
        'numeric' => 'Field :attribute harus kurang dari atau sama :value.',
        'file' => 'Field :attribute harus kurang dari atau sama :value kilobytes.',
        'string' => 'Field :attribute harus kurang dari atau sama :value characters.',
        'array' => 'Field :attribute harus kurang dari atau sama :value items.',
    ],
    'max' => [
        'numeric' => 'Field :attribute mungkin tidak lebih dari :max.',
        'file' => 'Field :attribute mungkin tidak lebih dari :max kilobytes.',
        'string' => 'Field :attribute mungkin tidak lebih dari :max characters.',
        'array' => 'Field :attribute mungkin tidak lebih dari :max items.',
    ],
    'mimes' => 'Field :attribute harus berupa file berjenis: :values.',
    'mimetypes' => 'Field :attribute harus berupa file berjenis: :values.',
    'min' => [
        'numeric' => 'Field :attribute setidaknya harus :min.',
        'file' => 'Field :attribute setidaknya harus :min kilobytes.',
        'string' => 'Field :attribute setidaknya harus :min characters.',
        'array' => 'Field :attribute setidaknya harus :min item.',
    ],
    'multiple_of' => 'Field :attribute harus kelipatan dari :value.',
    'not_in' => 'Field :attribute tidak valid.',
    'not_regex' => 'Field :attribute format tidak valid.',
    'numeric' => 'Field :attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => 'Field :attribute harus hadir.',
    'regex' => 'Field :attribute format tidak valid.',
    'required' => 'Field :attribute harus diisi.',
    'required_if' => 'Field :attribute diperlukan saat :other adalah :value.',
    'required_unless' => 'Field :attribute diperlukan kecuali :other ada pada :values.',
    'required_with' => 'Field :attribute diperlukan ketika :values ada.',
    'required_with_all' => 'Field :attribute diperlukan ketika :values ada.',
    'required_without' => 'Field :attribute diperlukan ketika :values tidak ada.',
    'required_without_all' => 'Field :attribute diperlukan ketika tidak ada :values',
    'same' => 'Field :attribute dan :other harus sama.',
    'size' => [
        'numeric' => 'Field :attribute harus :size.',
        'file' => 'Field :attribute harus :size kilobytes.',
        'string' => 'Field :attribute harus :size characters.',
        'array' => 'Field :attribute harus :size items.',
    ],
    'starts_with' => 'Field :attribute harus dimulai dengan salah satu dari berikut ini: :values.',
    'string' => 'Field :attribute harus berupa string.',
    'timezone' => 'Field :attribute harus menjadi zona yang valid.',
    'unique' => 'Field :attribute sudah dipakai.',
    'uploaded' => 'Field :attribute gagal mengunggah.',
    'url' => 'Field :attribute format tidak valid.',
    'uuid' => 'Field :attribute harus merupakan UUID yang valid.',
    'letter_and_space' => 'Field :attribute hanya boleh berisi huruf dan spasi.',
    'phone_e164' => 'Field :attribute format tidak valid misalnya: + 62xxxxxx.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
