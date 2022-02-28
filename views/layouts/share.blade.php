@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="col-md-12 p-0">
        <div class="row justify-content-center ml-0 mr-0 h-100">
            <div class="card w-100">
                <header class="card-header d-flex">
                    <a href="/">
                        <i class="fas fa-angle-left p-0 mr-4">ホームに戻る</i>
                    </a>
                    <div class="h3 mb-0">投稿「{{ $comment['title'] }}」</div>
                    @auth
                        @if($comment['user_id'] === $user['id'])
                            <a href="/article/edit/{{ $comment['id'] }}" id='delete-form' class="ml-auto h3 mb-0">
                                <button class='p-0 mr-4' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                            </a>
                        @endif
                    @endauth
                </header>
                <div class="card-body">
                    <div class="container mb-3">
                        @ifauth
                            @if($writter['id'] === $user['id'])
                                ・筆者：<a href="/article/person/{{ $writter['id'] }}" class="font-weight-bold">あなた</a>
                            @else
                                ・筆者：<a href="/article/person/{{ $writter['id'] }}" class="font-weight-bold">{{ $writter['name'] }}</a>さん
                            @endif
                        @else
                            ・筆者：<a href="/article/person/{{ $writter['id'] }}" class="font-weight-bold">{{ $writter['name'] }}</a>さん
                        @endif
                        <br>
                        ・更新日：{{ $comment['updated_at']}}
                        <br>
                        ・タグ：<a href="/?tag={{ $comment['tag_id'] }}" class="font-weight-bold mb-3">{{ $tags[$comment['tag_id'] - 1] }}</a>
                        <br>
                        <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword={{ $tags[$comment['tag_id'] - 1] }}">
                            LEGO商品を{{ $tags[$comment['tag_id'] - 1] }}で検索する
                        </a>
                    </div>
                    <hr>
                    <div class="p-2 container mb-3">
                        <div class="h3 mb-3">1.タイトル画像</div>
                        <img src="data:image/png;base64,{{ $comment['image']}}" class='w-100 img-thumbnail'>
                    </div>
                    <hr>
                    <div class="container mb-3">
                        <div class="h3 mb-3">2.詳細</div>
                        <div class="h4 mb-3">{!! nl2br(e($comment['body_1'])) !!}</div>
                        @if(isset($comment['image_1']))
                            <div class="row">
                                <div class="p-2 col-md-6 bd-highlight">
                                    <label for="image_1" class="h5">[詳細画像1]</label>
                                    <img src="data:image/png;base64,{{ $comment['image_1'] }}" class='w-100 d-inline img-thumbnail' id="image_1">
                                </div>
                                @if(isset($comment['image_2']))
                                    <div class="p-2 col-md-6 bd-highlight">
                                        <label for="image_2" class="h5">[詳細画像2]</label>
                                        <img src="data:image/png;base64,{{ $comment['image_2'] }}" class='w-100 d-inline img-thumbnail' id="image_2">
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="container mb-3">
                        <div class="h3 mb-3">3.特徴</div>
                        <div class="h4 mb-3">{!! nl2br(e($comment['body_2'])) !!}</div>
                        <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword={{ $comment['title'] }}">作品に類似したLEGO商品を検索する</a>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="h3 mb-3">4.部品</div>
                        <div class="row">
                            <?php $i = 1; ?>
                            @foreach($parts as $part)
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                    <!--<div class="p-2 bd-highlight w-50">
                                        @if($part['type'] === 1)
                                        <img src="../../../../storage/block.png" class="w-50">
                                        @elseif($part['type'] === 2)
                                        <img src="../../../../storage/plate.png" class="w-50">
                                        @elseif($part['type'] === 3)
                                        <img src="../../../../storage/tile.png" class="w-50">
                                        @endif
                                    </div>-->
                                        <div class="card-header">
                                            <h4 class="my-0 font-weight-normal text-center">
                                                @if($part['type'] === 1)
                                                    ブロック
                                                @elseif($part['type'] === 2)
                                                    プレート
                                                @elseif($part['type'] === 3)
                                                    タイル
                                                @else
                                                    その他：{{ $part['content'] }}
                                                @endif
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            @if($part['type'] === 1)
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword=パーツ ブロック">
                                                    LEGOブロック部品を検索する
                                                </a>
                                            @elseif($part['type'] === 2)
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword=パーツ プレート">
                                                    LEGOプレート部品を検索する
                                                </a>
                                            @elseif($part['type'] === 3)
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword=パーツ タイル">
                                                    LEGOタイル部品を検索する
                                                </a>
                                            @else
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword={{ $part['content'] }}">
                                                    LEGOの{{ $part['content'] }}部品を検索する
                                                </a>
                                            @endif
                                            <hr>
                                            <div class="p-2 bd-highlight">
                                                ・大きさ：
                                                {{ $part['number_1'] }} × {{ $part['number_2'] }}
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                ・個数：
                                                {{ $part['count'] }}個
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                ・色：
                                                {{ $part['color'] }}<br>
                                            </div>
                                            @if($part['type'] === 1)
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword=パーツ ブロック {{ $part['color'] }}">
                                                    LEGOブロック部品を{{ $part['color'] }}で検索する
                                                </a>
                                            @elseif($part['type'] === 2)
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword=パーツ プレート {{ $part['color'] }}">
                                                    LEGOプレート部品を{{ $part['color'] }}で検索する
                                                </a>
                                            @elseif($part['type'] === 3)
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword=パーツ タイル {{ $part['color'] }}">
                                                    LEGOタイル部品を{{ $part['color'] }}で検索する
                                                </a>
                                            @else
                                                <a class="btn btn-outline-danger btn-sm" href="/rakuten/{{ $comment['id'] }}/?keyword={{ $part['content'] }} {{ $part['color'] }}">
                                                    LEGOの{{ $part['content'] }}部品を{{ $part['color'] }}で検索する
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="container p-2">
                        @ifauth
                            @if($comment['user_id'] === $user['id'])
                                <a class="btn btn-secondary" disabled>いいね {{ $comment['like_count'] }}</a>
                            @else
                                @if($mylike === 1)
                                    <a href="/article/unlike/{{ $comment['id'] }}" class="btn btn-secondary">いいね {{ $comment['like_count'] }}</a>
                                @else
                                    <a href="/article/like/{{ $comment['id'] }}" class="btn btn-success">いいね {{ $comment['like_count'] }}</a>
                                @endif
                            @endif
                        @else
                            <p>
                                <a class="btn btn-secondary" disabled>いいね {{ $comment['like_count'] }}</a>
                            </p>
                            <div class="text-muted">
                                ※ログインするといいねができるようになります。
                            </div>
                        @endif
                    </div>
                    <hr>
                    @yield('reply')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
