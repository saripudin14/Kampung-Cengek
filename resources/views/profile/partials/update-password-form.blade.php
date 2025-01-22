<section class="p-6 bg-yellow-50 border border-yellow-200 rounded-lg shadow-md">
    <header class="mb-4">
        <h2 class="text-xl font-bold text-yellow-800">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-yellow-700">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-yellow-800" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" 
                class="mt-1 block w-full p-2 border border-yellow-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-yellow-600" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-yellow-800" />
            <x-text-input id="update_password_password" name="password" type="password" 
                class="mt-1 block w-full p-2 border border-yellow-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-yellow-600" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-yellow-800" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="mt-1 block w-full p-2 border border-yellow-300 rounded-md focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-yellow-600" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="px-4 py-2 bg-yellow-600 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-yellow-700"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
