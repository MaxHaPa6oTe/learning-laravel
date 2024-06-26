<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller
{
    public function index() {
        // $lox = Post::where('is_published', 1)->first();
        // $post = Post::find(1);
        // echo 'aafafaf';
        // dump($post->content);
        // dump($posts);
        // foreach($posts as $pos) {
        //     dump($pos->title);
        // };
        // dump($lox);
        $posts = Post::all();
        return view('post.index', compact('posts'));
        // dd($post);
    
    }

    public function create() {
        // $postsArr = [
        //     [
        //         'title'=>'title of post',
        //         'content'=>'some interesting content',
        //         'image'=>'imagelable.jpg',
        //         'likes'=>20,
        //         'is_published'=>1,
        //     ],
        //     [
        //         'title'=>'another title of post',
        //         'content'=>'another some interesting content',
        //         'image'=>'another imagelable.jpg',
        //         'likes'=>50,
        //         'is_published'=>1,
        //     ]
        //     ];
        //     foreach($postsArr as $po) {
        //         // Post::create();
        //         Post::create([
        //             'title' => $po['title'],
        //             'post_content' => $po['content'],
        //             'image' => $po['image'],
        //             'likes' => $po['likes'],
        //             'is_published' => $po['is_published'],
        //         ]);
        //     }
        //     dd('created');
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('tags','categories'));
    }

    public function update() {
        $post = Post::find(2);

        $post->update([
            'title' => 'updated',
            'likes' => 102,
            'is_published' => 0,
            'category_id'=>'',
            'tags'=>'',
        ]);
        dd($post);
    }

    public function delete() {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('delete');
    }

    public function firstOrCreate() {
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image',
            'likes' => 50,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => '2',
        ],[
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image',
            'likes' => 50,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('end');
    }

    public function updateOrCreate() {
        $anotherPost = [
            'title' => 'updatecreate post',
            'content' => 'updatecreate content',
            'image' => 'updatecreate image',
            'likes' => 570,
            'is_published' => 0,
        ];
        $post = Post::updateOrCreate([
            'title' => '2'
        ], [
            'title' => 'updatecreate post',
            'content' => 'updatecreate content',
            'image' => 'updatecreate image',
            'likes' => 570,
            'is_published' => 0,
        ]);
        dd($post->title); //херня какая то
    }

    public function store() {
        $data=request()->validate([
            'title'=> 'required|string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect('/posts');
        // $post = Post::firstOrCreate($data);
        // foreach ($tags as $tag) {
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id,
        //     ]);
        // }
        // return redirect()->route('post.index');
    }

    public function show(Post $post) {
        // $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','categories','tags')); 
    }
    public function updatee(Post $post) {
        $data=request()->validate([
            'title'=> 'string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show',$post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }
}

