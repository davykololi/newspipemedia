<aside class="w3-sidebar w3-bar-block">
<br/>
	<div style="font-size: 15px;">
            <a class="nav-link" id="black" href="/home">HOME <span class="sr-only">(current)</span></a>
            <a class="nav-link" id="black" href="{{route('users.pages.about')}}">ABOUT US</a>
            <a class="nav-link" id="black" href="{{ route ('users.pages.contact') }}">CONTACT US</a>
            <div style="background-color: black">
                <h3 class="white" style="text-align: center;">VIDEOS SECTION</h3>
            </div>
            @if(!empty($categories))
    			@foreach($categories as $category)
        			<a class="nav-link" id="black" href="{{route('category.videos',['slug' => $category->slug])}}">
                        {!! strtoupper($category->name) !!}
                    </a>
    			@endforeach
			@endif
    </div>
</aside>
