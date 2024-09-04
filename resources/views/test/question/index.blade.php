@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Список вопросов к тесту "{{ $test->name }}"</h4>
                </div>
                <div>
                    <a href="{{ route('test.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Назад</a>
                </div>
                <div class="btn-group" style="position: absolute; top: 100px; right: 25px;">
                    <a class="btn btn-sm btn-label-primary" href="{{ route('question.create', ['test_id' => $test_id]) }}"><i class="fa-solid fa-square-plus"></i> Добавить вопрос</a>
                </div>
                <div class="page-category">
                    @if(count($questions))
                        <table class="table table-striped table-sm mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Вопрос</th>
                                    <th>Тип</th>
                                    <th>Кол-во ответов</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $key => $question)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>@if($question->type == 1) Выбор одного ответа @elseif($question->type == 2) Выбор нескольких ответов ответа @elseif($question->type == 3) Свободная форма ответа @endif</td>
                                        <td>
                                            {{ \Illuminate\Support\Facades\DB::table('answers')->where('question_id', '=', $question->id)->groupBy('question_id')->count() }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Ответы на вопрос" href="{{ route('answer.index', ['question_id' => $question->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-comment"></i></a>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Редактировать вопрос" href="{{ route('question.edit', ['question_id' => $question->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a onclick="if(!confirm('Вы уверены, что хотите удалить вопрос')) return false" data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить вопрос" class="btn btn-outline-primary btn-sm" href="{{ route('question.destroy', ['question_id' => $question->id]) }}"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-muted my-4">Вопросов к тесту пока нет</div>
                    @endif
                </div>
            </div>
        </div>

@include('includes.profile_footer')
