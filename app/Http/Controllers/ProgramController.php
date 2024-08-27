<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meta = [
            'title' => 'Программа - Всероссийский форум школьных спортивных клубов',
            'keywords' => 'программа',
            'description' => 'Создание программы',
        ];
        $user = Auth::user();
        $programs = Program::orderBy('date')
                            ->orderBy('start_time')
                            ->get();
        $program_arr = [];
        $iter = 0;
        foreach ($programs as $program) {
            $program_arr[$program->date][$iter]['id'] = $program->id;
            $program_arr[$program->date][$iter]['name'] = $program->name;
            $program_arr[$program->date][$iter]['description'] = $program->description;
            $program_arr[$program->date][$iter]['address'] = $program->address;
            $program_arr[$program->date][$iter]['start_time'] = $program->start_time;
            $program_arr[$program->date][$iter]['end_time'] = $program->end_time;
            $program_arr[$program->date][$iter]['long'] = $program->long;
            $program_arr[$program->date][$iter]['marked'] = $program->marked;
            $iter++;
        }

        return view('program.index', compact('meta', 'user', 'program_arr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $meta = [
            'title' => 'Создание элемента программы',
            'keywords' => 'Создание элемента программы',
            'description' => 'Создание элемента программы',
        ];
        $user = Auth::user();
        return view('program.create', compact('meta', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [

                'name' => [
                    'required', 'max:255', 'min:2',
                ],
                'date' => [
                    'required', 'date'
                ],
                'start_time' => [
                    'required', 'date_format:H:i'
                ],
                'end_time' => [
                    'nullable', 'date_format:H:i'
                ],
                'address' => [
                    'nullable', 'max:500', 'min:2'
                ],
                'description' => [
                   'min:2', 'nullable'
                ],
                'marked' => [
                    'nullable', 'integer', 'max:1'
                ],
                'long' => [
                    'nullable', 'integer', 'max:1'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'name.required' => 'Укажите имя',
                'name.max' => 'Имя не должно содержать более 255 символов',
                'name.min' => 'Имя не должно содержать менее 2 символов',

                'date.required' => 'Укажите дату проведения мероприятия',
                'date.date' => 'Указан неверный формат даты',

                'start_time.required' => 'Укажите время начала проведения мероприятия',
                'start_time.date_format' => 'Указан неверный формат времени начала проведения мероприятия',

                'end_time.required' => 'Укажите время окончания проведения мероприятия',
                'end_time.date_format' => 'Указан неверный формат времени окончания проведения мероприятия',

                'address.max' => 'Адрес не должен содержать более 500 символов',
                'address.min' => 'Адрес не должен содержать менее 2 символов',

                'description.min' => 'Описание не должно содержать менее 2 символов',

                'marked.integer' => 'Неверный формат для поля "Доступно для выбора пользователям"',
                'marked.max' => 'Указано слишком большое число для поля "Доступно для выбора пользователям"',

                'long.integer' => 'Неверный формат для поля "Выделенный элемент программы"',
                'long.max' => 'Указано слишком большое число для поля "Выделенный элемент программы"',

            ]

        )->validate();


        $insert = Program::create([
            'name' => $request->name,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'address' => $request->address,
            'description' => $request->description,
            'marked' => (!is_null($request->marked)) ? $request->marked : 0,
            'long' => (!is_null($request->long)) ? $request->long : 0,
        ]);

        if($insert) return redirect()->route('program.index')->with('success', 'Элемент программы был создан успешно');

        return redirect()->back()->with('wrong', 'Что-то пошло не так!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
        $meta = [
            'title' => 'Редактирование элемента программы',
            'keywords' => 'Редактирование элемента программы',
            'description' => 'Редактирование элемента программы',
        ];

        $user = Auth::user();
        return view('program.edit', compact('meta', 'user', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        //
        Validator::make(
            $request->all(),
            // Валидационные правила
            [

                'name' => [
                    'required', 'max:255', 'min:2',
                ],
                'date' => [
                    'required', 'date'
                ],
                'start_time' => [
                    'required', 'date_format:H:i'
                ],
                'end_time' => [
                    'nullable', 'date_format:H:i'
                ],
                'address' => [
                    'nullable', 'max:500', 'min:2'
                ],
                'description' => [
                    'min:2', 'nullable'
                ],
                'marked' => [
                    'nullable', 'integer', 'max:1'
                ],
                'long' => [
                    'nullable', 'integer', 'max:1'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'name.required' => 'Укажите имя',
                'name.max' => 'Имя не должно содержать более 500 символов',
                'name.min' => 'Имя не должно содержать менее 2 символов',

                'date.required' => 'Укажите дату проведения мероприятия',
                'date.date' => 'Указан неверный формат даты',

                'start_time.required' => 'Укажите время начала проведения мероприятия',
                'start_time.date_format' => 'Указан неверный формат времени начала проведения мероприятия',

                'end_time.required' => 'Укажите время окончания проведения мероприятия',
                'end_time.date_format' => 'Указан неверный формат времени окончания проведения мероприятия',

                'address.max' => 'Адрес не должен содержать более 500 символов',
                'address.min' => 'Адрес не должен содержать менее 2 символов',

                'description.min' => 'Описание не должно содержать менее 2 символов',

                'marked.integer' => 'Неверный формат для поля "Доступно для выбора пользователям"',
                'marked.max' => 'Указано слишком большое число для поля "Доступно для выбора пользователям"',

                'long.integer' => 'Неверный формат для поля "Выделенный элемент программы"',
                'long.max' => 'Указано слишком большое число для поля "Выделенный элемент программы"',

            ]

        )->validate();

        $update = Program::where('id', $program->id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'address' => $request->address,
            'description' => $request->description,
            'marked' => (!is_null($request->marked)) ? $request->marked : 0,
            'long' => (!is_null($request->long)) ? $request->long : 0,
        ]);


        if ($update) return redirect()->route('program.index')->with('success', 'Элемент программы обновлён успешно');

        return redirect()->back()->with('wrong', 'Элемент программы не был обновлён. Попробуйте ещё раз или обратитесь в службу поддержки');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //
        Program::destroy($program->id);
        session()->flash('success', 'Элемент программы был удалён');
        return redirect()->route('program.index');
    }

    public function showProgram()
    {

        //
        $meta = [
            'title' => 'Программа Всероссийского форума школьных спортивных клубов',
            'keywords' => 'программа форума шск, программа форума школьных спортивных клубов',
            'description' => 'Программа Всероссийского форума школьных спортивных клубов. Здесь можно просмотреть программу форума шск',
        ];
        $user = Auth::user();
        $programs = Program::orderBy('date')
            ->orderBy('start_time')
            ->get();
        $program_arr = [];
        $iter = 0;
        foreach ($programs as $program) {
            $program_arr[$program->date][$iter]['id'] = $program->id;
            $program_arr[$program->date][$iter]['name'] = $program->name;
            $program_arr[$program->date][$iter]['description'] = $program->description;
            $program_arr[$program->date][$iter]['address'] = $program->address;
            $program_arr[$program->date][$iter]['start_time'] = $program->start_time;
            $program_arr[$program->date][$iter]['end_time'] = $program->end_time;
            $program_arr[$program->date][$iter]['long'] = $program->long;
            $program_arr[$program->date][$iter]['marked'] = $program->marked;
            $iter++;
        }

        return view('program', compact('meta', 'user', 'program_arr'));
    }

    public function pdfProgramGenerate()
    {
        $pdf = Pdf::loadView('program_pdf');

        return $pdf->download('Программа Форума ШСК - 2024.pdf');

    }
}
