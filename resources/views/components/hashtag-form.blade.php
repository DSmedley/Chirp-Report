<!--Analyze Twitter User-->
<div class="card">
    <div class="card-header">Analyze Hashtag</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                Enter a hashtag about a topic of interest. We will gather the given hashtag details and the tweets related to it, analyze them and put the results into simple and easy to read charts.
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
                <form class="form-horizontal" method="POST" action="{{ route('hashtag') }}">
                    {{ csrf_field() }}

                    <div class="col-sm-4" style="margin-right:15px;">
                        <div class="form-group{{ $errors->has('hashtag') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">#</span>
                                </div>
                                <input id="hashtag" name="hashtag" type="text" class="form-control" placeholder="Enter Hashtag" aria-describedby="sizing-addon2">
                            </div>

                            @if ($errors->has('hashtag'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('hashtag') }}</strong>
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
