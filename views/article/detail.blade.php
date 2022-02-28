@extends('layouts.share')

@section('reply')
<div class="container mb-3">
    <div class="h3 mb-3">5.コメント</div>
    <?php $num = 1; ?>
    <ul class="list-group">
        @foreach($replies as $reply)
            <li class="list-group-item">
                @foreach($names as $name)
                    @if($name['id'] === $reply['user_id'])
                    <div class="h5 mb-3">[コメント{{ $num }}]</div>
                        <div class="p-2">
                            <div class="h4">{!! nl2br(e($reply['content'])) !!}</div>
                            @ifauth
                                @if($reply['user_id'] === $user['id'])
                                    <div class="d-flex">
                                        by <a href="/article/person/{{ $reply['id'] }}" class="font-weight-bold">あなた</a>
                                        <a href="/article/reply/edit/{{ $reply['id'] }}" id='replyedit'>
                                            <button class='p-0 ml-2' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                                        </a>
                                        <a href="/article/reply/delete/{{ $reply['id'] }}" id='replydelete'>
                                            <button class='p-0 ml-2' style='border:none; color:black' onclick="return confirm('削除しますか?')"><i id='delete-button' class="fas fa-trash"></i></button>
                                        </a>
                                    </div>
                                @else
                                    by <a href="/article/person/{{ $reply['user_id'] }}" class="font-weight-bold">{{ $name['name'] }}</a>さん<br>
                                @endif
                            @else
                                by <a href="/article/person/{{ $reply['user_id'] }}" class="font-weight-bold">{{ $name['name'] }}</a>さん<br>
                            @endauth
                            日時：{{ $reply['updated_at'] }}
                        </div>
                    @endif
                @endforeach
            </li>
            <?php $num = $num + 1 ?>
        @endforeach
    </ul>
</div>
<hr>
<div class="container">
    <div class="h3 mb-3">6.返信</div>
    <div class="form-body">
        @ifauth
            <form action="/article/reply/{{ $comment['id'] }}" method="post">
                @csrf
                <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                <textarea class="form-control mb-3" name="reply" id="reply" rows="5" placeholder="返信を入力" required></textarea>
                <input class="btn btn-primary" type="submit" value="返信する">
            </form>
        @else
            <div class="text-muted">
                ※ログインすると返信ができるようになります。
            </div>
        @endif
    </div>
</div>
@endsection
