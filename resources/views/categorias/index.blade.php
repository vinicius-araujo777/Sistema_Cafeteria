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
                    <h1 class="text-lg font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Categorias</h1>
                    <p class="text-xs text-[#A08060] mt-0.5">Organize os cafés por categoria</p>
                </div>
                <a href="{{ route('categorias.create') }}"
                    class="flex items-center gap-1.5 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-150">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Nova Categoria
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-[#5C3317] border-b border-[#E2D4B8]">
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A] ">#</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A] ">Categoria</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A] ">Descrição</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A] ">Produtos</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wide text-[#E8D89A] ">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorias as $categoria)
                            <tr class="border-b border-[#F0E8D8] last:border-0 hover:bg-[#FBF7F0] transition-colors duration-100">

                                <td class="px-4 py-3 text-xs font-medium text-[#B0906A] text-center">
                                    {{ str_pad($categoria->id, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center pl-14 gap-2.5">
                                        <div class="w-9 h-9 rounded-lg bg-[#5C3317]/10 border border-[#E2D4B8] flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4 text-[#5C3317]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                                                <line x1="7" y1="7" x2="7.01" y2="7"/>
                                            </svg>
                                        </div>
                                        <p class="text-sm font-medium text-[#1C1008]">{{ $categoria->nome }}</p>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    @if($categoria->descricao)
                                        <p class="text-sm text-[#8A6A48] max-w-[280px] truncate mx-auto">{{ $categoria->descricao }}</p>
                                    @else
                                        <span class="text-sm text-[#C0A880] italic mx-auto">Sem descrição</span>
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#E8EEF5] text-[#3A5A8B]">
                                        {{ $categoria->cafes_count }} {{ Str::plural('café', $categoria->cafes_count) }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('categorias.edit', $categoria->id) }}"
                                            class="flex items-center gap-1 px-3 py-1.5 rounded-md text-xs font-medium
                                                bg-[#C89B5A]/12 text-[#5C3317] border border-[#C89B5A]/30
                                                hover:bg-[#C89B5A]/20 hover:text-[#1C1008] transition-all duration-100">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                            </svg>
                                            Editar
                                        </a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Excluir a categoria {{ addslashes($categoria->nome) }}?')"
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
                                <td colspan="5" class="px-4 py-16 text-center">
                                    <svg class="w-12 h-12 text-[#C89B5A] opacity-30 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                                    </svg>
                                    <p class="text-sm text-[#A08060] mb-4">Nenhuma categoria cadastrada ainda.</p>
                                    <a href="{{ route('categorias.create') }}"
                                        class="inline-flex items-center gap-1.5 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-150">
                                        Criar a primeira categoria
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