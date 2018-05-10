@extends( 'layouts.app' )

@section( 'content' )
    <br><br>
    <a href="{{url( '/' )}}" class="btn btn-secondary">Back</a>
    @if( count( $todos ) )
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Text</th>
                <th scope="col">Body</th>
                <th scope="col">Due</th>
            </tr>
            </thead>
            <tbody>
                @php $id = $todos->id @endphp
                <tr class="table-light">
                    <td>{{$id}}</td>
                    <td>{{$todos->text}}</td>
                    <td>{{$todos->body}}</td>
                    <td>{{$todos->due}}</td>
                </tr>
            </tbody>
        </table>

        <br><br>
        @php
            $id = $todos->id;
            $url = url( "/todo/{$id}/edit" )
        @endphp
        <a href="{{ $url }}" class="btn btn-warning">Edit</a>

        {{--Delete Request--}}
        {{--action = "http://todolist.test/todo/id" --}}
        {!! Form::open(['action' => [ 'TodosController@destroy', $todos->id ], 'method' => 'POST', 'class' => 'pull-right']) !!}
        {{--Because it will not allow to put form method as DELETE .. we pass the it as hidden input filed with
        name="_method", value="DELETE" and type="hidden"--}}
        <div class="form-group">
            {{Form::hidden('_method', 'DELETE', [ 'class' => 'form-control', 'type' => 'hidden' ])}}
        </div>
        <div class="form-group">
            {{Form::submit( 'Delete', [ 'class' => 'btn btn-danger' ] )}}
        </div>

        {!! Form::close() !!}
    @endif
@endsection