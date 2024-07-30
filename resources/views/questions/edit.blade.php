{{Form::model($question,['route' => ['questions.update', $question->id], 'method' => 'PUT'])}}
{{ Form::hidden('id', $question->id) }}
{{ Form::hidden('form_id', $question->form_id) }}
{{ Form::label('question_text', 'Название вопроса') }}
{{ Form::text('question_text', $question->question_text) }}
{{ Form::select('question_type',[$questionTypes] ) }}
{{Form::submit('Обновить вопрос') }}
{{ Form::close() }}
