@extends('layouts.app')

@section('title', 'Add Event!')

@section('content')
    <div class="row">
        <div class="col-lg-8 mt-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route ('posts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="post-event_name">Event Name:</label>
                    <input type="text" value="{{ old('event_name') }}" class="form-control" name="event_name"
                           id="post-title">
                </div>
                <div class="form-group">
                    <label for="post-description">Description:</label>
                    <textarea class="form-control" id="post-description" name="description"
                              rows="3">{{ old('description') }}</textarea>
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
                <button type="submit" class="btn btn-success">Add Event</button>
            </form>
        </div>
    </div>
@endsection
