@extends('master.front.master')
@section('body')
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="{{route('post.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" style="width:90%">
                            <div class="form-group input-group">
                                <label for="reg-fn">Title</label>
                                <input class="form-control" type="text" name="title" required>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Description</label>
                                <textarea class="form-control summernote" id="summernote" type="text" name="description"  required></textarea>
                            </div>
                            <div class="form-group input-group">
                                <label for="reg-fn">Image</label>
                                <input class="form-control" type="file" name="image" required>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Post Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
