@extends('layouts.app')

@section('head')
	<title>Hi Santa - The Secret Santa Generator</title>
    <meta name="description" value="Got a secret santa group coming up? Hi Santa will automatically work out your group">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="view-content">
				@if (!$hash_found)
					<h1>Sorry!</h1>
					<p>A match could not be found.</p>
					<p>Please check your mailbox for an email from us and try again.</p>
					<p>Alternatively - <a href="/">set up a new group</a> using Hi Santa.</p>
				@else
					<h1>Hi {{ $santa }}!</h1>
					<p>You've been selected to be santa for {{ $recipient }}. Please remember to buy a present before the group meet up.</p>
				@endif
			</div>
		</div>
	</div>
@endsection