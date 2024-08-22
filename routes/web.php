<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');
//
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    dd($request);
//    $request->fulfill();
//
//    return redirect()->route('home')->with('success', 'test');
//})->middleware(['auth', 'signed'])->name('verification.verify');
//
//Route::post('/email/verification-notification', function (Request $request) {
//    dd($request);
//    $request->user()->sendEmailVerificationNotification();
//
//    return back()->with('message', 'Verification link sent!');
//})->middleware(['auth'])->name('verification.send');


Route::get('/', function () {
    // Получаем данные об отзывах, обращаемся к другой БД
    $curl = curl_init();
    $data = [
        'table' => 'forum_ssc_poll',
        'columns' => [
            'six'
        ],
    ];

    $params = http_build_query(array(
        'data' => json_encode($data, JSON_UNESCAPED_UNICODE)
    ));

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'xn----itbjbj2arv.xn--p1ai/wp-content/plugins/shsk_forum_data/curls/testimonials.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params
    ));

    $testimonials = curl_exec($curl); // На выходе получаем отзывы в формате json (Фото, ФИО, специальность, отзыв)
    curl_close($curl);

    $testimonials = trim($testimonials);
    $testimonials = json_decode($testimonials, true); // Декодируем json в array

    $meta = [
        'title' => 'Всероссийский форум Школьных спортивных клубов',
        'keywords' => 'всероссийский форум шск, всероссийский форум школьных спортивных клубов, форум шск, форум шск ' . date('Y'),
        'description' => 'Всероссийский форум школьных спортивных клубов состоится в детском лагере отдыха "Артек", 19-21 сентября 2024 года. Это уникальное событие, объединяющее лучших представителей школьного спорта со всей страны'
    ];

    return view('welcome', compact('testimonials', 'meta'));

})->name('home');





Route::get('/авторизация', [UserController::class, 'authForm'])->name('login');
Route::get('/выход', [UserController::class, 'logout'])->name('logout');
Route::get('/регистрация', [UserController::class, 'registerForm'])->name('register.form');
Route::post('/регистрация', [UserController::class, 'registerUser'])->name('register.user.submit');
Route::post('/вход', [UserController::class, 'authUser'])->name('auth.user.submit');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/личный-кабинет', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/редактирование-личного-кабинета', [UserController::class, 'changeProfileDataForm'])->name('change.profile.data.form');
    Route::post('/редактирование-личного-кабинета', [UserController::class, 'changeProfileDataFormRequest'])->name('change.profile.data.request');
    Route::post('/загрузка-фотографии', [UserController::class, 'uploadAvatar'])->name('upload.avatar');
    Route::get('/опрос', [UserController::class, 'pollForm'])->name('poll.form');
    Route::get('/сертификаты', [UserController::class, 'certificatePage'])->name('certificates');
    Route::post('/загрузка-материалов', [UserController::class, 'uploadMaterials'])->name('upload.materials');
});

Route::group(['prefix' => 'password', 'middleware' => 'guest'], function () {
    Route::get('/забыли-пароль', [PasswordController::class, 'index'])->name('password-forgot');
    Route::post('/забыли-пароль', [PasswordController::class, 'store'])->name('password-send-link');
    Route::get('/сброс-пароля', [PasswordController::class, 'reset'])->name('password.reset');
    Route::post('/сброс-пароля', [PasswordController::class, 'resetRequest'])->name('password.reset.request');
});

Route::get('/участник-форума/{id}', [UserController::class, 'scanUser'])->name('scan.user');

/*
 * Отправка писем подтверждения адреса электронной почты
 * */

Route::get('/email/verify', function () {
    $meta = [
        'title' => 'Подтверждение адреса электронной почты',
        'description' => 'Подтвердите адрес электронной почты',
        'keywords' => 'подтверждение адреса электронной почты'
    ];
    return view('auth.verify-email', compact('meta'));

})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('user.profile')->with('success', 'Адрес электронной почты подтверждён успешно');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return redirect()->back()->with('success', 'Ссылка для подтверждения адреса электронной почты была отправлена повторно');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');






