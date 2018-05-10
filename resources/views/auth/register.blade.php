@if (Auth::guest())
@extends('layouts.admin')
@section('content')
<div class="lapis1">
    <div class="lapis2">
        <div class="lapis3">
            <div class="position col-4 offset-4">            
                <h1 class="head">Register</h1>
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            
                            <div class="col-12">
                                <input id="name" class="input" placeholder="nama" type="text" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <p class="salah">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-12">
                                <input id="email" class="input" placeholder="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <p class="salah">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-12">
                                <input id="password" class="input" placeholder="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <p class="salah">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <div class="col-12">
                                <input id="password-confirm" class="input" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="tombol">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@endif