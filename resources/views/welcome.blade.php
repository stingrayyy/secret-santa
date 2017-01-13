@extends('layouts.app')

@section('head')
    <title>Hi Santa - The Secret Santa Generator</title>
    <meta name="description" value="Got a secret santa group coming up? Hi Santa will automatically work out your group">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <img src="images/santa.png" alt="Santa" width="241" height="343" />

                <div id="santa-intro">
                    Make Me Santa
                </div>

                @if(count($errors) > 0)
                    <div class="alert alert-danger col-md-4 col-md-offset-4 error-dialog">
                        <p>There's some errors with your input.</p>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="santa-form" method="post" action="/create">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12 form-heading">
                            About you...
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-label">
                            <label>Your Name:</label>
                        </div>
                        <div class="col-md-6 form-label">
                            <label>Your Email:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name[]" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email[]" class="form-field" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-heading">
                            Your friends...
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-label">
                            <label>Their Name:</label>
                        </div>
                        <div class="col-md-6 form-label">
                            <label>Their Email:</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name[]" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email[]" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name[]" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email[]" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name[]" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email[]" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name[]" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email[]" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name[]" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email[]" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name[]" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email[]" class="form-field" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-submit">
                            <input type="submit" value="Submit" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection