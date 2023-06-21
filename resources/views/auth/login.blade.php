<x-guest-layout>
  <x-jet-authentication-card>
    <x-slot name="logo">
      <x-jet-authentication-card-logo />
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
      {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" autocomplete="off">
      @csrf
      <div class="mt-4">
        <div>
          <!-- <x-jet-label for="email" value="{{ __('Email') }}" /> -->
          <x-jet-input id="email" type="email" name="email" placeholder="Nombre de usuario" :value="old('email')" required />
        </div>

        <div class="mt-4">
          <!-- <x-jet-label for="password" value="{{ __('Password') }}" /> -->
          <x-jet-input id="password" type="password" name="password" placeholder="Contraseña" required autocomplete="current-password" />
        </div>

        <div class="flex items-center justify-center mt-4">
          <label for="remember_me" class="justify-end">
            <x-jet-checkbox id="remember_me" name="remember" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
          </label>
        </div>

        <div class="verde">
          <div class="flex items-center justify-center mt-4 py-2">
            <button class="ml-4 flex text-white">
              {{ __('Log in') }}
              <img src="{{ asset('images/flecha-inicio.png') }}" alt="icono-cun" width="25">
            </button>
          </div>
          <div class="flex items-center justify-center mt-0 py-4 vinotinto">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
            </a>
            @endif
          </div>
        </div>
      </div>
    </form>
  </x-jet-authentication-card>
</x-guest-layout>
