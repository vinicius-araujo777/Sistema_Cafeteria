<x-guest-layout>
<div class="min-h-screen bg-[#F5EFE0] flex flex-col items-center justify-center px-4">

    {{-- Logo --}}
    <div class="flex flex-col items-center mb-8">
        <div class="w-14 h-14 bg-[#B5642A] rounded-2xl flex items-center justify-center mb-4 shadow-md">
            <svg class="w-8 h-8 text-[#FDF9F3]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
            </svg>
        </div>
        <h1 class="text-2xl font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Café Manager</h1>
        <p class="text-sm text-[#A08060] mt-1">Sistema de Gestão de Cafeteria</p>
    </div>

    {{-- Card --}}
    <div class="w-full max-w-md bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm">

        <div class="px-6 py-5 border-b border-[#EDE5D2]">
            <h2 class="text-base font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Recuperar senha</h2>
            <p class="text-xs text-[#A08060] mt-0.5">Enviaremos um link de redefinição para o seu e-mail</p>
        </div>

        <div class="px-6 py-6">

            {{-- Info --}}
            <div class="flex items-start gap-3 bg-[#F5EFE0] border border-[#E2D4B8] rounded-lg px-4 py-3 mb-5">
                <p class="text-xs text-[#7A5A3A] leading-relaxed">
                    Esqueceu sua senha? Informe seu e-mail e enviaremos um link para você criar uma nova senha.
                </p>
            </div>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div class="space-y-1.5">
                    <label for="email" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                        E-mail
                    </label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="seu@email.com"
                           required autofocus
                           class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                  focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                  {{ $errors->has('email') ? 'border-red-300' : 'border-[#D4C4A0]' }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                <hr class="border-[#EDE5D2]">

                {{-- Ações --}}
                <div class="flex items-center justify-between gap-3">
                    <a href="{{ route('login') }}"
                       class="text-xs text-[#A08060] hover:text-[#5C3317] hover:underline transition-colors">
                        Voltar para o login
                    </a>

                    <button type="submit"
                            class="flex items-center gap-2 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-5 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150 shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        Enviar link
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
</x-guest-layout>