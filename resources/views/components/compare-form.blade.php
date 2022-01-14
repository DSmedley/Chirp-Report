<!--Compare Twitter Users-->
<div class="card">
    <div class="card-header">Compare Twitter Users</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                Enter up to four friends, competitors, employee candidates or industry leaders. We will gather the given user details and latest tweets, analyze them and put them into simple and easy to read charts.
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('twitterError'))
                    <div class="alert alert-danger">
                        {{ session('twitterError') }}
                    </div>
                @endif
                @if (session('twitterSuccess'))
                    <div class="alert alert-success">
                        {{ session('twitterSuccess') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('compare') }}">
                    {{ csrf_field() }}

                    <div class="col-sm-3" style="margin-right:15px;">
                        <div class="form-group{{ $errors->has('name1') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input id="name1" name="name1" type="text" class="form-control" placeholder="Twitter Name" aria-describedby="sizing-addon2">
                            </div>

                            @if ($errors->has('name'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('name1') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-3" style="margin-right:15px;">
                        <div class="form-group{{ $errors->has('name2') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input id="name2" name="name2" type="text" class="form-control" placeholder="Twitter Name" aria-describedby="sizing-addon2">
                            </div>

                            @if ($errors->has('name'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('name2') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-3" style="margin-right:15px;">
                        <div class="form-group{{ $errors->has('name3') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input id="name3" name="name3" type="text" class="form-control" placeholder="Twitter Name" aria-describedby="sizing-addon2">
                            </div>

                            @if ($errors->has('name'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('name3') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-3" style="margin-right:15px;">
                        <div class="form-group{{ $errors->has('name4') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input id="name4" name="name4" type="text" class="form-control" placeholder="Twitter Name" aria-describedby="sizing-addon2">
                            </div>

                            @if ($errors->has('name'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('name4') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" id="analyzeButton" data-loading-text="Loading..." name="analyze" class="btn btn-primary">
                                Compare
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <strong>Note:</strong> This may take up to a minute to complete the analysis.
            </div>
        </div>
    </div>
</div>
<!--End Compare Twitter Users-->
