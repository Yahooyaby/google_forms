@foreach ($forms as $form)
    <p> {{$form->name}} </p>
    {{Form::open(['route' => ['responses.store'], 'method' => 'POST'])}}
    {{Form::submit('Пройти опрос') }}
    {{ Form::close() }}
@endforeach

