<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filmes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-gray-900 dark:text-gray-100">
                <h1>Minha lista de filmes:</h1>

                    @foreach(Auth::user()->meusFilmes as $filme)

                    <div class="flex justify-between border-b mb-2 gap-4
                    hover:bg-gray-300 "
                    x-data="{showDelete : false , showEdit : false}">
                            
                            <div class="flex justify-between flex-grow gap-6">
                                <div>Filme: {{$filme->titulo}}</div>
                                <div>Diretor: {{$filme->diretor}}</div>
                                <div>Gênero: {{$filme->genero}}</div>
                                <div>Ano de lançamento: {{$filme->ano}}</div>
                                <div>Classificação indicativa: {{$filme->classificacao}}</div>
                    
                            </div>
                  

                            <div class="flex gap-2">
                                <div>
                                    <span class=" cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true "> Apagar </span>
                                </div>
                                <div>
                                    <span class=" cursor-pointer px-2 bg-blue-500 text-white" @click=" showEdit = true ">Editar</span>
                                </div>
                            </div>
                            
                            <template x-if="showEdit">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-gray-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                                <form class="my-4" action="{{ route('filmes.update', $filme) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-text-input name="titulo" placeholder="titulo" value="{{$filme->titulo}}"/>
                                                    <x-text-input name="diretor" placeholder="diretor" value="{{$filme->diretor}}"/>
                                                    <x-text-input name="genero" placeholder="genero" value="{{$filme->genero}}"/>
                                                    <x-text-input name="ano" placeholder="ano" value="{{$filme->ano}}"/>
                                                    <label name="classificacao">Qual a classificação indicativa?</label>
                                                        <select name="classificacao">
                                                          <option>Livre</option>
                                                          <option>10 anos</option>
                                                          <option>12 anos</option>
                                                          <option>14 anos</option>
                                                          <option>16 anos</option>
                                                          <option>18 anos</option>
                                                         </select>
                                                   
                                                    <x-primary-button class="w-full text-center mt-2"> Salvar </x-primary-button>
                                                </form>
                                            <x-danger-button @click=" showEdit = false " class="w-full bg-gray bg-opacity-50">Cancelar</x-danger-botton>
                                        
                                    </div>
                                </div>
                            </template>

                            <template x-if="showDelete">
                                <div class="absolute top-0 bottom-0 left-0 rigth-0 bg-gray-800 bg-opacity-20 z-0">
                                    <div class="w-96 bg-white p-4 absolute left-1/4 rigth-1/4 top-1/4 botton-1/4 z-10">
                                        <h2 class="text-xl font-bold text-center">tem certeza?</h2>
                                        <div class="flex justify-between mt-4">
                                                <form action="{{ route('filmes.destroy', $filme) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button>sim, desejo apagar </x-danger-button>
                                                </form>
                                            <x-primary-button @click="showDelete = false">Cancelar</x-primary-botton>
                                        </div>
                                        
                                    </div>
                                </div>
                            </template>
                            
                            </div>
                        





                        @endforeach

                        <form action="{{ route('filmes.store') }}" method="POST">
                        @csrf
                        <x-text-input name="titulo" placeholder="titulo"/>
                        <x-text-input name="diretor" placeholder="diretor"/>
                        <x-text-input name="genero" placeholder="genero"/>
                        <x-text-input name="ano" placeholder="ano"/>
                        <label name="classificacao">Qual a classificação indicativa?</label>
                        <select name="classificacao">
                            <option>Livre</option>
                            <option>10 anos</option>
                            <option>12 anos</option>
                            <option>14 anos</option>
                            <option>16 anos</option>
                            <option>18 anos</option>
                        </select>
                        <x-primary-button>Salvar</x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>