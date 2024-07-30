<h1>Форма {{$form->name}}</h1>
<p><a href="{{route('forms.questions.create',['form'=>$form->id])}}">Добавить вопрос</a></p>

@foreach($questions as $question)
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
        <h2 style="margin: 0;">{{$question->question_text}}</h2>
        {{Form::model($question,['route' => ['questions.edit', $question->id], 'method' => 'GET'])}}
        {{Form::submit('Изменить текст вопроса') }}
        {{ Form::close() }}
        {{Form::model($question, ['route' => ['questions.destroy', $question->id], 'method' => 'DELETE', 'style' => 'margin: 0;'])}}
        {{Form::submit('Удалить вопрос', ['class' => 'btn btn-danger btn-sm']) }}
        {{ Form::close() }}
    </div>
    @if($question->question_type)
    <h3>Варианты ответа:</h3>
    @foreach($question->answerOptions as $answerOption)
        <p>{{$answerOption->option_text}}</p>
    @endforeach

    {{Form::open(['route' => ['forms.answerOption.store',['form'=>$form->id,'question'=>$question->id]], 'method' => 'POST'])}}
    {{ Form::label('option_text', 'Добавить вариант ответа') }}
    {{ Form::text('option_text') }}
    {{Form::submit('Создать') }}
    {{ Form::close() }}
    @endif
@endforeach
