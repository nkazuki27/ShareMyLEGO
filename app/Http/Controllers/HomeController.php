<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Part;
use App\Models\Reply;
use App\Models\Like;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $select_tag = \Request::query('tag');
        
        if(empty($select_tag)){
            $comments = Comment::where('status', 1)
            ->orderBy('updated_at', 'DESC')
            ->get();
        } else{
            $comments = Comment::where('status', 1)
            ->where('tag_id', $select_tag)
            ->orderBy('updated_at', 'DESC')
            ->get();
        }

        return view('list', compact('comments'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //$image = $request->file('image');
        //$path = \Storage::put('public', $image);
        //$path = explode('/', $path);
        //$image_big = $path[1];
        file_get_contents($request->image->getRealPath());
        $image_binary = base64_encode(file_get_contents($request->image->getRealPath()));
        
        $image_binary_1 = null;
        $image = $request->file('image_1');
        if($request->hasFile('image_1')){
            //$path = \Storage::put('public', $image);
            //$path = explode('/', $path);
            //$image_1 = $path[1];
            file_get_contents($request->image_1->getRealPath());
            $image_binary_1 = base64_encode(file_get_contents($request->image_1->getRealPath()));
        }
        
        $image_binary_2 = null;
        $image = $request->file('image_2');
        if($request->hasFile('image_2')){
            //$path = \Storage::put('public', $image);
            //$path = explode('/', $path);
            //$image_2 = $path[1];
            file_get_contents($request->image_2->getRealPath());
            $image_binary_2 = base64_encode(file_get_contents($request->image_2->getRealPath()));
        }

        $comment = Comment::insertGetId([
            'title' => $data['title'],
            'body_1' => $data['body1'],
            'body_2' => $data['body2'],
            'image' => $image_binary,
            'image_1' => $image_binary_1,
            'image_2' => $image_binary_2,
            'user_id' => $data['user_id'], 
            'tag_id' => $data['tag'],
            'status' => 1
        ]);

        $i = 1;
        while(isset($data['q_'.$i])){
            $type = $data['q_'.$i];
            $number_1 = null;
            if(isset($data['number_1_'.$i])){
                $number_1 = $data['number_1_'.$i];
            }
            $number_2 = null;
            if(isset($data['number_2_'.$i])){
                $number_2 = $data['number_2_'.$i];
            }
            $color = null;
            if(isset($data['color_'.$i])){
                $color = $data['color_'.$i];
            }
            $content = null;
            if(isset($data['content_'.$i])){
                $content = $data['content_'.$i];
            }
            $count = null;
            if(isset($data['count_'.$i])){
                $count = $data['count_'.$i];
            }
            $part = Part::insertGetId([
                'type' => $type,
                'number_1' => $number_1,
                'number_2' => $number_2,
                'color' => $color,
                'content' => $content,
                'count' => $count,
                'comment_id' => $comment,
                'status' => 1
            ]);
            $i = $i + 1;
        }

        $id = $comment;
        
        return redirect()->route('detail', compact('id'))
        ->with('success', '投稿が完了しました');
    }

    public function detail($id)
    {
        $comment = Comment::where('status', 1)
        ->where('id', $id)
        ->first();

        $writter = User::where('id', $comment['user_id'])
        ->first();

        $parts = Part::where('status', 1)
        ->where('comment_id', $id)
        ->orderBy('type', 'ASC')
        ->get();

        $replies = Reply::where('status', 1)
        ->where('comment_id', $id)
        ->orderBy('created_at', 'ASC')
        ->get();

        $names = User::get();

        $likes = Like::where('status', 1)
        ->where('comment_id', $id)
        ->get();
        $mylike = 0;
        $user = \Auth::user();
        if(isset($user)){
            foreach($likes as $like){
                if($like['user_id'] == $user['id']){
                    $mylike = 1;
                }
            }
        }

        return view('article.detail', compact('comment', 'writter', 'parts', 'replies', 'names', 'mylike'));
    }

    public function person($id)
    {
        $person = User::where('id', $id)
        ->first();
        
        $select_tag = \Request::query('tag');
        if(empty($select_tag)){
            $comments = Comment::where('status', 1)
            ->where('user_id', $id)
            ->orderBy('updated_at', 'DESC')
            ->get();
        } else{
            $comments = Comment::where('status', 1)
            ->where('user_id', $id)
            ->where('tag_id', $select_tag)
            ->orderBy('updated_at', 'DESC')
            ->get();
        }

        return view('personlist', compact('person', 'comments'));
    }

    public function edit($id){
        $user = \Auth::user();
        $comment = Comment::where('status', 1)
        ->where('user_id', $user['id'])
        ->where('id', $id)
        ->first();

        $parts = Part::where('status', 1)
        ->where('comment_id', $id)
        ->orderBy('type', 'ASC')
        ->get();

        return view('article.edit',compact('comment', 'parts'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $comment = Comment::where('id', $id)
        ->first();

        $image = $request->file('image');
        if($request->hasFile('image')){
            //$path = \Storage::put('public', $image);
            //$path = explode('/', $path);
            //$image_big = $path[1];
            file_get_contents($request->image->getRealPath());
            $image_binary = base64_encode(file_get_contents($request->image->getRealPath()));
        } else{
            $image_binary = $comment['image'];
        }

        $image = $request->file('imagea_1');
        if($request->hasFile('image_1')){
            //$path = \Storage::put('public', $image);
            //$path = explode('/', $path);
            //$image_big = $path[1];
            file_get_contents($request->image_1->getRealPath());
            $image_binary_1 = base64_encode(file_get_contents($request->image_1->getRealPath()));
        } else{
            $image_binary_1 = $comment['image_1'];
        }

        $image = $request->file('image_2');
        if($request->hasFile('image_2')){
            //$path = \Storage::put('public', $image);
            //$path = explode('/', $path);
            //$image_big = $path[1];
            file_get_contents($request->image_2->getRealPath());
            $image_binary_1 = base64_encode(file_get_contents($request->image_2->getRealPath()));
        } else{
            $image_binary_2 = $comment['image_2'];
        }

        Comment::where('id', $id)
        ->update(['title' => $data['title'], 
            'body_1' => $data['body1'], 
            'body_2' => $data['body2'], 
            'image' => $image_binary, 
            'image_1' => $image_binary_1, 
            'image_2' => $image_binary_2, 
            'tag_id' => $data['tag']
        ]);

        $i = 1;
        while(isset($data['q_'.$i])){
            if(isset($data['delete_parts_'.$i])){
                Part::where('id', $data['id_'.$i])
                ->update(['status' => 2]);
            } else{
                $type = $data['q_'.$i];
                $number_1 = null;
                if(isset($data['number_1_'.$i])){
                    $number_1 = $data['number_1_'.$i];
                }
                $number_2 = null;
                if(isset($data['number_2_'.$i])){
                    $number_2 = $data['number_2_'.$i];
                }
                $color = null;
                if(isset($data['color_'.$i])){
                    $color = $data['color_'.$i];
                }
                $content = null;
                if(isset($data['content_'.$i])){
                    $content = $data['content_'.$i];
                }
                $count = null;
                if(isset($data['count_'.$i])){
                    $count = $data['count_'.$i];
                }
                Part::where('id', $data['id_'.$i])
                ->update(['type' => $type, 
                    'number_1' => $number_1, 
                    'number_2' => $number_2, 
                    'color' => $color, 
                    'content' => $content, 
                    'count' => $count, 
                ]);
            }
            $i = $i + 1;
        }

        $i = 1;
        while(isset($data['new_q_'.$i])){
            $type = $data['new_q_'.$i];
            $number_1 = null;
            if(isset($data['new_number_1_'.$i])){
                $number_1 = $data['new_number_1_'.$i];
            }
            $number_2 = null;
            if(isset($data['new_number_2_'.$i])){
                $number_2 = $data['new_number_2_'.$i];
            }
            $color = null;
            if(isset($data['new_color_'.$i])){
                $color = $data['new_color_'.$i];
            }
            $content = null;
            if(isset($data['new_content_'.$i])){
                $content = $data['new_content_'.$i];
            }
            $count = null;
            if(isset($data['new_count_'.$i])){
                $count = $data['new_count_'.$i];
            }
            $part = Part::insertGetId([
                'type' => $type,
                'number_1' => $number_1,
                'number_2' => $number_2,
                'color' => $color,
                'content' => $content,
                'count' => $count,
                'comment_id' => $id,
                'status' => 1
            ]);
            $i = $i + 1;
        }
        
        return redirect()->route('detail', compact('id'))
        ->with('success', '更新が完了しました');
    }

    public function delete($id)
    {
        $user = \Auth::user();
        Comment::where('id', $id)
        ->where('user_id', $user['id'])
        ->update(['status' => 2]);
        
        return redirect()->route('home')
        ->with('success', '削除が完了しました');
    }

    public function reply(Request $request, $id)
    {
        $data = $request->all();
        $reply = Reply::insertGetId([
            'content' => $data['reply'],
            'user_id' => $data['user_id'],
            'comment_id' => $id,
            'status' => 1
        ]);
        
        return redirect(route('detail', [
            'id' => $id,
        ]));
    }

    public function replyedit($id)
    {
        $user = \Auth::user();

        $myreply = Reply::where('status', 1)
        ->where('user_id', $user['id'])
        ->where('id', $id)
        ->first();
        
        $comment = Comment::where('status', 1)
        ->where('id', $myreply['comment_id'])
        ->first();
        
        $writter = User::where('id', $comment['user_id'])
        ->first();

        $parts = Part::where('status', 1)
        ->where('comment_id', $comment['id'])
        ->orderBy('type', 'ASC')
        ->get();
        
        $replies = Reply::where('status', 1)
        ->where('comment_id', $comment['id'])
        ->orderBy('created_at', 'ASC')
        ->get();
        
        $names = User::get();
        
        $likes = Like::where('status', 1)
        ->where('comment_id', $comment['id'])
        ->get();
        $mylike = 0;
        foreach($likes as $like){
            if($like['user_id'] == $user['id']){
                $mylike = 1;
            }
        }

        return view('article.replyedit', compact('comment', 'writter', 'parts', 'replies', 'names', 'mylike', 'myreply'));
    }

    public function replyupdate(Request $request, $id)
    {
        $data = $request->all();
        
        Reply::where('status', 1)
        ->where('id', $id)
        ->update(['content' => $data['replyupdate']]);
        
        $reply = Reply::where('status', 1)
        ->where('id', $id)
        ->first();
        $id = $reply['comment_id'];

        return redirect()->route('detail', compact('id'))
        ->with('success', '返信の更新が完了しました');
    }

    public function replydelete($id)
    {
        $reply = Reply::where('status', 1)
        ->where('id', $id)
        ->first();
        
        $user = \Auth::user();
        Reply::where('id', $id)
        ->where('user_id', $user['id'])
        ->update(['status' => 2]);
        
        $id = $reply['comment_id'];
        
        return redirect()->route('detail', compact('id'))
        ->with('success', '返信の削除が完了しました');
    }

    public function like($id){
        $user = \Auth::user();

        $old_like = Like::where('user_id', $user['id'])
        ->where('comment_id', $id)
        ->first();
        if(empty($old_like)){
            $like = Like::insertGetId([
                'comment_id' => $id,
                'user_id' => $user['id'],
                'status' => 1
            ]);
        } else{
            Like::where('id', $old_like['id'])
            ->where('user_id', $user['id'])
            ->update(['status' => 1]);
        }

        $comment = Comment::where('status', 1)
        ->where('id', $id)
        ->first();
        $like_count = $comment['like_count'] + 1;
        Comment::where('status', 1)
        ->where('id', $id)
        ->update(['like_count', $like_count]);

        return redirect(route('detail', [
            'id' => $id,
        ]));
    }

    public function unlike($id){
        $user = \Auth::user();

        Like::where('comment_id', $id)
        ->where('user_id', $user['id'])
        ->update(['status' => 2]);

        $comment = Comment::where('status', 1)
        ->where('id', $id)
        ->first();
        $like_count = $comment['like_count'] - 1;
        Comment::where('status', 1)
        ->where('id', $id)
        ->update(['like_count', $like_count]);

        return redirect(route('detail', [
            'id' => $id,
        ]));
    }

    public function mypage(){
        $user = \Auth::user();

        $comments = Comment::where('status', 1)
        ->where('user_id', $user['id'])
        ->orderBy('updated_at', 'DESC')
        ->get();

        $replies = Reply::where('status', 1)
        ->where('user_id', $user['id'])
        ->orderBy('updated_at', 'DESC')
        ->get();

        $likes = Like::where('status', 1)
        ->where('user_id', $user['id'])
        ->orderBy('updated_at', 'DESC')
        ->get();

        return view('mypage.home', compact('comments', 'replies', 'likes'));
    }

    public function nameedit(){
        return view('mypage.nameedit');
    }

    public function nameupdate(Request $request)
    {
        $user = \Auth::user();
        $data = $request->all();
        
        if(password_verify($data['password'], $user['password'])){
            User::where('id', $user['id'])
            ->update(['name' => $data['name']]);

            return redirect()->route('mypage')
            ->with('success', 'ニックネームの更新が完了しました');
        } else{
            $name = $data['name'];
            $error = 1;

            return view('mypage.nameedit', compact('name', 'error'));
        }
    }

    public function mailedit(){
        return view('mypage.mailedit');
    }

    public function mailupdate(Request $request)
    {
        $user = \Auth::user();
        $data = $request->all();
        
        if(password_verify($data['password'], $user['password'])){
            User::where('id', $user['id'])
            ->update(['email' => $data['email']]);

            return redirect()->route('mypage')
            ->with('success', 'ニックネームの更新が完了しました');
        } else{
            $mail = $data['email'];
            $error = 1;

            return view('mypage.mailedit', compact('mail', 'error'));
        }
    }

    public function passedit(){
        return view('mypage.passedit');
    }

    public function passupdate(Request $request)
    {
        $user = \Auth::user();
        $data = $request->all();
        
        if(password_verify($data['oldpassword'], $user['password'])){
            User::where('id', $user['id'])
            ->update(['password' => password_hash($_POST['password'], PASSWORD_DEFAULT)]);

            return redirect()->route('mypage')
            ->with('success', 'パスワードの更新が完了しました');
        } else{
            $error = 1;

            return view('mypage.passedit', compact('error'));
        }
    }


}
