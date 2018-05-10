@if (Auth::guest())
@extends('layouts.admin')
@section('content')
    <div class="lapis1">
        <div class="lapis2">
            <div class="lapis3">
                <div class="position col-4 offset-4">
                    <h1 class="head">Login</h1>
                    <form  role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        
                            <div class="col-12">
                                <input id="email" class="input" type="email" placeholder="email" name="email" value="{{ old('email') }}" required autofocus>

                                @if($errors->has('email'))
                                    <div class="salah">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        

                        <div class="col-12">
                            <input id="password" class="input" placeholder="password" type="password" name="password" required>

                            @if ($errors->has('password'))
                                    <div class="salah">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div class="col-12">
                            <div class="ingat">
                                <input type="checkbox" name="remember"> Remember Me
                            </div>
                        </div>
                        
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="tombol">Login</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@else <?php header("Location: /home") ?>
@endif