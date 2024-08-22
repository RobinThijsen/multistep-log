<div class="loginContainer">
    <div class="loginContainer__leftContainer">
        {{-- action="{{ route('login') }}" method="post" --}}
        <form wire:submit.self="submit" class="loginContainer__leftContainer__formContainer">
            @csrf

            <x-fields.input type="email" :label="__('app.fields.email.label')" fieldName="email" fieldKey="email"
                            :placeholder="__('app.fields.email.placeholder')" livewireMode="live.debounce.250ms" :required="true" />

            <x-fields.input :$showPassword type="password" :label="__('app.fields.password.label')" fieldName="password" fieldKey="password"
                            :placeholder="__('app.fields.password.placeholder')" livewireMode="live.debounce.250ms" :required="true" />

            <div class="loginContainer__leftContainer__formContainer__buttonContainer">
                <button type="submit" title="{{ __('app.buttons.submit.title') }}"
                        class="loginContainer__leftContainer__formContainer__buttonContainer__button loginContainer__leftContainer__formContainer__buttonContainer__button--submit">
                    {{ __('app.buttons.submit.content') }}
                </button>
            </div>
        </form>
    </div>

    <div class="loginContainer__rightContainer">
        <h1 class="loginContainer__rightContainer__title">
            {{ __('app.login.title') }}
        </h1>
        <p class="loginContainer__rightContainer__subTitle">
            {{ __('app.login.subTitle') }}
        </p>
        <a href="{{ route('app.register') }}" class="loginContainer__rightContainer__button" title="{{ __('app.buttons.register.title') }}">
            <span>
                {{ __('app.buttons.register.content') }}
            </span>
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</div>
