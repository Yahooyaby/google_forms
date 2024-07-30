{{Form::model($form,['route' => ['forms.update', $form->id], 'method' => 'PUT'])}}
{{ Form::hidden('id', $form->id) }}
{{ Form::label('name', 'Название формы') }}
{{ Form::text('name', $form->name) }}
{{Form::submit('Обновить название формы') }}
{{ Form::close() }}
