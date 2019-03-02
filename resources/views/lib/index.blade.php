@extends('layouts/main')
@section('title', $title)
@section('content')
@if(Session::has('message'))
    <div class="notification is-primary">
        <p>{{ Session::get('message') }}</p>
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            @forelse($fields as $field)
                <th>{{ $field }}</th>
            @endforeach
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lib as $l)
            <tr>
                <td>{{ $l['id'] }}</td>
                <td>{{ $l['title'] }}</td>
                <td>{{ $l['language'] }}</td>
                <td>{{ $l['star'] }}</td>
                <td>{{ $l['created_at'] }}</td>
                <td>{{ $l['updated_at'] }}</td>
            <td>
                <form action="{{ route('lib.destroy', $l['id']) }}" method="POST">
                @method('DELETE')
                @csrf
                <a href="{{ url('lib/' . $l['id']) }}" class="button is-primary is-outlined">VIEW</a>
                <a href="{{ url('lib/' . $l['id']) . '/edit' }}" class="button is-primary is-outlined">EDIT</a>
                <button type="submit" class="button is-primary is-outlined">DELETE</button>
                </form>
            </td>
            </tr>
        @empty
            <h1>No Data</h1>
        @endforelse
    </tbody>
</table>
<a href="{{ url('lib/create') }}" class="button is-primary is-outlined">ADD</a>
@endsection
