@extends('layouts.share')

@section('reply')
<div class="h3 mb-3">5.コメント</div>
<div class="container mb-3">
    <?php $num = 1; ?>
    <ul class="list-group">
        @foreach($replies as $reply)
            <li class="list-group-item">
                @foreach($names as $name)
                    @if($name['id'] === $reply['user_id'])
                        <div class="h5 mb-3">
                            @if($myreply['id'] == $reply['id'])
                                <div class="font-weight-bold">編集中：</div>
                            @endif
                            [コメント{{ $num }}]
                        </div>
                        <div class="p-2">
                            <div class="h5">
                                <div class="h4">{!! nl2br(e($reply['content'])) !!}</div>
                            </div>
                            @if($reply['user_id'] === $user['id'])
                                by あなた<br>
                            @else
                                by {{ $name['name'] }}さん<br>
                            @endif
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
<div class="h3 mb-3">6.返信の編集</div>
<div class="container">
    <div class="form-body">
        <form action="/article/reply/update/{{ $myreply['id'] }}" method="post">
            @csrf
            <input type='hidden' name='user_id' value="{{ $user['id'] }}">
            <textarea class="form-control mb-3" name="replyupdate" id="reply" rows="5" placeholder="返信を入力" required>{{ $myreply['content'] }}</textarea>
            <input class="btn btn-primary" type="submit" value="編集する">
        </form>
    </div>
</div>
@endsection
