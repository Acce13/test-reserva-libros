<div class="col-lg-5 col-xl-4 col-xxl-4">
    <header class="header u-radius-1 mt-3 shadow p-4 d-flex flex-column justify-content-center">
        <img src="{{ asset('img/avatar.png') }}" alt="Jose Duvan" class="header__user-avatar mx-auto" />
        <div class="header__user-box text-center text-white mb-3">
            <h1 class="m-0">{{ auth()->user()->name }}</h1>
            <h4 class="m-0">Total: {{ ($reservationTotal) ? $reservationTotal : '0' }}</h4>
        </div>
    </header>
</div>