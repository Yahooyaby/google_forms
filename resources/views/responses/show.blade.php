@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Результаты теста</h1>
        <h2>{{ $response->form->name }}</h2>
        <p>Дата прохождения: {{ $response->created_at->format('d.m.Y H:i') }}</p>

        @foreach($response->form->questions as $question)
            <div class="card mb-3">
                <div class="card-header">
                    <h3>{{ $question->question_text }}</h3>
                </div>
                <div class="card-body">
                    @php
                        $answer = $response->answers->where('question_id', $question->id)->first();
                    @endphp

                    @if($question->question_type == 'text')
                        <p>Ответ: {{ $answer->answer_text ?? 'Не отвечено' }}</p>
                    @elseif($question->question_type == 'radio')
                        <p>Выбранный вариант:
                            @if($answer && $answer->answerOption)
                                {{ $answer->answerOption->option_text }}
                            @else
                                Не выбрано
                            @endif
                        </p>
                    @elseif($question->question_type == 'checkbox')
                        <p>Выбранные варианты:</p>
                        @if($answer && $answer->answerOptions->count() > 0)
                            <ul>
                                @foreach($answer->answerOptions as $option)
                                    <li>{{ $option->option_text }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Ничего не выбрано</p>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
