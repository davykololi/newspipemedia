@extends('layouts.app')
@section('title'|'Articles')

@section('content')
<main role="main" class="container-fluid" id="margtop60">
    <div class="row" id="dispflex">
        <div class="col-sm-3">
            @include('partials.sidebar')
        </div>
        <div class="blog-main col-sm-6" id="main-content"><!-- blog-main-->
            @forelse($posts as $post)
                <div class="blog-post">
                    @include('partials.post')
                        <p class="card-text" id="ffbdy">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-default" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}">
                            Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/><hr/>
                </div><!-- /.blog-post -->
            @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post the <a href="#"> {{strtolower($category->name)}}</a> articles.</p>
            @endforelse
            <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                {{ $posts->links() }}
            </div>
            @include('user.posts.tags')
            @include('user.newsletter.newsletter')
        </div> <!--end of blog-main -->
        <div class="col-sm-3">
            @include('partials.aside')
        </div>  
        </div><!-- end of row -->
    </main> <!-- end of main -->
@endsection

