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

                <form id="santa-form" method="post" action="/santa">
                    <div class="row">
                        <div class="col-md-12 form-heading">
                            About you...
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-label">
                            <label for="primary-name">Your Name:</label>
                        </div>
                        <div class="col-md-6 form-label">
                            <label for="primary-email">Your Email:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="primary_name" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="primary_email" class="form-field" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-heading">
                            Your friends...
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-label">
                            <label for="primary-name">Their Name:</label>
                        </div>
                        <div class="col-md-6 form-label">
                            <label for="primary-email">Their Email:</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name_01" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email_01" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name_02" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email_02" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name_03" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email_03" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name_04" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email_04" class="form-field" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_name_05" class="form-field" />
                        </div>
                        <div class="col-md-6 form-input">
                            <input type="text" name="participant_email_05" class="form-field" />
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