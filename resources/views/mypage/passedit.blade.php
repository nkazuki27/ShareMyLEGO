@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">パスワード変更</div>
                <div class="card-body">
                    <form method="POST" action="/passupdate">
                        @csrf
                        <div class="form-group row">
                            <label for="oldpassword" class="col-md-4 col-form-label text-md-right">前回の{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control <?php if(isset($error)){ echo 'is-invalid' ;} ?>" name="oldpassword">
                                @if(isset($error))
                                    <div id="passerror" class="invalid-feedback">
                                        <strong>パスワードが異なります。</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">新{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">新{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
