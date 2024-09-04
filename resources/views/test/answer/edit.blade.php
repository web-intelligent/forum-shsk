@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Редактирование ответа "{{ $answer->answer }}"</h4>
                </div>
                <div>
                    <a href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left-long"></i> Назад</a>
                </div>
                <div class="page-category">
                    <div class="col-sm-12 col-lg-4 offset-sm-0 offset-lg-4 bg-white p-4 rounded-2">
                        <form action="{{ route('answer.update') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="response-message-register">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <small style="font-size: 10px" class="text-white">Нажмите, чтобы скрыть</small>
                                </div>
                            @endif
                            <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Ответ на вопрос *</div>
                                <textarea name="answer" rows="5" placeholder="Пример ответа" class="form-control">{{ old('answer', $answer->answer) }}</textarea>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="right" value="1" @if($answer->right == 1) checked @endif>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Верный ответ</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sn btn-primary">Редактировать ответ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
