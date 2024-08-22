<section class="registerContainer">
    <div class="registerContainer__navigatorContainer">
        <div class="registerContainer__navigatorContainer__navigator">
            @foreach($steps as $step)
                @if ($step['index'] == 5) @break @endif
                <div class="step @if($step['active'])step--active @endif @if($step['done'])step--done @endif">
                    <button type="button"
                            class="step__number @if(!$this->canNavigate($step['index']))step__number--disabled @endif"
                            @if($this->canNavigate($step['index']))wire:click.prevent="navigate({{ $step['index'] }})" @endif>
                        <span>{{ $step['index'] }}</span>
                        <svg>
                            <use xlink:href="{{ asset('images/sprite.svg#check') }}"></use>
                        </svg>
                    </button>
                    <div class="step__content">
                        <small class="step__content__step">
                            Step {{ $step['index'] }}
                        </small>
                        <h2 class="step__content__title">
                            {{ $step['title'] }}
                        </h2>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('app.login') }}" title="{{ __('app.buttons.login.title') }}" class="registerContainer__navigatorContainer__button">
            <i class="fa-solid fa-arrow-right"></i>
            <span>
                {{ __('app.buttons.login.content') }}
            </span>
        </a>
    </div>

    <div class="registerContainer__stepsContainer">
        @if (!$feedback)
            @if ($this->getActiveStep() == 1)
                {{-- INFORMATIONS --}}
                <div class="registerContainer__stepsContainer__step" wire:loading.remove wire:target="submitStep">
                    <h1 class="registerContainer__stepsContainer__step__title">
                        {{ __('app.steps.informations.title') }}
                    </h1>
                    <p class="registerContainer__stepsContainer__step__description">
                        {{ __('app.steps.informations.description') }}
                    </p>

                    <form wire:submit.self="submitStep" class="registerContainer__stepsContainer__step__formContainer">
                        @csrf

                        <x-fields.input :label="__('app.fields.name.label')" fieldName="stepOneForm[name]" fieldKey="stepOneForm.name"
                                        :placeholder="__('app.fields.name.placeholder')" livewireMode="live.debounce.250ms" :required="true" />

                        <x-fields.input type="email" :label="__('app.fields.email.label')" fieldName="stepOneForm[email]" fieldKey="stepOneForm.email"
                                        :placeholder="__('app.fields.email.placeholder')" livewireMode="live.debounce.250ms" :required="true" />

                        <x-fields.input :label="__('app.fields.phone.label')" fieldName="stepOneForm[phone]" fieldKey="stepOneForm.phone"
                                        :placeholder="__('app.fields.phone.placeholder')" livewireMode="live.debounce.250ms" />

                        <x-fields.input :$showPassword type="password" :label="__('app.fields.password.label')" fieldName="stepOneForm[password]" fieldKey="stepOneForm.password"
                                        :placeholder="__('app.fields.password.placeholder')" livewireMode="live.debounce.250ms" :required="true" />

                        <div class="registerContainer__stepsContainer__step__formContainer__buttonContainer registerContainer__stepsContainer__step__formContainer__buttonContainer--right">
                            <button type="submit" title="{{ __('app.buttons.next.title') }}"
                                    class="registerContainer__stepsContainer__step__formContainer__buttonContainer__button registerContainer__stepsContainer__step__formContainer__buttonContainer__button--submit">
                                {{ __('app.buttons.next.content') }}
                            </button>
                        </div>
                    </form>
                </div>
            @elseif ($this->getActiveStep() == 2)
                {{-- PLANS --}}
                <div class="registerContainer__stepsContainer__step" wire:loading.remove wire:target="submitStep">
                    <h1 class="registerContainer__stepsContainer__step__title">
                        {{ __('app.steps.plans.title') }}
                    </h1>
                    <p class="registerContainer__stepsContainer__step__description">
                        {{ __('app.steps.plans.description') }}
                    </p>

                    <form wire:submit.self="submitStep" class="registerContainer__stepsContainer__step__formContainer registerContainer__stepsContainer__step__formContainer--plan">
                        @csrf

                        <div class="registerContainer__stepsContainer__step__formContainer__plansContainer">
                            @foreach(\App\Models\Plan::all() as $plan)
                                <div class="registerContainer__stepsContainer__step__formContainer__plansContainer__plan">
                                    <input type="radio" name="stepTwoForm[plan_id]" id="stepTwoForm[plan_id][{{ $plan->id }}]"
                                           value="{{ $plan->id }}" wire:model.live.debounce.250ms="stepTwoForm.plan_id" />

                                    <label for="stepTwoForm[plan_id][{{ $plan->id }}]">
                                        <img src="{{ asset("images/plans/icon-" . strtolower($plan->name) . ".svg") }}" alt="{{ config('app.name') }}" />

                                        <div>
                                            <h4>{{ __("app.picklist.plans.$plan->id") }}</h4>
                                            <small>{{ $plan->getPlanPriceByRecurrence($stepTwoForm->is_recurrence_yearly, true) }}</small>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="registerContainer__stepsContainer__step__formContainer__recurrence">
                            <p class="registerContainer__stepsContainer__step__formContainer__recurrence__text @if(!$stepTwoForm->is_recurrence_yearly)registerContainer__stepsContainer__step__formContainer__recurrence__text--current @endif">{{ __('app.picklist.planRecurrences.1') }}</p>
                            <input type="checkbox" role="switch" id="stepTwoForm[is_recurrence_yearly]" name="stepTwoForm[is_recurrence_yearly]" wire:model.live="stepTwoForm.is_recurrence_yearly" />
                            <p class="registerContainer__stepsContainer__step__formContainer__recurrence__text @if($stepTwoForm->is_recurrence_yearly)registerContainer__stepsContainer__step__formContainer__recurrence__text--current @endif">{{ __('app.picklist.planRecurrences.2') }}</p>
                        </div>

                        <div class="registerContainer__stepsContainer__step__formContainer__buttonContainer">
                            <button type="button" wire:click.prevent="prevStep"
                                    title="{{ __('app.buttons.back.title') }}"
                                    class="registerContainer__stepsContainer__step__formContainer__buttonContainer__button">
                                {{ __('app.buttons.back.content') }}
                            </button>

                            <button type="submit" title="{{ __('app.buttons.next.title') }}"
                                    class="registerContainer__stepsContainer__step__formContainer__buttonContainer__button registerContainer__stepsContainer__step__formContainer__buttonContainer__button--submit">
                                {{ __('app.buttons.next.content') }}
                            </button>
                        </div>
                    </form>
                </div>
            @elseif ($this->getActiveStep() == 3)
                {{-- ADDONS --}}
                <div class="registerContainer__stepsContainer__step" wire:loading.remove wire:target="submitStep">
                    <h1 class="registerContainer__stepsContainer__step__title">
                        {{ __('app.steps.addons.title') }}
                    </h1>
                    <p class="registerContainer__stepsContainer__step__description">
                        {{ __('app.steps.addons.description') }}
                    </p>

                    <form wire:submit.self="submitStep" class="registerContainer__stepsContainer__step__formContainer registerContainer__stepsContainer__step__formContainer--plan">
                        @csrf

                        <div class="registerContainer__stepsContainer__step__formContainer__addonsContainer">
                            @foreach(\App\Models\PlanAddon::all() as $planAddon)
                                <div class="registerContainer__stepsContainer__step__formContainer__addonsContainer__addon">
                                    <label for="stepThreeForm[addons][{{ $planAddon->id }}]">
                                        <input type="checkbox" name="stepThreeForm[addons][{{ $planAddon->id }}]" id="stepThreeForm[addons][{{ $planAddon->id }}]"
                                               value="{{ $planAddon->id }}"
                                               wire:model.live="stepThreeForm.addons" />

                                        <div>
                                            <h4>{{ __("app.picklist.planAddons.$planAddon->id.title") }}</h4>
                                            <p>{{ __("app.picklist.planAddons.$planAddon->id.description") }}</p>
                                        </div>

                                        <small>{{ $planAddon->getPlanAddonPriceByRecurrence($stepTwoForm->is_recurrence_yearly, true) }}</small>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="registerContainer__stepsContainer__step__formContainer__buttonContainer">
                            <button type="button" wire:click.prevent="prevStep" title="{{ __('app.buttons.back.title') }}"
                                    class="registerContainer__stepsContainer__step__formContainer__buttonContainer__button">
                                {{ __('app.buttons.back.content') }}
                            </button>

                            <button type="submit" title="{{ __('app.buttons.next.title') }}"
                                    class="registerContainer__stepsContainer__step__formContainer__buttonContainer__button registerContainer__stepsContainer__step__formContainer__buttonContainer__button--submit">
                                {{ __('app.buttons.next.content') }}
                            </button>
                        </div>
                    </form>
                </div>
            @elseif ($this->getActiveStep() == 4)
                {{-- SUMMARY --}}
                <div class="registerContainer__stepsContainer__step" wire:loading.remove wire:target="submitStep">
                    <h1 class="registerContainer__stepsContainer__step__title">
                        {{ __('app.steps.summary.title') }}
                    </h1>
                    <p class="registerContainer__stepsContainer__step__description">
                        {{ __('app.steps.summary.description') }}
                    </p>

                    <form wire:submit.self="submitStep" class="registerContainer__stepsContainer__step__formContainer registerContainer__stepsContainer__step__formContainer--plan">
                        @csrf

                        <div class="registerContainer__stepsContainer__step__formContainer__summaryContainer">

                            <div class="registerContainer__stepsContainer__step__formContainer__summaryContainer__planContainer">
                                <div class="registerContainer__stepsContainer__step__formContainer__summaryContainer__planContainer__content">
                                    <h4>
                                        {{ __('app.picklist.plans.' . \App\Models\Plan::find($stepTwoForm->plan_id)->id) }} ({{ $stepTwoForm->is_recurrence_yearly ? 'Yearly' : 'Monthly' }})
                                    </h4>
                                    <button type="button" wire:click.prevent="navigate(2)" title="{{ __('app.buttons.change.title') }}">
                                        {{ __('app.buttons.change.content') }}
                                    </button>
                                </div>

                                <p class="registerContainer__stepsContainer__step__formContainer__summaryContainer__planContainer__price">
                                    {{ \App\Models\Plan::find($stepTwoForm->plan_id)->getPlanPriceByRecurrence($stepTwoForm->is_recurrence_yearly, true) }}
                                </p>
                            </div>

                            <div class="registerContainer__stepsContainer__step__formContainer__summaryContainer__addonsContainer">
                                @forelse($stepThreeForm->planAddons as $planAddon)
                                    <div class="registerContainer__stepsContainer__step__formContainer__summaryContainer__addonsContainer__addon">
                                        <h4>{{ __("app.picklist.planAddons.$planAddon->id.title") }}</h4>
                                        <p>{{ $planAddon->getPlanAddonPriceByRecurrence($stepTwoForm->is_recurrence_yearly, true) }}</p>
                                    </div>
                                @empty
                                    <p class="registerContainer__stepsContainer__step__formContainer__summaryContainer__addonsContainer__empty">
                                        {{ __('app.steps.summary.empty') }}
                                    </p>
                                @endforelse
                            </div>

                        </div>

                        <div class="registerContainer__stepsContainer__step__formContainer__totalContainer">
                            <p class="registerContainer__stepsContainer__step__formContainer__totalContainer__text">
                                {{ __('app.steps.summary.total', ['recurrence' => $stepTwoForm->is_recurrence_yearly ? 'per year' : 'per month']) }}
                            </p>
                            <p class="registerContainer__stepsContainer__step__formContainer__totalContainer__price">
                                {{ $this->getTotalPrice() }}
                            </p>
                        </div>

                        <div class="registerContainer__stepsContainer__step__formContainer__buttonContainer">
                            <button type="button" wire:click.prevent="prevStep" title="{{ __('app.buttons.back.title') }}"
                                    class="registerContainer__stepsContainer__step__formContainer__buttonContainer__button">
                                {{ __('app.buttons.back.content') }}
                            </button>

                            <button type="submit" title="{{ __('app.buttons.submit.title') }}"
                                    class="registerContainer__stepsContainer__step__formContainer__buttonContainer__button registerContainer__stepsContainer__step__formContainer__buttonContainer__button--submit">
                                {{ __('app.buttons.submit.content') }}
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        @else
            {{-- FEEDBACK --}}
            <div class="registerContainer__stepsContainer__feedback">
                <img src="{{ asset('images/icon-thank-you.svg') }}" alt="{{ config('app.name') }}" class="registerContainer__stepsContainer__feedback__img" />
                <h1 class="registerContainer__stepsContainer__feedback__title">
                    {{ __('app.steps.feedback.title') }}
                </h1>
                <p class="registerContainer__stepsContainer__feedback__description">
                    {{ __('app.steps.feedback.description') }}
                </p>

                <a href="{{ route('app.dashboard') }}" title="{{ __('app.buttons.dashboard.title') }}" class="registerContainer__stepsContainer__feedback__button">
                    {{ __('app.buttons.dashboard.content') }}
                </a>
            </div>
        @endif

        {{-- LOADING --}}
        <div class="registerContainer__loadingContainer" wire:loading.flex wire:target="submitStep">
            <span class="loader"></span>
        </div>
    </div>
</section>
