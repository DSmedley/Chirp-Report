<!--Analyze Twitter User-->
<div class="card">
    <div class="card-header">New Analysis</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                Enter friends, competitors, employee candidates or industry leaders. We will gather the given user details and latest tweets, analyze them and put them into simple and easy to read charts.
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
                <form class="form-horizontal" method="POST" action="{{ route('analyze') }}">
                    {{ csrf_field() }}

                    <div class="col-sm-4" style="margin-right:15px;">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Enter Twitter Screen Name" aria-describedby="sizing-addon2">
                            </div>

                            @if ($errors->has('name'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" id="analyzeButton" data-loading-text="Loading..." name="analyze" class="btn btn-primary">
                                Analyze
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
<!--End Analyze Twitter User-->
