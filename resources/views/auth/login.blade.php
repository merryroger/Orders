@extends('layouts.general')

@section('contents')
    <div class="pt">
        <div class="ptc hc vc">
            <div class="login_form">
                <div class="form_caption">Signing in</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form_row">
                        <label for="name">Login</label>
                        <input id="name" type="text" class="form_item" name="name" value="{{ old('name') }}"
                               tabindex="1" required autofocus>
                    </div><br clear="all" />
                    <div class="form_row">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form_item" name="password" tabindex="2" required>
                    </div><br clear="all" />
                    <div class="fmctrls">
                        <button type="submit" class="do" tabindex="3">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
