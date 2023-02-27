@extends('master.front.master')
@section('body')
    <section class="section blog-section blog-list">
        <div class="container" style="min-height: 450px">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6 col-12" >
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="#">
                                        <img src="{{asset($post->image)}}"style="height: 400px" alt="#">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <a class="category" href="javascript:void(0)">Post By: {{$post->frontUser->first_name}}</a>
                                    <h4>
                                        <a href="#">{{$post->title}}</a>
                                    </h4>

                                    <p >{!! Str::limit($post->description, 100) !!}</p>
                                    <div class="button">
                                        <a href="{{route('detail',['id'=>$post->id])}}" class="btn">Read More</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        @endforeach
                    </div>

                    <div class="pagination left blog-grid-page">
                        <ul class="pagination-list">
                            {!! $posts->links() !!}
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
