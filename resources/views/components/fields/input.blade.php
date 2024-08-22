<fieldset x-data="">

    <div>
        @if ($label)
            <label for="{{ $fieldName }}">
                {{ $label }}
                @if (!$required)
                    {{ __('app.fields.optional') }}
                @endif
            </label>
        @endif

        @error($fieldKey)
        <span class="error">
            {{ $message }}
        </span>
        @enderror
    </div>
    <input type="{{ $showPassword ? 'text' : $type }}" id="{{ $fieldName }}" name="{{ $fieldName }}"
           @if($placeholder)placeholder="{{ $placeholder }}" @endif
           @if($required)required="{{ $required }}" @endif
           @if($value)value="{{ $value }}" @endif
           @if($livewire)wire:model.{{ $livewireMode }}="{{ $fieldKey }}" @error($fieldKey)class="invalid" @enderror @endif />

    @if ($hardType === 'password')
        <button type="button" wire:click.prevent="toggleShowPassword" class="show">
            @if($showPassword)
                <i class="fa-solid fa-eye-slash"></i>
            @else
                <i class="fa-solid fa-eye"></i>
            @endif
        </button>
    @endif

</fieldset>
