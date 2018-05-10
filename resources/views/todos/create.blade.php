@extends( 'layouts.app' )

@section( 'content' )
    <h1>Create Todo</h1>
    {!! Form::open(['action' => 'TodosController@store', 'method' => 'POST']) !!}

    <div class="form-group">
        {{Form::label('text', 'Text')}}
        {{Form::text('text', '', [ 'class' => 'form-control', 'placeholder' => 'Enter text' ])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Body' ])}}
    </div>
    <div class="form-group">
        {{Form::label('due', 'Due')}}
        {{Form::text('due', '', [ 'class' => 'form-control', 'placeholder' => 'Due' ])}}
    </div>
    <div class="form-group">
        {{Form::submit( 'Submit', [ 'class' => 'btn btn-primary' ] )}}
    </div>

    {!! Form::close() !!}
@endsection