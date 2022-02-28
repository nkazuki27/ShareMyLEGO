@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="col-md-12 p-0">
        <div class="row justify-content-center ml-0 mr-0 h-100">
            <div class="card w-100">
                <header class="card-header d-flex">
                    @if($id === 0 || $id == "0")
                        <a href="/">
                            <i class="fas fa-angle-left p-0 mr-4">ホームに戻る</i>
                        </a>
                    @else
                        <a href="/article/detail/{{ $id }}">
                            <i class="fas fa-angle-left p-0 mr-4">投稿に戻る</i>
                        </a>
                    @endif
                    <div class="h3 mb-0">楽天市場商品検索</div>
                </header>
                <div class="card-body">
                    <div class="container">

                            <form action="/rakuten/search" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input class="form-control" type="text" name="keyword" id="keyword" placeholder="検索"  value="{{ $keyword }}">
                                        <input type="hidden" name="id" id="id" value="{{ $id }}">
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-primary input-group-text" value="検索">
                                    </div>
                                </div>
                            </form>

                        <hr>

                            <div class="h3">
                                @if(isset($keyword))
                                    キーワード：「LEGO {{ $keyword }}」
                                @else
                                    キーワード：「LEGO」
                                @endif
                            </div>
                            <div class="h4 mb-3">検索ヒット数：{{ count($items) }}件</div>
                            <div class="row">
                                @foreach($items as $item)
                                    <div class="col-md-4">
                                        <div class="card mb-4 box-shadow">
                                            <img class="card-img-top" src="{{ $item['mediumImageUrls'] }}" alt="Card image cap">
                                            <div class="card-body">
                                                <p class="card-text">{{ $item['itemName'] }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ $item['itemUrl'] }}" target="_blank">
                                                            詳細
                                                        </a>
                                                    </div>
                                                    <small class="text-muted">{{ $item['itemPrice'] }}円</small>
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
    </div>
</div>
@endsection
