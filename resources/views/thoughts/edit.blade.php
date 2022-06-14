<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Thought') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mb-8 mx-auto flex items-center justify-center">
            <div class="w-1/2 p-8 rounded-lg shadow-lg bg-white">
                <form method="POST" action="{{ route('create_thought') }}">
                    @csrf

                    <!-- Password -->
                    <!--<div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>-->

                    <!-- Thought -->
                    <div>
                        <label for="thought">{{__('Thought')}}</label>
                        <textarea id="thought" class="block mt-1 w-full" type="text" name="thought" placeholder="What are you thinking?" required autofocus>{{ old('thought') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3">
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>