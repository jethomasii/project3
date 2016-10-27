@extends('layouts.master')

@section('title', 'Generate some Dummy Text')

@section('content')
    <h1>Generate Some Dummy Text</h1>
    <form method='POST' action='/dummytext/create'>

        {{ csrf_field() }}

        Number of Paragraphs: <input type='text' name='numberOfParagraphs' value='{{ old("title") }}'>(Max 25)
        <br>

        <input type='submit' value='Generate'>

        @if(count($errors) > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>

    @if($text)
      {!! $text !!}
    @endif

@endsection
