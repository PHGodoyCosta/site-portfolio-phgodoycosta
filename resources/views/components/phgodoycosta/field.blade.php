@props([
    'label' => null,
    'help' => null,
    'error' => null,
    'multiline' => false,
    'icon' => null,
    'kbd' => [],
    'hideLabel' => false,
    'rows' => null,
])

@php
    $id = $attributes->get('id') ?? 'field-' . uniqid();
    $helpId = $help ? $id . '-help' : null;
    $errorId = $error ? $id . '-error' : null;
    $describedBy = trim(implode(' ', array_filter([$helpId, $errorId])));
    $value = $attributes->get('value');

    $fieldClasses = trim(implode(' ', array_filter([
        'vg-field',
        $error ? 'vg-field--error' : null,
    ])));

    $wrapClasses = trim(implode(' ', array_filter([
        'vg-field__wrap',
        $icon ? 'vg-field--icon' : null,
    ])));

    $labelClasses = trim(implode(' ', array_filter([
        'vg-field__label',
        'vg-t-ui-sm',
        $hideLabel ? 'vg-sr-only' : null,
    ])));

    $controlAttributes = $attributes
        ->except(['label', 'help', 'error', 'multiline', 'icon', 'kbd', 'hideLabel', 'rows', 'id', 'class', 'value', 'type'])
        ->merge([
            'class' => 'vg-field__control',
            'aria-invalid' => $error ? 'true' : null,
            'aria-describedby' => $describedBy ?: null,
        ])
        ->filter(fn ($v) => $v !== null);
@endphp

<div class="{{ $fieldClasses }}">
    <label for="{{ $id }}" class="{{ $labelClasses }}">{{ $label }}</label>

    <div class="{{ $wrapClasses }}">
        @if ($icon)
            <span class="vg-field__lead">
                <x-icon :name="$icon" :size="16" />
            </span>
        @endif

        @if ($multiline)
            <textarea id="{{ $id }}" rows="{{ $rows ?? 4 }}" {{ $controlAttributes }}>{{ $value }}</textarea>
        @else
            <input id="{{ $id }}" type="{{ $attributes->get('type', 'text') }}" {{ $controlAttributes->merge(['value' => $value]) }} />
        @endif

        @if (!empty($kbd))
            <span class="vg-field__trail">
                @foreach ($kbd as $key)
                    <x-phgodoycosta.kbd>{{ $key }}</x-phgodoycosta.kbd>
                @endforeach
            </span>
        @endif
    </div>

    @if ($help && !$error)
        <p id="{{ $helpId }}" class="vg-field__help vg-t-caption">{{ $help }}</p>
    @endif

    @if ($error)
        <p id="{{ $errorId }}" class="vg-field__error vg-t-caption" role="alert">
            <x-icon name="circle-alert" :size="14" />
            <span>Erro: {{ $error }}</span>
        </p>
    @endif
</div>
