@extends('layouts.app')
@section('title'|'Home')

@section('content')
    <div class="container" id="main">
        <div class="row">
            <div class="col-sm-8 blog-main">
            @if(!empty($posts))
               @forelse($posts as $post)
                    <div class="blog-post">
                        @include('partials.post')
                        <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >Read more &rarr;</a> 
                        </p>
                        <br/> <br/><hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post <a href="#"> {{ config('app.name', 'SKYLUX') }} Blog </a> articles.</p>
                @endforelse
            @endif
                <nav class="blog-pagination">
                    {{ $posts->render() }}
                </nav>
                @include('user.posts.tags')
            </div><!-- /.blog-main -->
        @include('partials.aside_h')
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </div> <!-- /.container -->
@endsection

