<?php

namespace App\Enums;

enum QuestionTypeEnum:string
{
    case text = 'Текстовый вопрос';
    case oneOf = 'Один из списка';
    case someOf = 'Несколько из списка';
}
