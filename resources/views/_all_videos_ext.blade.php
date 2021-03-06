  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>{!! $admin->name !!} {!! $video->category->name !!} Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($adminVideos))
                  @foreach($adminVideos as $video)
                <li>
                  <figure class="bsbig_fig">
                    <figure>
                      <video width="300" height="169" controls> 
                        <source type="video/mp4" src="{!! $video->videoUrl() !!}" alt="{ !!$video->title !!}">
                        <source type="video/ogg" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">   
                        <source type="video/webm" src="{!! $video->videoUrl() !!}" alt="{!!$video->title!!}"> 
                        This browser doesn't support video tag.
                      </video>
                    <figcaption> 
                      <a href="{!! route('users.videos.read', ['video_slug' => $video->slug]) !!}">
                        {!! $video->title !!}
                      </a>
                    </figcaption>
                    <p>
                      {!! $video->excerpt() !!}
                    </p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($adminVidSides))
                  @foreach($adminVidSides as $archive)
                <li>
                  <div class="media wow fadeInDown"> 
                    <figure>
                      <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $archive->videoUrl() !!}" alt="{!! $archive->title !!}">
                      <source type="video/ogg" src="{!! $archive->videoUrl() !!}" alt="{!! $archive->title !!}">  
                      <source type="video/webm" src="{!! $archive->videoUrl() !!}" alt="{!! $archive->title !!}"> 
                      This browser doesn't support video tag.
                      </video>
                    </figure>
                    <div class="media-body"> <a href="{!! route('users.videos.read', ['video_slug' => $archive->slug]) !!}" class="catg_title">{!! $archive->title !!}</a> </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          
            
          <div class="single_post_content">
            <h2><span>General News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($featured))
                  @foreach($featured as $video)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown">
                    <figure>
                      <video width="512" height="288" controls> 
                        <source type="video/mp4" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">
                        <source type="video/ogg" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">   
                        <source type="video/webm" src="{!! $video->videoUrl() !!}" alt="{!!$video->title !!}"> 
                        This browser doesn't support video tag.
                      </video>
                    <figcaption> <a href="{!! route('users.videos.read', ['video_slug' => $video->slug]) !!}">{!! $video->title !!}</a> </figcaption>
                    <p>{!! $video->excerpt() !!}</p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($allVideos))
                  @foreach($allVideos as $allvid)
                <li>
                  <div class="media wow fadeInDown"> 
                  <figure>
                    <video width="512" height="288" controls> 
                      <source type="video/mp4" src="{!! $allvid->videoUrl() !!}" alt="{!! $allvid->title !!}">
                      <source type="video/ogg" src="{!! $allvid->videoUrl() !!}" alt="{!! $allvid->title !!}">     
                      <source type="video/webm" src="{!! $allvid->videoUrl() !!}" alt="{!! $allvid->title !!}"> 
                      This browser doesn't support video tag.
                    </video>
                    <figcaption class="figcaption"> {!! $allvid->caption !!} </figcaption>
                  </figure>
                    <div class="media-body"> 
                      <a href="{!! route('users.videos.read',['video_slug'=>$allvid->slug]) !!}" class="catg_title">
                        {!! $allvid->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
          @include('user.videos.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  @if(!empty($categories))
                    @foreach($categories as $category)
                  <li class="cat-item">
                    <a href="{!! route('category.videos',['slug' => $category->slug]) !!}">
                      {!! $category->name !!}
                    </a>
                  </li>
                    @endforeach
                  @endif
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>