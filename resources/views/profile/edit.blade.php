<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Meu Perfil
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Gerencie suas informações e segurança da conta.
            </p>
        </div>
    </x-slot>
    

    <div class="py-10 bg-[#E8DFD3]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 rounded-2xl shadow-lg p-8 mb-8 text-white">
                <div class="flex items-center gap-5">

                    <div class="w-20 h-20 rounded-full bg-white/20 flex items-center justify-center text-3xl font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold">
                            {{ Auth::user()->name }}
                        </h2>

                        <p class="text-blue-100">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">

                    <div class="border-b px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Informações Pessoais
                        </h3>

                        <p class="text-sm text-gray-500">
                            Atualize seu nome e endereço de e-mail.
                        </p>
                    </div>

                    <div class="p-6">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">
                    <div class="border-b px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Segurança
                        </h3>

                        <p class="text-sm text-gray-500">
                            Altere sua senha para manter sua conta protegida.
                        </p>
                    </div>

                    <div class="p-6">
                        @include('profile.partials.update-password-form')
                    </div>

                </div>

                <div class="bg-red-50 rounded-2xl shadow border border-red-200 overflow-hidden">
                    <div class="border-b border-red-200 px-6 py-4">
                        <h3 class="text-lg font-semibold text-red-700">
                            Zona de Perigo
                        </h3>

                        <p class="text-sm text-red-500">
                            Esta ação é permanente e não poderá ser desfeita.
                        </p>
                    </div>

                    <div class="p-6">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>