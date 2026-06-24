<x-guest-layout>
<div class="min-h-screen bg-[#F5EFE0] flex flex-col items-center justify-center px-4">

    {{-- Logo --}}
    <div class="flex flex-col items-center mb-8">
        <img src="{{ asset('images/logoLogin.png') }}" alt="Rota do Café" class="h-28 object-contain">
        <p class="text-sm text-[#A08060] mt-1">Sistema de Gestão de Cafeteria</p>
    </div>

    {{-- Card --}}
    <div class="w-full max-w-md bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm">

        <div class="px-6 pt-6 pb-4 border-b border-[#EDE5D2]">
            <h2 class="text-base font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Entrar na conta</h2>
            <p class="text-xs text-[#A08060] mt-0.5">Bem-vindo de volta</p>
        </div>

        <div class="px-6 pb-6 pt-4">

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- Email --}}
                <div class="space-y-1.5">
                    <label for="email" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                        E-mail
                    </label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="seu@email.com"
                           required autofocus autocomplete="username"
                           class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                  focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                  {{ $errors->has('email') ? 'border-red-300' : 'border-[#D4C4A0]' }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                {{-- Senha --}}
                <div class="space-y-1.5">
                    <label for="password" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                        Senha
                    </label>
                    <input id="password" type="password" name="password"
                           placeholder="••••••••"
                           required autocomplete="current-password"
                           class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                  focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                  {{ $errors->has('password') ? 'border-red-300' : 'border-[#D4C4A0]' }}">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600" />
                </div>

                {{-- Lembrar-me --}}
                <div class="flex items-center gap-2 pb-2 pt-2">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="w-4 h-4 rounded border-[#D4C4A0] text-[#B5642A] focus:ring-[#B5642A]/30 bg-[#FDF9F3]">
                    <label for="remember_me" class="text-sm text-[#8A6A48] cursor-pointer">
                        Lembrar-me
                    </label>
                </div>

                <hr class="border-[#EDE5D2]">

                {{-- Ações --}}
                <div class="flex items-center justify-between gap-3">
                    <div class="flex flex-col gap-1">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-xs text-[#B5642A] hover:text-[#5C3317] hover:underline transition-colors">
                                Esqueceu sua senha?
                            </a>
                        @endif
                        <a href="{{ route('register') }}"
                           class="text-xs text-[#A08060] hover:text-[#5C3317] hover:underline transition-colors">
                            Não tem conta? Cadastre-se
                        </a>
                    </div>

                    <button type="submit"
                            class="flex items-center gap-2 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-5 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150 shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                            <polyline points="10 17 15 12 10 7"/>
                            <line x1="15" y1="12" x2="3" y2="12"/>
                        </svg>
                        Entrar
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
</x-guest-layout>