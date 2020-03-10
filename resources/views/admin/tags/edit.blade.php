@extends('layouts.adminmaster')
@section('title', '| Edit Tag')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<br/>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="titles"> EDIT THE TAG </h3>
                    <a href="{{ route('admin.tags.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Tag Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn" id="button" value="Update Tag" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
