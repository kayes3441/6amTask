@extends('master.front.master')
@section('body')
    <section class="section blog-single">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-details">
                            <div class="main-content-head">
                                <div class="post-thumbnils">
                                    <img src="{{asset($post->image)}}" alt="#">
                                </div>
                                <div class="meta-information">
                                    <h2 class="post-title">
                                        <a href="blog-single.html">{{$post->title}}</a>
                                    </h2>

                                    <ul class="meta-info">
                                        <li>
                                            <a href="javascript:void(0)"> <i class="lni lni-user"></i> {{$post->frontUser->first_name}}</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="lni lni-calendar"></i>
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="detail-inner">
                                    <p>{!! $post->description !!}</p>

                                </div>
                            </div>


                            <div class="post-comments">
                                <h3 class="comment-title"><span>Post comments</span></h3>
                                <ul class="comments-list">

                                    @foreach($post->comment as $comment)
                                    <li>
                                        @php($user = Session::get('front_user_id'))

                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                @if($comment->commentBy->id == $user)
                                                    <h6>Comment By You</h6>
                                                @else
                                                <h6>{{$comment->commentBy->first_name}}</h6>
                                                @endif
                                                <span class="date"> {{ \Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')}}</span>


                                            </div>
                                            <p>
                                                {{$comment->note}}
                                            </p>
                                            @if($user == $comment->commentBy->id || $post->frontUser->id == $user)
                                                <form action="{{route('comment.delete',['id'=>$comment->id])}}" method="get">
                                                    @csrf
                                                    <button href="javascript:void(0)" class="mdi-delete-circle btn btn-danger" onclick="return confirm('Are you sure??')"></i>Delete Comment</button>
                                                </form>
                                            @endif
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-reply-title">Leave a comment</h3>
                                <form action="{{route('comment.create')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea class="form-control form-control-custom" name="note" placeholder="Your Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection






