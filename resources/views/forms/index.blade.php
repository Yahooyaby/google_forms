
{{Form::open(['route' => ['forms.store'], 'method' => 'POST'])}}
{{ Form::label('name', 'Название формы') }}
{{ Form::text('name') }}
{{Form::submit('Создать') }}
{{ Form::close() }}
@foreach($forms as $form)
    <p><a href="{{route('forms.show',['form'=>$form->id])}}">{{$form->name}}</a></p>
     {{Form::model($form,['route' => ['forms.destroy', $form->id], 'method' => 'DELETE'])}}
        {{Form::submit('Удалить форму') }}
        {{ Form::close() }}
    {{Form::model($form,['route' => ['forms.edit', $form->id], 'method' => 'GET'])}}
    {{Form::submit('Изменить название формы') }}
    {{ Form::close() }}
@endforeach



