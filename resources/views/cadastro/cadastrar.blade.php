<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <h1>Controle de Patrimonio</h1>   
        </div>
        <br>
        <form action="{{ route('cadastrar.new') }}" method="POST">
            @csrf
            <div class="mt-1">
                <div>
                    <h2 class="mb-3 text-xl font-semibold text-gray-900 dark:text-white">Cadastrar</h2>

                    <div class="grid grid-cols-1 content-center md:grid-cols-2 gap-6 lg:gap-8 scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        
                        <div>
                            <x-input-label for="codigo" :value="__('Código')" />
                            <x-text-input id="codigo" class="block mt-1 w-72" type="text" name="codigo" />
                        </div>
                        <div>
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <x-text-input id="descricao" class="block mt-1 w-72" type="text" name="descricao"  required autofocus />
                        </div>  
                        <div>
                            <x-input-label for="marca" :value="__('Marca')" />
                            <x-text-input id="marca" class="block mt-1 w-72" type="text" name="marca" />
                        </div>
                        <div>
                            <x-input-label for="modelo" :value="__('Modelo')" />
                            <x-text-input id="modelo" class="block mt-1 w-72" type="text" name="modelo" />
                        </div>        
                        <div>
                            <x-input-label for="colaborador" :value="__('Colaborador')" />
                            <x-text-input id="colaborador" class="block mt-1 w-72" type="text" name="colaborador" />
                        </div>
                        <div>
                            <x-input-label for="valor" :value="__('Valor')" />
                            <x-text-input id="valor" class="block mt-1 w-72" type="text" name="valor" />
                        </div>        
                        <div>
                            <x-input-label for="estado" :value="__('Estado')" />
                            <select class="block mt-1 w-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="estado" id="estado">
                                <option value="Usado">Usado</option>
                                <option value="Novo">Novo</option>
                            </select>
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
                            <x-input-label for="observacoes" :value="__('Observações')" />
                            <textarea class="block mt-1 w-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            name="observacoes" id="observacoes" cols="30" rows="2"></textarea>
                        </div>
                        
                        <x-primary-button class="md:col-span-2 py-4">{{ __('Save') }}</x-primary-button>
                    
                    </div> 
                </div>
            </div>
        </form>
        
        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                <div class="flex items-center gap-4">
                    <a href="https://github.com/edutronicos" target="blank" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <i class="fa-brands fa-github"></i> - Github
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Edutronicos @ 2024
            </div>
        </div>
        
    </div>
</x-app-layout>