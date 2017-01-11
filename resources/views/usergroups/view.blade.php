@extends('layouts.app')

@section('head')
	<title>Hi Santa - The Secret Santa Generator</title>
    <meta name="description" value="Got a secret santa group coming up? Hi Santa will automatically work out your group">
@endsection

@section('content')
	@if (!$hash_found)
		<p>A match could not be found, sorry!</p>
		<p>Please check your mailbox for an email from us and try again.</p>
		<p>Alternatively - <a href="/">set up a new group</a> using Hi Santa.</p>
	@else
		<p>Hi there {{ $santa }}</p>
		<p>You've been selected to be santa for {{ $recipient }}. Please remember to buy a present before the group meet up.</p>
	@endif
@endsection