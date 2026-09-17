<x-layout title="Register">

    <x-card>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-input label="Nome" name="name" />
            <x-input label="Email" name="email" type="email" />
            <x-input label="Password" name="password" type="password" />
            <x-input label="Conferma Password" name="password_confirmation" type="password" />

            <x-button>Registrati</x-button>
        </form>

    </x-card>

</x-layout>
