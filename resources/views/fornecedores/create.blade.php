@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#E8DFD3] py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-1.5 text-sm text-[#A08060] mb-5">
            <a href="{{ route('fornecedores.index') }}" class="hover:text-[#B5642A] transition-colors">Fornecedores</a>
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            <span class="text-[#B5642A]">Novo Fornecedor</span>
        </nav>

        <div class="bg-[#FDF9F3] rounded-xl border border-[#E2D4B8] overflow-hidden">
            <div class="px-6 py-5 border-b border-[#EDE5D2]">
                <h1 class="text-lg font-semibold text-[#1C1008]" style="font-family: Georgia, serif;">Adicionar Fornecedor</h1>
                <p class="text-xs text-[#A08060] mt-1">Cadastre um novo fornecedor de café</p>
            </div>

            <div class="px-6 py-6">
                <form action="{{ route('fornecedores.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="space-y-1.5">
                        <label for="nome" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                            Nome do Fornecedor
                        </label>
                        <input type="text" name="nome" id="nome"
                            value="{{ old('nome') }}"
                            placeholder="Ex: Fazenda Serra Verde"
                            class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880] focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                            {{ $errors->has('nome') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                            required>
                        @error('nome')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label for="telefone" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                            Telefone
                        </label>
                        <input type="number" name="telefone" id="telefone"
                            minlength="10" maxlength="11"
                            placeholder="(00) 00000-0000"
                            class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880]
                                focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                {{ $errors->has('telefone') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                            required>
                        @error('telefone')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-[1fr_120px] gap-5">
                        <div class="space-y-1.5">
                            <label for="cidade" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                                Cidade
                            </label>
                            <input type="text" name="cidade" id="cidade"
                                value="{{ old('cidade') }}"
                                placeholder="Ex: Belo Horizonte"
                                class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880] focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                {{ $errors->has('cidade') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                                required>
                            @error('cidade')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="estado" class="block text-[11px] font-semibold uppercase tracking-wide text-[#7A5A3A]">
                                Estado
                            </label>
                            <input type="text" name="estado" id="estado"
                                value="{{ old('estado') }}"
                                maxlength="2"
                                placeholder="MG"
                                style="text-transform: uppercase;"
                                class="w-full px-3 py-2.5 rounded-lg border text-sm text-[#1C1008] bg-[#FDF9F3] placeholder-[#C0A880] text-center font-medium focus:outline-none focus:ring-2 focus:ring-[#B5642A]/30 focus:border-[#B5642A] transition-all
                                {{ $errors->has('estado') ? 'border-red-300' : 'border-[#D4C4A0]' }}"
                                required>
                            @error('estado')
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
                            Salvar Fornecedor
                        </button>
                        <a href="{{ route('fornecedores.index') }}"
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