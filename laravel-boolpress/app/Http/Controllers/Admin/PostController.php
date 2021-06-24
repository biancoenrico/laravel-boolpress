<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required|max:65000'
        ]);

        //richiesta dati form
        $form_data = $request->all();

        //slug
        $new_slug = Str::slug($form_data['title'], '-');
        $base_slug = $new_slug;
        $post_w_slug = Post::where('slug','=',$new_slug)->first();
        $counter = 1;

        // nuovo slug
        while ($post_w_slug){
            $new_slug = $base_slug . '-' . $counter;
            $counter++;
            $post_w_slug = Post::where('slug','=',$new_slug)->first();
        }

        $form_data['slug'] = $new_slug;

        // Salvataggio slug
        $new_post = new Post();
        $new_post->fill($form_data);
        $new_post->save();

        return redirect()->route('admin.posts.show', ['post' => $new_post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // mostro i dati del singolo post in pagina
        $post = Post::where('slug', '=', $slug)->first();

        // errore se il post non esiste
        if(!$post){
            abort('404');
        }

        $data = [
            'post' => $post
        ];

        return view('guest.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'post' => $post
        ];

        return view('admin.posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:65000'
        ]);

        $modified_post_data = $request->all();

        $post = Post::findOrFail($id);

        $modified_post_data['slug'] = $post->slug;

        if($modified_post_data['title'] != $post->title) {

            $new_slug = Str::slug($modified_post_data['title'], '-');
            $base_slug = $new_slug;
            $post_with_existing_slug = Post::where('slug', '=', $new_slug)->first();
            $counter = 1;

            while($post_with_existing_slug) {
                $new_slug = $base_slug . '-' . $counter;
                $counter++;
                $post_with_existing_slug = Post::where('slug', '=', $new_slug)->first();
            }

            $modified_post_data['slug'] = $new_slug;
        }

        $post->update($modified_post_data);

        return redirect()->route('admin.posts.show', ['post' => $post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
