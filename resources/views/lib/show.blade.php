@extends('layouts.main')

@section('content')
<h1 class="has-text-centered">Library</h1>
<nav class="panel">
    <p class="panel-heading">{{ $lib->title }}</p>
    <div class="panel-block">
        <ul>
            @foreach($fields as $field)
                <li>{{ $field . ' : ' . $lib->{$field} }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <a href="{{ url('lib') }}" class="button is-primary is-outlined">ย้อนกลับ</a>
    </div>
</nav>
@endsection