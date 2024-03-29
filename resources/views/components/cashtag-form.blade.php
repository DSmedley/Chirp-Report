<!--Analyze Twitter User-->
<div class="card">
    <div class="card-header">Analyze Cashtag</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                Enter a cashtag about a topic of interest. We will gather the given cashtag details and the tweets related to it, analyze them and put the results into simple and easy to read charts.
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
                <form class="form-horizontal" method="POST" action="{{ route('cashtag') }}">
                    {{ csrf_field() }}

                    <div class="col-sm-4" style="margin-right:15px;">
                        <div class="form-group{{ $errors->has('cashtag') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input id="cashtag" name="cashtag" type="text" class="form-control" placeholder="Enter Cashtag" aria-describedby="sizing-addon2">
                            </div>

                            @if ($errors->has('cashtag'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('cashtag') }}</strong>
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
