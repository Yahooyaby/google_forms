

{{Form::open(['route' => ['question.store',['form_id'=>$form_id]], 'method' => 'POST'])}}
{{ Form::label('question_text', 'Вопрос') }}
{{ Form::text('question_text') }}
{{ Form::select('question_type',[$questionType] ) }}
{{Form::submit('Создать вопрос') }}
{{ Form::close() }}


