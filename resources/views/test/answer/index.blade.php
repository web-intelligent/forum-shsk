@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Список ответов на вопрос "{{ $question->question }}"</h4>
                </div>
                <div>
                    <a href="{{ route('question.index', ['test_id' => $question->test_id]) }}"><i class="fa-solid fa-arrow-left-long"></i> К вопросам</a>
                </div>
                <div class="btn-group" style="position: absolute; top: 100px; right: 25px;">
                    <a class="btn btn-sm btn-label-primary" href="{{ route('answer.create', ['question_id' => $question->id]) }}"><i class="fa-solid fa-square-plus"></i> Добавить ответ</a>
                </div>
                <div class="page-category">
                    @if(count($answers))
                        <table class="table table-striped table-sm mt-4">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ответ</th>
                                <th>Верный</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($answers as $key => $answer)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $answer->answer }}</td>
                                    <td>@if($answer->right == 0) Неверный @elseif($answer->right == 1) <span class="fw-bold text-success">Верный</span> @endif</td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Редактировать ответ" href="{{ route('answer.edit', ['answer_id' => $answer->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить ответ" class="btn btn-outline-primary btn-sm" href="{{ route('answer.destroy', ['answer_id' => $answer->id]) }}"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-muted my-4">Ответов на вопрос не добавлено</div>
                    @endif
                </div>
            </div>
        </div>

@include('includes.profile_footer')
