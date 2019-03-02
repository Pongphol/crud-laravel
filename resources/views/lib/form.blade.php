@extends('layouts.main')
@section('title', $title)
@section('content')
<h1 class="has-text-centered">Form Code</h1>
<nav class="panel">
    <p class="panel-heading">
    @if(isset($lib))
        Edit Form
    @else
        Add Form
    @endif
    </p>
    <div class="panel-block">
    @if(isset($lib))
        <form action="{{ url('lib/' . $lib->id) }}" method="post">
        @method('PUT')
        @csrf
    @else
        <form action="{{ url('lib') }}" method="post">
        @csrf
    @endif
        @if($errors->any())
            <ul>
                <div class="notification is-primary">
                    @foreach($errors->all() as $error)
                        <li> - {{ $error }}</li>
                    @endforeach
                </div>
            </ul>
        @endif
        <label>Title </label>
        <input type="text" class="input is-info" name="title" value="{{ isset($lib->title) ? $lib->title : '' }}"><br>
        <label>Language </label>
        <input type="text" class="input is-info" name="language" value="{{ isset($lib->language) ? $lib->language : '' }}"><br>
        <label>Star </label>
        <input type="text" class="input is-info" name="star" value="{{ isset($lib->star) ? $lib->star : '' }}"><br>
        <input type="submit" class="button is-primary is-medium is-fullwidth" value="{{ isset($lib) ? 'SAVE' : 'ADD' }}">
        <a href="{{ url('lib') }}" style="text-decoration: underline!important; margin-top: 10px;">BACk</a>
        </form>
    </div>
</nav>
@endsection