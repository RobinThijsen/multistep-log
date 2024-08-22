<section class="dashboardContainer">
    <div class="dashboardContainer__aside">
        <h2 class="dashboardContainer__aside__title">
            {{ $userConnected->name }}
        </h2>

        <button type="button" id="logout-btn" title="{{ __('app.buttons.logout.title') }}"
                class="dashboardContainer__aside__button">
            <i class="fa-solid fa-left-from-bracket"></i>
            <span>
                {{ __('app.buttons.logout.content') }}
            </span>
        </button>
        <form action="{{ route('logout') }}" method="post" id="logout-form">
            @csrf
        </form>
    </div>

    <div class="dashboardContainer__main">
        {{-- FEEDBACK --}}
        <div class="dashboardContainer__main__feedback">
            <img src="{{ asset('images/icon-thank-you.svg') }}" alt="{{ config('app.name') }}" class="dashboardContainer__main__feedback__img" />
            <h1 class="dashboardContainer__main__feedback__title">
                {{ __('app.steps.feedback.title') }}
            </h1>
            <p class="dashboardContainer__main__feedback__description">
                {{ __('app.steps.feedback.description') }}
            </p>
        </div>
    </div>

    @script
    <script>
        document.querySelector('#logout-btn').addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('#logout-form').submit();
        });
    </script>
    @endscript
</section>
