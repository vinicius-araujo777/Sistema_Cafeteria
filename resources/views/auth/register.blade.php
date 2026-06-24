<x-guest-layout>
<div class="min-h-screen bg-[#F5EFE0] flex flex-col items-center justify-center px-4 py-8">

    {{-- Logo --}}
    <div class="flex flex-col items-center mb-8">
        <img src="{{ asset('images/logoLogin.png') }}" alt="Rota do Café" class="h-28 object-contain">
        <p class="text-sm text-[#A08060] mt-1">Sistema de Gestão de Cafeteria</p>
    </div>

    {{-- Card --}}
    <div class="w-full max-w-md bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm">

        <div class="px-6 pt-6 pb-4 border-b border-[#EDE5D2]">
            <h2 class="text-base font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Criar conta</h2>
            <p class="text-xs text-[#A08060] mt-0.5">Preencha os dados para se cadastrar</p>
        </div>

        <div class="px-6 pb-6 pt-4">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- Nome --}}
                <div class="space-y-1.5">
                    <label for="name" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                        Nome
                    </label>
                    <input id="name" type="text" name="name"
                           value="{{ old('name') }}"
                           placeholder="Seu nome completo"
                           required autofocus autocomplete="name"
                           class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                  focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                  {{ $errors->has('name') ? 'border-red-300' : 'border-[#D4C4A0]' }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-600" />
                </div>

                {{-- Email --}}
                <div class="space-y-1.5">
                    <label for="email" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                        E-mail
                    </label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="seu@email.com"
                           required autocomplete="username"
                           class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                  focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                  {{ $errors->has('email') ? 'border-red-300' : 'border-[#D4C4A0]' }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                {{-- Senha + Confirmar senha --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pb-2 pt-2">

                    <div class="space-y-1.5">
                        <label for="password" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                            Senha
                        </label>
                        <input id="password" type="password" name="password"
                               placeholder="••••••••"
                               required autocomplete="new-password"
                               class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                      focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                      {{ $errors->has('password') ? 'border-red-300' : 'border-[#D4C4A0]' }}">
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600" />
                    </div>

                    <div class="space-y-1.5">
                        <label for="password_confirmation" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                            Confirmar Senha
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               placeholder="••••••••"
                               required autocomplete="new-password"
                               class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                      focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                      {{ $errors->has('password_confirmation') ? 'border-red-300' : 'border-[#D4C4A0]' }}">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-600" />
                    </div>

                </div>

                <hr class="border-[#EDE5D2]">

                {{-- Ações --}}
                <div class="flex items-center justify-between gap-3">
                    <a href="{{ route('login') }}"
                       class="text-xs text-[#A08060] hover:text-[#5C3317] hover:underline transition-colors">
                        Já tem conta? Entrar
                    </a>

                    <button type="submit"
                            class="flex items-center gap-2 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-5 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150 shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <line x1="19" y1="8" x2="19" y2="14"/>
                            <line x1="22" y1="11" x2="16" y2="11"/>
                        </svg>
                        Criar conta
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
</x-guest-layout>