                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="caption" id="caption" class="form-control" value="{!! $video->caption !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Category</label>
                        <div class="col-md-10">
                            <select id="category" type="category" class="form-control" name="category">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{!! $category->id !!}" @if($video->category_id == $category->id) selected @endif>
                                        {!! $category->name !!}
                                    </option>
                                @endforeach
                            </select>

                            @if($errors->has('category'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('category') !!}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control">{!! $video->description !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" id="summary-ckeditor" rows="5" cols="40" class="form-control">
                                {!! $video->content !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Key Words</label>
                        <div class="col-sm-10">
                            <textarea name="keywords" id="keywords" class="form-control">{!! $video->keywords !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Tags</label>
                        <div class="col-sm-10">
                            {!! Form::select('tags[]',$tags,$videoTags,['class'=>'form-control','multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox col-sm-offset-2 col-sm-10">
                            <input type="checkbox" class="custom-control-input" name="publish" id="publish-post" @if($video->is_published) checked @endif>
                            <label class="custom-control-label" for="publish-post">Publish</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Update Video"/>
                        </div>
                    </div>