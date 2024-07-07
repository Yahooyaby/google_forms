
{{Form::open(['route' => ['forms.store'], 'method' => 'POST'])}}
{{ Form::label('name', 'Название формы') }}
{{ Form::text('name') }}
{{Form::submit('Создать') }}
{{ Form::close() }}
@foreach($forms as $form)
    <p><a href="{{route('forms.show',['form_id'=>$form->id])}}">{{$form->name}}</a></p>
@endforeach
