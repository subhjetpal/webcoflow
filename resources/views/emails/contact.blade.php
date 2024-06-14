@extends('emails.layout')

@section('content')
        <h3>Hi! {{ $email }} Tries to Contact Webcoflow</h3>
        <p>This is a auto generated Mail for query Referense ID: {{ $queryID }},</p>
        <p>{{ $msg }}</p>
        <p>We will try to revert back as soon as possible</p>
        <p>{{ $phone }}</p>
@endsection
