@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#F5EFE0] py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-1.5 text-sm text-[#A08060] mb-5">
            <a href="{{ route('cafes.index') }}" class="hover:text-[#B5642A] transition-colors">Cafés</a>
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            <span class="text-[#B5642A]">Editar</span>
        </nav>

        <div class="bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden">
            <div class="flex items-start justify-between px-6 py-5 border-b border-[#EDE5D2]">
                <div>
                    <h1 class="text-lg font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Editar Café</h1>
                    <p class="text-xs text-[#A08060] mt-1">Atualize as informações do produto</p>
                </div>
                <span class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#F0E6D0] border border-[#D4C090] text-xs font-medium text-[#5C3317]">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    ID #{{ str_pad($cafe->id, 4, '0', STR_PAD_LEFT) }}
                </span>
            </div>

            <div class="px-6 py-4">
                <form action="{{ route('cafes.update', $cafe->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div class="space-y-1.5">
                        <label for="nome" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                            Nome do Café
                        </label>
                        <input type="text" name="nome" id="nome"
                            value="{{ old('nome', $cafe->nome) }}"
                            placeholder="Ex: Espresso Clássico"
                            class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880] focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                            {{ $errors->has('nome') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                            required>
                        @error('nome')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label for="descricao" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                            Descrição <span class="normal-case font-normal text-[#B0906A]">(opcional)</span>
                        </label>
                        <input type="text" name="descricao" id="descricao"
                            value="{{ old('descricao', $cafe->descricao) }}"
                            placeholder="Ex: Grão arábica 100%, notas de chocolate"
                            class="w-full px-3 py-2.5 rounded-lg border border-[#D4C4A0] text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880] focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all">
                        @error('descricao')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="categoria_id" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                                Categoria
                            </label>
                            <select name="categoria_id" id="categoria_id"
                                    class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                    {{ $errors->has('categoria_id') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                                    required>
                                <option value="">Selecione...</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id', $cafe->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">Torra</label>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['clara' => ['Clara','#F5E8C0','#D4C090'], 'media' => ['Média','#C4893A','#A06828'], 'escura' => ['Escura','#2E1A0E','#1C1008']] as $val => [$label, $dotBg, $dotBorder])
                                    <label class="cursor-pointer">
                                        <input type="radio" name="torra" value="{{ $val }}"
                                            {{ old('torra', $cafe->torra) == $val ? 'checked' : '' }}
                                            class="peer sr-only" required>
                                        <div class="flex flex-col items-center gap-1.5 p-3 rounded-lg border border-[#D4C4A0] bg-[#FDF9F3]
                                                    peer-checked:border-[#B5642A] peer-checked:bg-[#B5642A]/8 peer-checked:ring-2 peer-checked:ring-[#B5642A]/20
                                                    hover:border-[#C89B5A] transition-all">
                                            <span class="w-4 h-4 rounded-full border-2"
                                                style="background:{{ $dotBg }};border-color:{{ $dotBorder }}"></span>
                                            <span class="text-xs font-medium text-[#7A5A3A]">{{ $label }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            @error('torra')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="preco_por_kg" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                                Preço por kg
                            </label>
                            <div class="flex">
                                <span class="px-3 py-2.5 bg-[#F0E8D8] border border-[#D4C4A0] border-r-0 rounded-l-lg text-sm font-medium text-[#8A6A48]">
                                    R$
                                </span>
                                <input type="number" name="preco_por_kg" id="preco_por_kg"
                                    step="0.01" min="0"
                                    value="{{ old('preco_por_kg', $cafe->preco_por_kg) }}"
                                    placeholder="0,00"
                                    class="flex-1 px-3 py-2.5 rounded-r-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                            focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                            {{ $errors->has('preco_por_kg') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                                    required>
                            </div>
                            @error('preco_por_kg')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="estoque_kg" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                                Estoque atual
                            </label>
                            <div class="flex">
                                <input type="number" name="estoque_kg" id="estoque_kg"
                                    step="0.01" min="0"
                                    value="{{ old('estoque_kg', $cafe->estoque_kg) }}"
                                    placeholder="0,00"
                                    class="flex-1 px-3 py-2.5 rounded-l-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880] focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                        {{ $errors->has('estoque_kg') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                                    required>
                                <span class="px-3 py-2.5 bg-[#F0E8D8] border border-[#D4C4A0] border-l-0 rounded-r-lg text-sm font-medium text-[#8A6A48]">
                                    kg
                                </span>
                            </div>
                            @error('estoque_kg')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="border-[#EDE5D2] my-2">

                    <div class="flex items-center gap-3">
                        <button type="submit"
                                class="flex items-center gap-2 bg-[#B5642A] hover:bg-[#5C3317] text-[#FDF9F3] px-5 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                <polyline points="17 21 17 13 7 13 7 21"/>
                                <polyline points="7 3 7 8 15 8"/>
                            </svg>
                            Salvar Alterações
                        </button>
                        <a href="{{ route('cafes.index') }}"
                        class="flex items-center px-4 py-2.5 rounded-lg border border-[#D4C4A0] text-sm font-medium text-[#8A6A48] hover:bg-[#F0E8D8] hover:text-[#1C1008] transition-all duration-150">
                            Cancelar
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection