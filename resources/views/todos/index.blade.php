@extends( 'layouts.app' )

@section( 'content' )
    @if( count( $todos ) )
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Text</th>
                <th scope="col">Body</th>
                <th scope="col">Due</th>
                <th scope="col">View</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $todos as $todo )
                @php $id = $todo->id @endphp
                <tr class="table-light">
                    <td>{{$id}}</td>
                    <td>{{$todo->text}}</td>
                    <td>{{$todo->body}}</td>
                    <td>{{$todo->due}}</td>
                    <td><a href="{{url( "/todo/$id" )}}">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    @endsection