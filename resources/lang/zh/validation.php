<?php

return [
    'accepted' => ':attribute 必须被接受。',
    'active_url' => ':attribute 不是有效的网址。',
    'after' => ':attribute 必须是之后的日期 :date.',
    'after_or_equal' => ':attribute 必须是等于或小于等于的日期 :date.',
    'alpha' => ':attribute 只能包含字母。',
    'alpha_dash' => ':attribute 只能包含字母，数字，破折号和下划线。',
    'alpha_num' => ':attribute 只能包含字母和数字。',
    'array' => ':attribute 必须是一个数组。',
    'before' => ':attribute 必须是一个日期之前 :date.',
    'before_or_equal' => ':attribute 必须是早于或等于的日期 :date.',
    'between' => [
        'numeric' => ':attribute 必须介于 :min 和 :max.',
        'file' => ':attribute 必须介于 :min 和 :max kilobytes.',
        'string' => ':attribute 必须介于 :min 和 :max characters.',
        'array' => ':attribute 必须介于 :min 和 :max items.',
    ],
    'boolean' => ':attribute 字段必须为true或false。',
    'confirmed' => ':attribute 确认不匹配。',
    'date' => ':attribute 不是有效日期。',
    'date_equals' => ':attribute 日期必须等于 :date.',
    'date_format' => ':attribute 与格式不符 :format.',
    'different' => ':attribute 和 :other 必须不同。',
    'digits' => ':attribute 一定是 :digits 数字。',
    'digits_between' => ':attribute 必须介于 :min 和 :max 数字。',
    'dimensions' => ':attribute 图片尺寸无效。',
    'distinct' => ':attribute 字段具有重复值。',
    'email' => ':attribute 必须是一个有效的E-mail地址。',
    'ends_with' => ':attribute 必须以下列之一结尾： :values.',
    'exists' => '选定的 :attribute 是无效的。',
    'file' => ':attribute 必须是一个文件。',
    'filled' => ':attribute 字段必须有一个值。',
    'gt' => [
        'numeric' => ':attribute 必须大于 :value.',
        'file' => ':attribute 必须大于 :value kilobytes.',
        'string' => ':attribute 必须大于 :value 字符。',
        'array' => ':attribute 必须超过 :value 项目。',
    ],
    'gte' => [
        'numeric' => ':attribute 必须大于或等于 :value.',
        'file' => ':attribute必须大于或等于 :value kilobytes.',
        'string' => ':attribute 必须大于或等于 :value 字符。',
        'array' => ':attribute 一定有 :value 项或更多。',
    ],
    'image' => ':attribute 必须是图像。',
    'in' => '选定的 :attribute 是无效的。',
    'in_array' => ':attribute 字段不存在于 :other.',
    'integer' => ':attribute 必须为整数。',
    'ip' => ':attribute 必须是有效的IP地址。',
    'ipv4' => ':attribute 必须是有效的IPv4地址。',
    'ipv6' => ':attribute 必须是有效的IPv6地址。',
    'json' => ':attribute 必须是有效的JSON字符串。',
    'lt' => [
        'numeric' => ':attribute 必须小于 :value.',
        'file' => ':attribute 必须小于 :value kilobytes.',
        'string' => ':attribute 必须小于 :value 字符。',
        'array' => ':attribute 必须少于 :value 项目。',
    ],
    'lte' => [
        'numeric' => ':attribute 必须小于或等于 :value.',
        'file' => ':attribute 必须小于或等于 :value kilobytes.',
        'string' => ':attribute 必须小于或等于 :value 字符。',
        'array' => ':attribute 不得超过 :value 项目。',
    ],
    'max' => [
        'numeric' => ':attribute 不得大于 :max.',
        'file' => ':attribute 不得大于 :max kilobytes.',
        'string' => ':attribute 不得大于 :max 字符。',
        'array' => ':attribute 可能不超过 :max 项目。',
    ],
    'mimes' => ':attribute 必须是以下类型的文件： :values.',
    'mimetypes' => ':attribute 必须是以下类型的文件： :values.',
    'min' => [
        'numeric' => ':attribute 必须至少 :min.',
        'file' => ':attribute 必须至少 :min kilobytes.',
        'string' => ':attribute 必须至少 :min 字符。',
        'array' => ':attribute 必须至少有 :min 项目。',
    ],
    'multiple_of' => ':attribute 必须是的倍数 :value.',
    'not_in' => '选定的 :attribute 是无效的。',
    'not_regex' => ':attribute 格式无效。',
    'numeric' => ':attribute 必须是数字。',
    'password' => '密码错误。',
    'present' => ':attribute 字段必须存在。',
    'regex' => ':attribute 格式无效。',
    'required' => ':attribute 必填字段。',
    'required_if' => ':attribute 何时需要该字段 :other 是 :value.',
    'required_unless' => ':attribute 必填字段，除非 :other 在 :values.',
    'required_with' => ':attribute 何时需要该字段 :values 存在。',
    'required_with_all' => ':attribute 何时需要该字段 :values 存在。',
    'required_without' => ':attribute 何时需要该字段 :values 不存在。',
    'required_without_all' => ':attribute 如果没有 :values 存在。',
    'same' => ':attribute 和 :other 必须匹配。',
    'size' => [
        'numeric' => ':attribute 一定是 :size.',
        'file' => ':attribute 一定是 :size kilobytes.',
        'string' => ':attribute 一定是 :size 字符。',
        'array' => ':attribute 必须包含 :size 项目。',
    ],
    'starts_with' => ':attribute 必须以下列之一开头： :values.',
    'string' => ':attribute 必须是一个字符串。',
    'timezone' => ':attribute 必须是有效区域。',
    'unique' => ':attribute 已有人带走了。',
    'uploaded' => ':attribute 上传失败。',
    'url' => ':attribute 格式无效。',
    'uuid' => ':attribute 必须是有效的UUID。',
    'letter_and_space' => ':attribute 只能包含字母和空格。',
    'phone_e164' => ':attribute 格式无效，例如：+62xxxxxx。',

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
