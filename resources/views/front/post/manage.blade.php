@extends('master.front.master')
@section('body')

    <div class="shopping-cart section">
        <div class="container" style="min-height:450px">
            <div class="cart-list-head">
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Post Title</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Date</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Action</p>
                        </div>
                    </div>
                </div>
                @foreach($posts as $post)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="{{route('detail',['id'=>$post->id])}}">
                                   {{$post->title}}</a></h5>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}</p>
                        </div>

                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="btn btn-primary" href="{{route('post.edit',['id'=>$post->id])}}"><i class="lni lni-edit">Edit</i></a>
                            <a class="btn btn-danger" href="{{route('post.delete',['id'=>$post->id])}}"><i class="">Delete</i></a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
