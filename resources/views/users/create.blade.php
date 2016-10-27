@extends('layouts.master')

@section('title', 'Generate some Dummy Users')

@section('content')
    <h1>Generate Some Dummy Users</h1>
    <form method='POST' action='/createuserdata'>

        {{ csrf_field() }}

        Number of Users: <input type='text' name='numberOfUsers' value='{{ $prevUsers }}'>(Max 25)
        <br>

        {{-- Only show checkboxes if passed a previous value --}}
        @if ($prevBirth)
            BirthDates: <input type='checkbox' name='birthDate' checked='yes'>
        @else
            BirthDates: <input type='checkbox' name='birthDate'>
        @endif
        <br>
        @if ($prevBio)
            Bio's:      <input type='checkbox' name='bio' checked='yes'>
        @else
            Bio's:      <input type='checkbox' name='bio'>
        @endif

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
