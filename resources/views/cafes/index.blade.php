@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#E8DFD3] py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="flex items-center gap-2 bg-[#EAF3E8] border border-[#B0D4A8] text-[#2D5E27] px-4 py-3 rounded-lg mb-5 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center gap-2 bg-[#F5ECEC] border border-[#E0B8B8] text-[#7A2020] px-4 py-3 rounded-lg mb-5 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden shadow-sm mt-4">
            <div class="flex items-center justify-between px-6 py-4 border-b border-[#EDE5D2]">
                <div>
                    <h1 class="text-xl font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Cafés</h1>
                    <p class="text-sm text-[#A08060] mt-0.5">Gerencie o catálogo de cafés</p>
                </div>
                <a href="{{ route('cafes.create') }}"
                    class="flex items-center gap-1.5 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-150">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Adicionar Café
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-[#5C3317] border-b border-[#E2D4B8]">
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">#</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Produto</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Categoria</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Torra</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Preço / kg</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Estoque</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A]">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cafes as $cafe)
                            <tr class="border-b border-[#F0E8D8] last:border-0 hover:bg-[#FBF7F0] transition-colors duration-100">

                                <td class="text-center px-4 py-3 text-xs font-medium text-[#B0906A]">
                                    {{ str_pad($cafe->id, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center pl-8 gap-2.5">
                                        <div class="w-9 h-9 rounded-lg bg-[#C89B5A]/15 border border-[#E2D4B8] flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4 text-[#B5642A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                                                <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                                            </svg>
                                        </div>
                                        <div class="text-left">
                                            <p class="text-sm font-medium text-[#1C1008]">{{ $cafe->nome }}</p>
                                            @if($cafe->descricao)
                                                <p class="text-xs text-[#A08060] mt-0.5 max-w-[200px] truncate">{{ $cafe->descricao }}</p>
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
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-medium bg-[#FFF4E9] text-[#8A6A20] border border-[#E8D89A]">
                                            <span class="w-2 h-2 rounded-full bg-[#E4C134] border border-[#D4C090]"></span>
                                            Clara
                                        </span>
                                    @elseif($cafe->torra === 'media')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-medium bg-[#F5E6D0] text-[#7A4820] border border-[#D4B890]">
                                            <span class="w-2 h-2 rounded-full bg-[#C4893A]"></span>
                                            Média
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-medium bg-[#3D2010] text-[#C89B5A] border border-[#5C3317]">
                                            <span class="w-2 h-2 rounded-full bg-[#C89B5A]"></span>
                                            Escura
                                        </span>
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-sm font-semibold text-[#1C1008] text-center">
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

                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('cafes.edit', $cafe->id) }}"
                                            class="flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-medium
                                                bg-[#C89B5A]/12 text-[#5C3317] border border-[#C89B5A]/30
                                                hover:bg-[#C89B5A]/20 hover:text-[#1C1008] transition-all duration-100">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                            </svg>
                                            Editar
                                        </a>
                                        <form action="{{ route('cafes.destroy', $cafe->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Excluir o café {{ addslashes($cafe->nome) }}?')"
                                                    class="flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-medium
                                                        bg-red-50 text-red-700 border border-red-200
                                                        hover:bg-red-100 transition-all duration-100">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <polyline points="3 6 5 6 21 6"/>
                                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                                    <path d="M10 11v6"/><path d="M14 11v6"/>
                                                </svg>
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-16 text-center">
                                    <svg class="w-12 h-12 text-[#C89B5A] opacity-30 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path d="M17 8h1a4 4 0 1 1 0 8h-1"/>
                                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/>
                                    </svg>
                                    <p class="text-sm text-[#A08060] mb-4">Nenhum café cadastrado ainda.</p>
                                    <a href="{{ route('cafes.create') }}"
                                        class="inline-flex items-center gap-1.5 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-150">
                                        Adicionar o primeiro café
                                    </a>
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