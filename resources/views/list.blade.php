@extends('layouts.app')

@section('content')
<div class="col-md-2 p-0">
    <div class="card h-100">
        <header class="card-header h3">
            <div class="container">タグ一覧</div>
        </header>
        <div class="card-body">
            <div class="container">
                <p>
                    <a class='d-block h5' href='/'>全て表示</a>
                </p>
                <?php $i = 1; ?>
                <ul class="list-group">
                    @foreach($tags as $tag)
                        <li class="list-group-item">
                            <a href="/?tag={{ $i }}" class='d-block h4'>{{ $tag }}</a>
                        </li>
                        <?php $i = $i + 1; ?>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10 p-0">
    <div class="row justify-content-center ml-0 mr-0 h-100">
        <div class="card w-100">
            <header class="card-header">
                <div class="container d-flex">
                    <div class="h3 mb-0 p-0">投稿一覧</div>
                    @ifauth
                        <a class='ml-auto h3 mb-0' href='/article/create'>
                            <i class="fas fa-plus-circle p-0"></i>
                        </a>
                    @else
                        <div class="text-muted mb-0 p-0 ml-auto">
                            ※ログインすると新規投稿ができるようになります。
                        </div>
                    @endif
                </div>
            </header>
            <div class="card-body">
                <div class="container m-0 row">
                    @foreach($comments as $comment)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="data:image/png;base64,{{ $comment['image'] }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text font-weight-bold h4">{{ $comment['title'] }}</p>
                                    <p class="card-text">{{ $comment['body_1'] }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-sm btn-outline-secondary" href="/article/detail/{{ $comment['id'] }}">
                                                詳細
                                            </a>
                                        </div>
                                        <small class="text-muted">{{ $comment['like_count'] }}いいね</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>    
    </div> 
</div> 
@endsection
