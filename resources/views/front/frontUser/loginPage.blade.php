@extends('master.front.master')

@section('body')
    <div class="account-login section">
        <div class="container"style="min-height: 450px">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <h5 class="text-danger text-center">{{Session::get('message')}}</h5>
                    <form class="card login-form" action="{{route('front.login.check')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group input-group">
                                <label for="reg-fn">Email</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Password</label>
                                <input class="form-control" type="password" name="password" id="reg-pass" required>
                            </div>

                            <div class="button">
                                <button class="btn" type="submit">Login</button>
                            </div>
                            <p class="outer-link">Don't have an account? <a href="{{route('front.registration')}}">Register here </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
