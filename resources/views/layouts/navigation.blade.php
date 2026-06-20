<nav x-data="{ open: false }" class="bg-[#1C1008] border-b border-[#3D2010]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-[auto_1fr_auto] sm:grid-cols-3 items-center h-16 gap-4">

            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 shrink-0 justify-self-start">
                <div class="w-9 h-9 bg-[#B5642A] rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#FDF9F3]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                    </svg>
                </div>
                <span class="text-[#E8D5B0] text-sm font-semibold tracking-wide hidden sm:block">Café Manager</span>
            </a>

            <div class="hidden sm:flex items-center justify-center gap-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-md text-sm font-medium transition-all duration-150
                        {{ request()->routeIs('dashboard')
                            ? 'bg-[#B5642A]/20 text-[#C89B5A] border border-[#B5642A]/35'
                            : 'text-[#E8D5B0]/60 border border-transparent hover:text-[#E8D5B0] hover:bg-white/5' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('cafes.index') }}"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-md text-sm font-medium transition-all duration-150
                        {{ request()->routeIs('cafes.*')
                            ? 'bg-[#B5642A]/20 text-[#C89B5A] border border-[#B5642A]/35'
                            : 'text-[#E8D5B0]/60 border border-transparent hover:text-[#E8D5B0] hover:bg-white/5' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                    </svg>
                    Cafés
                </a>

                <a href="{{ route('categorias.index') }}"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-md text-sm font-medium transition-all duration-150
                        {{ request()->routeIs('categorias.*')
                            ? 'bg-[#B5642A]/20 text-[#C89B5A] border border-[#B5642A]/35'
                            : 'text-[#E8D5B0]/60 border border-transparent hover:text-[#E8D5B0] hover:bg-white/5' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                    </svg>
                    Categorias
                </a>

                <a href="{{ route('fornecedores.index') }}"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-md text-sm font-medium transition-all duration-150
                        {{ request()->routeIs('fornecedores.*')
                            ? 'bg-[#B5642A]/20 text-[#C89B5A] border border-[#B5642A]/35'
                            : 'text-[#E8D5B0]/60 border border-transparent hover:text-[#E8D5B0] hover:bg-white/5' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"/>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                        <circle cx="5.5" cy="18.5" r="2.5"/>
                        <circle cx="18.5" cy="18.5" r="2.5"/>
                    </svg>
                    Fornecedores
                </a>
            </div>

            <div class="hidden sm:flex items-center justify-self-end">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-3 py-1.5 rounded-md border border-[#C89B5A]/25 bg-[#B5642A]/10 text-[#C89B5A] text-sm font-medium hover:bg-[#B5642A]/20 transition-all duration-150">
                            <div class="w-6 h-6 rounded-full bg-[#3D2010] flex items-center justify-center text-[11px] font-semibold text-[#C89B5A]">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Perfil') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="flex items-center justify-self-end sm:hidden">
                <button @click="open = !open" class="p-2 rounded-md text-[#E8D5B0]/60 hover:text-[#E8D5B0] hover:bg-white/5 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden border-t border-white/5">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cafes.index')" :active="request()->routeIs('cafes.*')">Cafés</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">Categorias</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('fornecedores.index')" :active="request()->routeIs('fornecedores.*')">Fornecedores</x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-3 border-t border-white/5 px-4">
            <div class="text-[#E8D5B0] font-medium text-sm">{{ Auth::user()->name }}</div>
            <div class="text-[#C89B5A]/50 text-xs mt-0.5">{{ Auth::user()->email }}</div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">Perfil</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">Sair</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>