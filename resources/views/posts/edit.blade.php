@extends('layouts.app')

@section('title', 'Edit Page')

@section('content')
    <div class="row">
        <div class="col-lg-6 mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('posts.update', $event->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="post-event_name">Event name:</label>
                    <input type="text" name="event_name"
                           required value="{{ $event->event_name}}" class="form-control" id="post-event_name">
                </div>
                <div class="form-group">
                    <label for="post-description">Description:</label>
                    <textarea name="description" class="form-control" id="post-description" rows="3">{{ $event->description }}</textarea>
                </div>
                <div class="flex-row flex">
                    <div class="form-group mr-2 flex-1">
                        {!! Form::label('start_date','Start Date:') !!}
                        <div class="">
                            {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="ml-2 form-group flex-1">
                        {!! Form::label('end_date','End Date:') !!}
                        <div class="">
                            {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>
@endsection
