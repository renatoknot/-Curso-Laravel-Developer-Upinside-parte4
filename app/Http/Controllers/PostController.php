<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
