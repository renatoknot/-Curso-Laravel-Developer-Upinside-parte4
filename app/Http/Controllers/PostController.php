<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Quando se usa softDeletes deve-se atentar aos seguintes itens
     * Campo na tabela: Através da migration você pode invocar o $table->softDeletes();
     * Leitura: Você pode optar por 3 formatos
     *      Post::all() Retorna o coletivo de artigos válidos (não exclusos)
     *      Post::onlyTrashed()->get() Retorna o coletivo de artigos que foram marcados como exclusos
     *      Post::withTrashed()->get() Retorna o coletivo de todos os artigos (exclusos e não exclusos)
     *
     * Remoção da base: forceDelete()
     * Restauração do registro: restore()
     */

    public function forceDelete($post)
    {
        Post::onlyTrashed()->where(['id' => $post])->forceDelete();
        return redirect()->route('posts.trashed');
    }

    public function restore($post)
    {
        $post = Post::onlyTrashed()->where(['id' => $post])->first();

        if($post->trashed()){
            $post->restore();
        }

        return redirect()->route('posts.trashed');
    }
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed', ['posts' => $posts]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Listagem de um coletivo de artigos.
         * where = condição
         * orderBy = ordenação
         * take = limite de registros
         * get = obter a consulta
         */
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->get();
//        foreach($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";
//        }

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * where = condição
         */
//        $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->first();
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * Caso não seja retornado registro, é redirecionado para a 404
         * where = condição
         */
//        $post = Post::where('created_at', '>=', date('2020-m-d H:i:s'))->firstOrFail();
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * Esse método faz a busca do elemento de acordo com a chave primária.
         * Caso o atributo $primaryKey seja sobrescrito no modelo, a alteração reflete nesse método.
         */
//        $post = Post::find(1);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Listagem de um único artigo, o primeiro da listagem retornada.
         * Não é necessário utilizar o método get
         * Por se tratar de um único objeto, não é necessário laço de repetição
         * Esse método faz a busca do elemento de acordo com a chave primária.
         * Caso o atributo $primaryKey seja sobrescrito no modelo, a alteração reflete nesse método.
         * Caso não seja retornado registro, é redirecionado para a 404
         */
//        $post = Post::findOrFail(99);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

        /**
         * Verificação de existência:
         * exists() = Se existe retorna true, se não existe retorna false
         * doesntExists() = Se existe retorna false, se não existe retorna true
         *
         * Métodos agregadores
         * max = Qualquer tipo de campo e retorna de acordo com a ordem alfabética ou numérica
         * min = Qualquer tipo de campo e retorna de acordo com a ordem alfabética ou numérica
         * sum = Faz a soma de campos numerais (inteiros, double, decimal)
         * count = Retorna a quantidade de registros encontrados
         * avg = Média aritmética de campos numerais (inteiros, double, decimal)
         */
        // max - min - sum - count - avg
//        $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->max('title');
//        foreach($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";
//        }

        /**
         * Retorna todos os registros do modelo
         */
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Object Prop Save
         * Consiste em você instanciar um objeto, atacar as propriedades e executar o método save
         * Uma das formas mais utilizadas no dia a dia
         * Identico ao formato de atualização
         */
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        /**
         * Mass Assigment
         * Para que esse formato funcione é necessário que o modelo (App\Post) tenha os atributos fillable e guarded alimentados
         * fillable = Lista branca de campos que podem ser inseridos na base de dados
         * guarded = Black list dos campos que não podem ser inseridos
         * Um campo pode estar em uma das duas propriedades, mas nunca em ambas.
         */
//        Post::create([
//            'title' => $request->title,
//            'subtitle' => $request->subtitle,
//            'description' => $request->description
//        ]);

        /**
         * Pesquisa pelo registro, e caso não encontra cria uma nova instância com os dados fornecidos
         * Deve ser informado dois arrays
         * Depois de invocado é necessário fazer o uso do método save() para persistir os dados dentro do banco de dados
         * Primeiro array: Condicionamento com array associativo
         * Segundo array: Caso a pesquisa não retorne registro, alimenta os demais campos
         */
//        $post = Post::firstOrNew([
//            'title' => 'teste2',
//            'subtitle' => 'teste3',
//        ], [
//            'description' => 'teste2'
//        ]);
//        $post->save();

        /**
         * Pesquisa pelo registro, e caso não encontra cria um novo dentro do banco de dados
         * Deve ser informado dois arrays
         * Não é necessário fazer o uso do método save()
         * Primeiro array: Condicionamento com array associativo
         * Segundo array: Caso a pesquisa não retorne registro, alimenta os demais campos
         */
//        $post = Post::firstOrCreate([
//            'title' => 'teste4',
//            'subtitle' => 'teste4',
//        ], [
//            'description' => 'teste4'
//        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        /**
         * Object Prop Save
         * Nesse caso não é necessário instanciar o objeto, porque o parâmetro do método já é o próprio modelo
         * Você pode omitir a instância ou ainda alimentar novamente a variável post utilizando o método find()
         * Faz o uso do método save() no final para persistir os dados dentro do banco de dados
         */
        //$post = new Post; // não se deve utilizar a instância
        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        /**
         * Assim como você tem o firstOrCreate que busca um registro e caso não encontre ele cria um novo no banco de dados,
         * o updateOrCreate tem basicamente a mesma responsabilidade... Mas ele vai buscar um registro, se não tiver ele cria,
         * e se já exisitir ele atualiza os dados
         * Não é necessário fazer o uso do método save() para persistir as informações
         */
//        $post = Post::updateOrCreate([
//            'title' => 'teste5'
//        ],[
//            'subtitle' => 'teste6',
//            'description' => 'teste6'
//        ]);

        /**
         * Atualização em massa
         * Informe a query builder com um coletivo de registros e passe o método update encadeado com um array associativo
         * O array deve conter o nome do campo e o respectivo valor
         */
//        Post::where('created_at', '>=', date('Y-m-d H:i:s'))->update(['description' => 'teste']);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /**
         * Cria uma nova instância e deleta o registro
         */
//        Post::find($post->id)->delete();

        /**
         * Deleta vários registros
         */
//        Post::destroy([2, 3]);

        /**
         * Deleta o registro informado (que pode ou não ser o recebido pelo modelo)
         */
        Post::destroy($post->id);

        /**
         * Deleção de registros em massa
         * Utilize o query Builder para retornar uma coleção de modelos e use o método delete()
         */
//        Post::where('created_at', '>=', date('Y-m-d H:i:s'))->delete();

        return redirect()->route('posts.index');
    }
}
