@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="intro-overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Edit Profile</h2>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
</div>
<!-- /.banner -->
<br/>
<div class="container target">
    @component('components.userHeader')
    @endcomponent
    <div class="row">
        <div class="col-sm-4">
            <!--Change Password-->
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    @if (session('passwordError'))
                        <div class="alert alert-danger">
                            {{ session('passwordError') }}
                        </div>
                    @endif
                        @if (session('passwordSuccess'))
                            <div class="alert alert-success">
                                {{ session('passwordSuccess') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="{{ route('user.edit') }}" id="changePassword">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <div class="col-lg-12">
                                <input id="current-password" type="password" class="form-control" name="current-password" placeholder="Current Password" required>

                                @if ($errors->has('current-password'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <div class="col-lg-12">
                                <input id="new-password" type="password" class="form-control" name="new-password" placeholder="New Password" required>

                                @if ($errors->has('new-password'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 offset-3">
                                <button type="button" id="changePasswordButton" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Change Password-->
            <!--Change Username-->
            <div class="card">
                <div class="card-header">Change Name</div>
                <div class="card-body">
                    @if (session('nameError'))
                        <div class="alert alert-danger">
                            {{ session('nameError') }}
                        </div>
                    @endif
                    @if (session('nameSuccess'))
                        <div class="alert alert-success">
                            {{ session('nameSuccess') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('user.edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-lg-12">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Enter New Name" required>

                                @if ($errors->has('name'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 offset-3">
                                <button type="submit" name="changeName" class="btn btn-primary">
                                    Change Name
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Change Username-->
        </div>
        <div class="col-sm-4">
            <!--Change Email-->
            <div class="card">
                <div class="card-header">Change Email</div>
                <div class="card-body">
                    <p><strong>Current Email:</strong> {{ Auth::user()->email }}</p>
                    @if (session('emailError'))
                        <div class="alert alert-danger">
                            {{ session('emailError') }}
                        </div>
                    @endif
                    @if (session('emailSuccess'))
                        <div class="alert alert-success">
                            {{ session('emailSuccess') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('user.edit') }}" id="changeEmail">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-lg-12">
                                <input id="email" type="email" class="form-control" name="email" placeholder="New Email" required>

                                @if ($errors->has('email'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <input id="email-confirm" type="email" class="form-control" name="email_confirmation" placeholder="Confirm Email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 offset-3">
                                <button type="button" id="changeEmailButton" class="btn btn-primary">
                                    Change Email
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Change Email-->
            <!--Change Bio-->
            <div class="card">
                <div class="card-header">Change Bio</div>
                <div class="card-body">
                    @if (session('bioError'))
                        <div class="alert alert-danger">
                            {{ session('bioError') }}
                        </div>
                    @endif
                    @if (session('bioSuccess'))
                        <div class="alert alert-success">
                            {{ session('bioSuccess') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('user.edit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <div class="col-lg-12">
                                <textarea id="bio" class="form-control" name="bio" placeholder="Enter Bio" required>
                                </textarea>

                                @if ($errors->has('bio'))
                                    <span class="form-text">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 offset-3">
                                <button type="submit" name="changeBio" class="btn btn-primary">
                                    Change Bio
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Change Bio-->
        </div>
        <div class="col-sm-4">
            <!--Change Avatar-->
            <div class="card">
                <div class="card-header">Change Avatar</div>
                <div class="card-body">
                    @if (session('avatarError'))
                        <div class="alert alert-danger">
                            {{ session('avatarError') }}
                        </div>
                    @endif
                    @if (session('avatarSuccess'))
                        <div class="alert alert-success">
                            {{ session('avatarSuccess') }}
                        </div>
                    @endif
                    <form enctype="multipart/form-data" action="{{ route('user.edit') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" name="avatar" class="btn btn-secondary">
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 offset-3">
                                <button type="submit" name="changeAvatar" class="btn btn-primary">
                                    Change Avatar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Change Avatar-->
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{ asset('js/alerts.js')}}"></script>
@endsection
