@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#E8DFD3] py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        {{-- Header --}}
        <div>
            <h1 class="text-2xl font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Dashboard</h1>
            <p class="text-sm text-[#A08060] mt-1">Bem-vindo, {{ Auth::user()->name }}. Aqui está o resumo do sistema.</p>
        </div>

        {{-- Cards de resumo --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

            {{-- Card Cafés --}}
            <div class="bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm">
                <div class="flex items-center justify-between px-5 py-4 border-b border-[#EDE5D2]">
                    <span class="text-xs font-semibold uppercase tracking-wide text-[#8A6A48]">Total de Cafés</span>
                    <div class="w-8 h-8 rounded-lg bg-[#B5642A]/15 flex items-center justify-center">
                        <svg class="w-4 h-4 text-[#B5642A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                        </svg>
                    </div>
                </div>
                <div class="px-5 py-4">
                    <p class="text-3xl font-bold text-[#1C1008]">{{ $totalCafes }}</p>
                    <a href="{{ route('cafes.index') }}"
                       class="inline-flex items-center gap-1 text-xs text-[#B5642A] hover:text-[#5C3317] mt-2 transition-colors">
                        Ver todos
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>
            </div>

            {{-- Card Categorias --}}
            <div class="bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm">
                <div class="flex items-center justify-between px-5 py-4 border-b border-[#EDE5D2]">
                    <span class="text-xs font-semibold uppercase tracking-wide text-[#8A6A48]">Categorias</span>
                    <div class="w-8 h-8 rounded-lg bg-[#5C3317]/10 flex items-center justify-center">
                        <svg class="w-4 h-4 text-[#5C3317]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                            <line x1="7" y1="7" x2="7.01" y2="7"/>
                        </svg>
                    </div>
                </div>
                <div class="px-5 py-4">
                    <p class="text-3xl font-bold text-[#1C1008]">{{ $totalCategorias }}</p>
                    <a href="{{ route('categorias.index') }}"
                       class="inline-flex items-center gap-1 text-xs text-[#B5642A] hover:text-[#5C3317] mt-2 transition-colors">
                        Ver todas
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>
            </div>

            {{-- Card Fornecedores --}}
            <div class="bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm">
                <div class="flex items-center justify-between px-5 py-4 border-b border-[#EDE5D2]">
                    <span class="text-xs font-semibold uppercase tracking-wide text-[#8A6A48]">Fornecedores</span>
                    <div class="w-8 h-8 rounded-lg bg-[#C89B5A]/15 flex items-center justify-center">
                        <svg class="w-4 h-4 text-[#C89B5A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <rect x="1" y="3" width="15" height="13"/>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                            <circle cx="5.5" cy="18.5" r="2.5"/>
                            <circle cx="18.5" cy="18.5" r="2.5"/>
                        </svg>
                    </div>
                </div>
                <div class="px-5 py-4">
                    <p class="text-3xl font-bold text-[#1C1008]">{{ $totalFornecedores }}</p>
                    <a href="{{ route('fornecedores.index') }}"
                       class="inline-flex items-center gap-1 text-xs text-[#B5642A] hover:text-[#5C3317] mt-2 transition-colors">
                        Ver todos
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>
            </div>

        </div>

        {{-- Tabela últimos cafés --}}
        <div class="bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm">

            <div class="flex items-center justify-between px-6 py-4 border-b border-[#EDE5D2]">
                <div>
                    <h2 class="text-base font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Últimos Cafés Cadastrados</h2>
                    <p class="text-xs text-[#A08060] mt-0.5">Os 5 cafés adicionados mais recentemente</p>
                </div>
                <a href="{{ route('cafes.index') }}"
                   class="flex items-center gap-1.5 text-xs font-medium text-[#B5642A] hover:text-[#5C3317] border border-[#C89B5A]/30 bg-[#C89B5A]/10 hover:bg-[#C89B5A]/20 px-3 py-1.5 rounded-lg transition-all">
                    Ver catálogo completo
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-[#5C3317]">
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">#</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Produto</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Categoria</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Torra</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Preço / kg</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Estoque</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ultimosCafes as $cafe)
                            <tr class="border-b border-[#F0E8D8] last:border-0 hover:bg-[#FBF7F0] transition-colors duration-100">

                                <td class="px-4 py-3 text-xs font-medium text-[#B0906A] text-center">
                                    {{ str_pad($cafe->id, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center gap-2.5">
                                        <div class="w-8 h-8 rounded-lg bg-[#C89B5A]/15 border border-[#E2D4B8] flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4 text-[#B5642A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                                                <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                                            </svg>
                                        </div>
                                        <div class="text-left">
                                            <p class="text-sm font-medium text-[#1C1008]">{{ $cafe->nome }}</p>
                                            @if($cafe->descricao)
                                                <p class="text-xs text-[#A08060] max-w-[180px] truncate">{{ $cafe->descricao }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#F0E6D0] text-[#5C3317]">
                                        {{ $cafe->categoria->nome }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    @if($cafe->torra === 'clara')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#FEF9EE] text-[#8A6A20] border border-[#E8D89A]">
                                            <span class="w-2 h-2 rounded-full bg-[#E8D89A] border border-[#D4C090]"></span>Clara
                                        </span>
                                    @elseif($cafe->torra === 'media')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#F5E6D0] text-[#7A4820] border border-[#D4B890]">
                                            <span class="w-2 h-2 rounded-full bg-[#C4893A]"></span>Média
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#3D2010] text-[#C89B5A] border border-[#5C3317]">
                                            <span class="w-2 h-2 rounded-full bg-[#C89B5A]"></span>Escura
                                        </span>
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-center text-sm font-semibold text-[#1C1008]">
                                    R$ {{ number_format($cafe->preco_por_kg, 2, ',', '.') }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    @if($cafe->estoque_kg <= 5)
                                        <span class="text-sm font-medium text-[#C05030]">
                                            {{ number_format($cafe->estoque_kg, 2, ',', '.') }} kg
                                            <span class="text-xs font-normal"> — baixo</span>
                                        </span>
                                    @else
                                        <span class="text-sm text-[#6A8A6A]">
                                            {{ number_format($cafe->estoque_kg, 2, ',', '.') }} kg
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center">
                                    <svg class="w-10 h-10 text-[#C89B5A] opacity-30 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                                    </svg>
                                    <p class="text-sm text-[#A08060]">Nenhum café cadastrado ainda.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection