<x-app-layout>
<div class="md:max-w-full mx-auto p-6 lg:p-8">
    <div class="flex justify-center">
        <h1>Controle de Patrimonio</h1>   
    </div>

    <div class="grid grid-cols-1 content-center gap-6 lg:gap-8 scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        <table class="table-fixed border-collapse border border-slate-400">
        <thead>
            <tr class="table-fixed">
                <th class="p-1 border border-slate-700">Código</th>
                <th class="p-1 border border-slate-700">Descrição</th>
                <th class="p-1 border border-slate-700">Marca</th>
                <th class="p-1 border border-slate-700">Modelo</th>
                <th class="p-1 border border-slate-700">Colaborador</th>
                <th class="p-1 border border-slate-700">Valor</th>
                <th class="p-1 border border-slate-700">Estado</th>
                <th class="p-1 border border-slate-700">Setor</th>
                <th class="p-1 border border-slate-700">Categoria</th>
                <th class="p-1 collapse md:visible border border-slate-700">Observações</th>
            </tr>
        <thead>
            <tbody>
            @foreach ($cadastros as $cadastro)
                <tr>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->codigo}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->descricao}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->marca}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->modelo}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->colaborador}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->valor}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->estado}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->setor}}</td>
                    <td class="p-1 text-sm border border-slate-300">{{$cadastro->categoria}}</td>
                    <td class="p-1 collapse md:visible text-sm border border-slate-300">{{$cadastro->observacoes}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
</x-app-layout>