@extends('layouts.adminmaster')
@section('title', '| All Videos')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($videos))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br/>
                    <h3 class="titles">VIDEOS LIST</h3>
                </div>
                <div class="pull-right">
                    <br/>
                    <a class="btn btn-success" href="{{route('admin.videos.create')}}"> Add Video</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.vdhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td class="table-text">
                                <div>{{$video->category->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$video->title}}</div>
                            </td>
                            <td class="table-text">
                            <video width="40" height="30" controls> 
                                <source type="video/mp4" src = "/storage/public/videos/{{ $video->video }}">
                                	This browser doesn't support video tag.
                            </video>
                            </td>
                            <td class="table-text">
                                <div>{{$video->caption}}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! Str::limit($video->content,$limit=30,$end= '...') !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$video->created_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('admin.videos.show', $video->id) }}" class="label label-success">Details</a>
                                <a href="{{ route('admin.videos.edit', $video->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('admin.videos.delete', $video->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection