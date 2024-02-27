<x-app-layout>
<div class="md:max-w-full mx-auto p-6 lg:p-8">
    <div class="grid grid-cols-1 content-center gap-6 lg:gap-8 scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
    
        <h1>Filtrar</h1>

        <form action="" method="get" class="md:grid md:grid-cols-5">
            <div>
                <x-input-label for="codigo" :value="__('Código')" />
                <x-text-input id="codigo" class="block mt-1 w-72" type="search" name="codigo" />
            </div>

            <div>
                <x-input-label for="descricao" :value="__('Descrição')" />
                <x-text-input id="descricao" class="block mt-1 w-72" type="search" name="descricao" />
            </div>

            <div>
                <x-input-label for="setor" :value="__('Setor')" />
                <select class="block mt-1 w-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="setor" id="setor">
                    <option value="Diretoria">Diretoria</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Informatica">Informatica</option>
                    <option value="Juridico">Jurídico</option>
                    <option value="Licitacao">Licitacao</option>
                    <option value="Recepcao">Recepção</option>
                    <option value="Recrutamento">Recrutamento</option>
                    <option value="RH">RH</option>
                </select>
            </div>

            <div>
                <x-input-label for="categoria" :value="__('Categoria')" />
                <select class="block mt-1 w-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="categoria" id="categoria">
                    <option value="Computadores">Computadores</option>
                    <option value="Moveis">Móveis</option>
                    <option value="Notebooks">Notebooks</option>
                    <option value="Perifericos">Periféricos</option>
                    <option value="Utensilios">Utensilios</option>
                    <option value="Veiculos">Veículos</option>
                </select>
            </div>
            
            <div>
            
                <x-primary-button class="mt-7 w-32">{{ __('Filtrar') }}</x-primary-button>
            </div>
            
        </form>
    </div>

    <div class="flex justify-center">
        <h1>Controle de Patrimonio</h1>   
    </div>

    @foreach ($cadastros as $cadastro)
    <div class="md:flex md:mb-2 content-center scale-100 p-2 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        
        <div class="md:w-1/2">
            <div class="flex">
                <h4 class="text-xs">Data:</h4>
                <p class="ml-1 text-xs font-bold">{{$cadastro->updated_at}}</p>
            </div>
            <div class="flex">
                <h4 class="text-xs">Código:</h4>
                <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->codigo}}</p>
            </div>
            <div class="flex">
                <h4 class="text-xs">Estado:</h4>
                <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->estado}}</p>
            </div>
            <div class="flex">
                <h4 class="text-xs">Descrição:</h4>
                <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->descricao}}</p>
            </div>
            <div class="flex">
                <h4 class="text-xs">Colaborador:</h4>
                <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->colaborador}}</p>
            </div>
            <div class="flex">
                <h4 class="text-xs">Observações:</h4>
                <p class="ml-1 text-xs font-bold">{{$cadastro->observacoes}}</p>
            </div>
        </div>
           
        <div class="md:flex-col md:w-1/2">
            <div class="flex">
                    <h4 class="text-xs">Marca:</h4>
                    <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->marca}}</p>
                </div>
                <div class="flex">
                    <h4 class="text-xs">Modelo:</h4>
                    <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->modelo}}</p>
                </div>
                <div class="flex">
                    <h4 class="text-xs">Categoria:</h4>
                    <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->categoria}}</p>
                </div>
                <div class="flex">
                    <h4 class="text-xs">Setor:</h4>
                    <p class="ml-1 text-xs font-bold uppercase">{{$cadastro->setor}}</p>
                </div>
                <div class="flex">
                    <h4 class="text-xs">Valor:</h4>
                    <p class="ml-1 text-xs font-bold uppercase">R$ {{$cadastro->valor}}</p>
                </div>
                <div class="flex justify-end">
                    <x-dropdown align="card" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 border border-transparent text-sm  font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>Opções</div>

                                <div class="ms-1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-xs flex">
                                {{ __('Editar') }} <i class="fa-regular fa-pen-to-square ml-2 mt-1"></i>
                            </x-dropdown-link>
                            
                            <x-dropdown-link :href="route('profile.edit')" class="text-xs flex">
                                {{ __('Excluir') }} <i class="fa-regular fa-trash-can ml-2 mt-1"></i>
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
        </div>
    </div>
        
    @endforeach

</div>
</x-app-layout>