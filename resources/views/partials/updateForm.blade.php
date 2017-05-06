<form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Your Location</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="location" value="{{ $userProfile->location }}" autofocus>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Profile Picture</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" accept="image/*" name="avatar" autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                            <label for="religion" class="col-md-4 control-label">Religious Background</label>

                            <div class="col-md-6">
                                <input id="religion" type="text" class="form-control" name="religion" value="{{ $userProfile->religion }}">

                                @if ($errors->has('religion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('religion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hometown') ? ' has-error' : '' }}">
                            <label for="hometown" class="col-md-4 control-label">Your Hometown</label>

                            <div class="col-md-6">
                                <input id="hometown" type="text" class="form-control" name="hometown" value="{{ $userProfile->hometown }}">

                                @if ($errors->has('hometown'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hometown') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('residence') ? ' has-error' : '' }}">
                            <label for="residence" class="col-md-4 control-label">Your residence</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="residence" value="{{ $userProfile->residence }}">

                                @if ($errors->has('residence'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('residence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-md-4 control-label">Let members know you</label>

                            <div class="col-md-6">
                                <textarea name="about" class="form-control" style="height: 160px;">{{ $userProfile->about }}</textarea>

                                 @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Your Date Of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ $userProfile->dob }}" placeholder="yyyy-mm-dd">

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('high_school_name') ? ' has-error' : '' }}">
                            <label for="high_school_name" class="col-md-4 control-label">Senior High School Name</label>

                            <div class="col-md-6">
                                <input id="high_school_name" type="text" class="form-control" name="high_school_name" value="{{ $userProfile->high_school_name }}">

                                @if ($errors->has('high_school_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('high_school_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('high_school_location') ? ' has-error' : '' }}">
                            <label for="high_school_location" class="col-md-4 control-label">Senior High School Location</label>

                            <div class="col-md-6">
                                <input id="high_school_location" type="text" class="form-control" name="high_school_location" value="{{ $userProfile->high_school_location }}">

                                @if ($errors->has('high_school_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('high_school_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('started_school_at') ? ' has-error' : '' }}">
                            <label for="started_school_at" class="col-md-4 control-label">Year Stated Schooling</label>

                            <div class="col-md-6">
                                <input id="started_school_at" type="date" class="form-control" name="started_school_at" value="{{ $userProfile->started_school_at }}" placeholder="yyyy-mm-dd">

                                @if ($errors->has('started_school_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('started_school_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('completed_school_at') ? ' has-error' : '' }}">
                            <label for="completed_school_at" class="col-md-4 control-label">Year Completed School</label>

                            <div class="col-md-6">
                                <input id="completed_school_at" type="date" class="form-control" name="completed_school_at" value="{{ $userProfile->completed_school_at }}" placeholder="yyyy-mm-dd">

                                @if ($errors->has('completed_school_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('completed_school_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Save Profile
                                </button>
                            </div>
                        </div>
                    </form>