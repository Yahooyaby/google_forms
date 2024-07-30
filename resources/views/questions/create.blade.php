
{{Form::open(['route' => ['forms.questions.store', $form->id], 'method' => 'POST'])}}
{{ Form::label('question_text', 'Вопрос') }}
{{ Form::text('question_text') }}
{{ Form::select('question_type',[$questionTypes] ) }}
{{Form::submit('Создать вопрос') }}
{{ Form::close() }}


