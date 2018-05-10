@extends( 'layouts.app' )

@section( 'content' )
    <br><br>
    <a href="{{url( "/todo/$todos->id" )}}" class="btn btn-secondary">Back</a>
    <br><br>
    <h1>Update Todo</h1>
    {{--action = "http://todolist.test/todo/id" --}}
    {!! Form::open(['action' => [ 'TodosController@update', $todos->id ], 'method' => 'POST']) !!}

    <div class="form-group">
        {{Form::label('text', 'Text')}}
        {{Form::text('text', $todos->text, [ 'class' => 'form-control', 'placeholder' => 'Enter text' ])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $todos->body, [ 'class' => 'form-control', 'placeholder' => 'Body' ])}}
    </div>
    <div class="form-group">
        {{Form::label('due', 'Due')}}
        {{Form::text('due', $todos->due, [ 'class' => 'form-control', 'placeholder' => 'Due' ])}}
    </div>
    {{--Because it will not allow to put form method as PUT .. we pass the it as hidden input filed with
    name="_method", value="PUT" and type="hidden"--}}
    <div class="form-group">
        {{Form::hidden('_method', 'PUT', [ 'class' => 'form-control', 'type' => 'hidden' ])}}
    </div>
    <div class="form-group">
        {{Form::submit( 'Update', [ 'class' => 'btn btn-primary' ] )}}
    </div>

    {!! Form::close() !!}
@endsection