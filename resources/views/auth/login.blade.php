<x-layout title="Login">

    <x-card>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-input label="Email" name="email" type="email" />
            <x-input label="Password" name="password" type="password" />

            <x-button>Login</x-button>
        </form>

    </x-card>

</x-layout>
