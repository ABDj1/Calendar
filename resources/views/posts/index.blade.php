@extends('layouts.app')

@section('title', 'All posts!')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-success">Add New Events</a>
    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif
{{--    <div class="row input-daterange mt-3">--}}
{{--        <div class="col-md-4">--}}
{{--            <input type="text" name="start_date" id="start_date" class="form-control" placeholder="From date" readonly />--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--            <input type="text" name="end_date" id="end_date" class="form-control" placeholder="To Date" readonly />--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>--}}
{{--            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>--}}
{{--        </div>--}}
    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Event Name</th>
            <th scope="col">Description</th>
            <th scope="col">Start date</th>
            <th scope="col">End date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
                <th scope="row">{{ $event->id }}</th>
                <td>{{ $event->event_name }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->start_date }}</td>
                <td>{{ $event->end_date }}</td>
                <td class="flex w-full text-center">
                    <a href="{{ route('posts.edit', $event) }}" class="mx-2 btn btn-success">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form style="display: contents" action="{{ route('posts.destroy', $event) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
