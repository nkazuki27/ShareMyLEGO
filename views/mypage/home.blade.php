@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">マイページ</div>
                <div class="card-body">
                    <div class="container">
                    <table class="table table-striped  table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">あなたの情報</th>
                                <th scope="col">編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ __('Name') }}</th>
                                <td>{{ $user['name'] }}</td>
                                <td>
                                    <a href="/mypage/name/edit" id='delete-form' class="mb-0">
                                        <button class='p-0 mr-4' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('E-Mail Address') }}</th>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    <a href="/mypage/mail/edit" id='delete-form' class="mb-0">
                                        @csrf
                                        <button class='p-0 mr-4' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Password') }}</th>
                                <td class="text-muted">（非表示）</td>
                                <td>
                                    <a href="/mypage/pass/edit" id='delete-form' class="mb-0">
                                        <button class='p-0 mr-4' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">最終更新日</th>
                                <td>{{ $user['updated_at'] }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">投稿数</th>
                                <td>{{ count($comments) }}</td>
                                <td>
                                    <a href="/article/person/{{ $user['id'] }}" class="font-weight-bold">
                                        <button class='p-0 mr-4' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">返信数</th>
                                <td>{{ count($replies) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">押したいいね数</th>
                                <td>{{ count($likes) }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
