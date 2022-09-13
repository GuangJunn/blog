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
        //
        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('admin/post/list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/post/create');
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
        $request->validate(
            [
                'title' =>'required | string',
                'content'=> 'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung'
            ],
        );

        Post::create([
            'title'=>$request['title'],
            'content'=>$request['content'],
            'status'=>$request['status'],
        ]);
        return redirect()->route('post.index')->with('status','Thêm mới tin tức thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('admin/post/edit', compact('posts'));
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
        //
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $request->validate(
            [
                'title' =>'required | string',
                'content'=> 'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung'
            ],
        );
        
        $post=Post::where('id',$id)->update([
            'title'=>$request['title'],
            'content'=>$request['content'],
            'status'=>$request['status'],
        ]);
        
        return redirect()->route('post.index')->with('status','Cập nhật tin tức thành công');
    }
    /**
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
        Post::where('id', $id)->forceDelete();
        return redirect()->route('post.index')->with('status','Bạn đẫ xóa tin tức thành công');
    }
}
