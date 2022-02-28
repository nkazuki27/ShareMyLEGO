@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">メールアドレス変更</div>
                <div class="card-body">
                    <form method="POST" action="/mailupdate">
                        @csrf
                        <div class="h4">
                            登録{{ __('E-Mail Address') }}：{{ $user['email'] }}
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">新{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php if(isset($error)){ echo 'is-invalid' ;} ?>" name="password" required>
                                @if(isset($error))
                                    <div id="passerror" class="invalid-feedback">
                                        <strong>パスワードが異なります。</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    編集
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
