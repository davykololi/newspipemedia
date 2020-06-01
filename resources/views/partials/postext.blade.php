<article class="page-extention">
<div class="dad"></div>
<div class="headings">
    <h2>SANTONA MEDIA {{ $post->category->name }} ARTICLE</h2>
</div>
<br/>
<h3>
    <a class="post-link" href="{{ route('users.posts.read',['post_slug' => $post->slug]) }}" >{{ $post->title }}</a>
</h3>
<div class="left-ten">
    <div class="created-time">
        <a href="#"> {{ date("F j,Y,g:i a",strtotime($post->created_at)) }} By:</a>
        <span> {!! $post->admin->name !!} </span>
    </div>
    <figure>
        <a href="{{ route('users.posts.read',['post_slug' => $post->slug]) }}" >
            <img class="img-thumbnail" width="600" height="314" src = "/storage/public/storage/{{ $post->image }}" loading="lazy" alt ="{{ $post->title }}">
        </a>
        <figcaption class="figcaption"> {{$post->caption}} </figcaption>
    </figure>
</div>
</article>
