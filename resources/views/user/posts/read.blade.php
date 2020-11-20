@extends('layouts.app')

@section('title')
@parent
{{$post->title}}
@stop
 
@section('content')
@include('partials.allnews')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{!! url('/') !!}">Home</a></li>
              <li><a href="{!! $category->path() !!}">{{$category->name}}</a></li>
              <li class="active">{{$post->title}}</li>
            </ol>
            <h1><a href="{!! $post->path() !!}">{!! $post->title !!}</a></h1>
            <div class="post_commentbox"> 
              <a href="{!! $post->path() !!}">
                <i class="fa fa-user"></i>Wpfreeware
              </a> 
              <span><i class="fa fa-calendar"></i>Posted On: {!! $post->created_at->toDayDateTimeString() !!}</span> 
              <a href="{!! $category->path() !!}"><i class="fa fa-tags"></i>
                {!! $post->category->name !!}
              </a> 
              <span>Article By:</span>
              <a href="{!! $post->admin->path() !!}">
                <span style="margin: 5px;color: #696969"> 
                  <b>{!! $post->admin->name !!}</b>
                  <img style="width: 5%;margin: 10px;border-radius: 50%" src="/storage/public/storage/{!! $post->admin->image !!}" alt="{!! $post->admin->name !!}">
                </span>
              </a> 
            </div>
            <div class="single_page_content"> 
                <img class="img-center" src="{!! $post->imageUrl() !!}" alt="{!! $post->title !!}">
                <span style="display: block;text-align: center;font-size: 16px;color: gray;margin-bottom: 20px;margin-top: -10px">
                  {!! $post->caption !!}
                </span>
              <p style="text-align: justify-all;color:;background-color: lightgray;">
                <b><u style="margin: 5px">Summary:</u></b>
                <i>{!! $post->description !!}</i>
              </p>
              <p>{!! $post->content !!}</p>

              @include('user.posts.commentForm')
              @include('user.posts.commentsDisplay')
            </div>
            @include('partials.share')
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach($categoryPosts as $xv)
                <li>
                  <div class="media"> 
                    <a class="media-left" href="{!! $xv->path() !!}"> 
                      <img src="{!! $xv->imageUrl() !!}" loading="lazy" alt="{!! $xv->title !!}"> 
                    </a>
                    <div class="media-body"> <a class="catg_title" href="{!! $xv->path() !!}">{!! $xv->title !!}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          @include('user.posts.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="{{asset('/static/globe.png')}}" alt="Logo"/> </div>
        </a> <a class="next" href=""> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Web Developer 0724351952</h3>
          <img src="{{asset('/static/David Kololi.JPG')}}" alt="Web Developer"/> </div>
        </a> </nav>
      @include('partials.posts_readext')
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection
