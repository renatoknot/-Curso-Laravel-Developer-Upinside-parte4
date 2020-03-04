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
        echo "Listagem de artigos!";
        

        //$posts = Post::where('created_at' , '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->get();
        // foreach($posts as $post){
        //     echo "<h1>{$post->title}</h1>";
        //     echo "<h2>{$post->subtitle}</h2>";
        //     echo "<p>{$post->description}</p>";
        //     echo "<hr>";
        // }

        // $post = Post::where('created_at' , '>=', date('Y-m-d H:i:s'))->first();
        // echo "<h1>{$post->title}</h1>";
        // echo "<h2>{$post->subtitle}</h2>";
        // echo "<p>{$post->description}</p>";
        // echo "<hr>";
        
        // $post = Post::find(1);//buscando o id 1 - sempre irá buscar a chave primaria
        // echo "<h1>{$post->title}</h1>";
        // echo "<h2>{$post->subtitle}</h2>";
        // echo "<p>{$post->description}</p>";
        // echo "<hr>";
        
        // max - min - sum - count - avg
        //$posts = Post::where('created_at' , '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->exists(); //retorna como true ou false se registro existe ou nao
        // foreach($posts as $post){
        //     echo "<h1>{$post->title}</h1>";
        //     echo "<h2>{$post->subtitle}</h2>";
        //     echo "<p>{$post->description}</p>";
        //     echo "<hr>";
        // }

        // $posts = Post::where('created_at' , '>=', date('Y-m-d H:i:s'))->count();// Retorna a contagem de registros

        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
        
        // var_dump($posts);
        // echo '<pre>';print_r($posts);exit;
        
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
