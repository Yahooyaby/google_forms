{!! Form::open(['route' => 'answers.store']) !!}
@foreach($questions as $question)
    <div class="question">
        <h3>{{ $question->question_text }}</h3>

        @if($question->question_type == 0)
            {!! Form::text("answers[{$question->id}]", null, ['class' => 'form-control']) !!}
        @elseif($question->question_type == 1)
            @foreach($question->answerOptions as $option)
                <div>
                    {!! Form::radio("answers[{$question->id}]", $option->id, false, ['id' => "option_{$option->id}"]) !!}
                    {!! Form::label("option_{$option->id}", $option->option_text) !!}
                </div>
            @endforeach
        @elseif($question->question_type == 2)
            @foreach($question->answerOptions as $option)
                <div>
                    {!! Form::checkbox("answers[{$question->id}][]", $option->id, false, ['id' => "option_{$option->id}"]) !!}
                    {!! Form::label("option_{$option->id}", $option->option_text) !!}
                </div>
            @endforeach
        @endif
    </div>
@endforeach
{!! Form::hidden('response_id', $response) !!}
{!! Form::submit('Отправить ответы', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}


