<section class="bg-yellow-50 p-6 rounded-lg shadow-md">
    <header class="mb-6">
        <h2 class="text-xl font-bold text-yellow-800">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm text-yellow-700">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-yellow-800" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-yellow-300 focus:ring-yellow-500 focus:border-yellow-500 rounded-md shadow-sm" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-yellow-600" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-yellow-800" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-yellow-300 focus:ring-yellow-500 focus:border-yellow-500 rounded-md shadow-sm" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-yellow-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4">
                    <p class="text-sm text-yellow-700">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-yellow-800 hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-yellow-700"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
