@extends('layouts.app')

@section('content')
<div class="container target">
    @component('components.userHeader')
    @endcomponent
    <div class="row">
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Bio</div>
                <div class="card-body">{{ Auth::user()->bio }}</div>
            </div>
            <div class="card target">
                <div class="card-header" contenteditable="false">Saved analyses</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <!--<img alt="300x200" src="">-->
                                <div class="caption">
                                    <h3>Twitter Username</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
