<?php



Route::get('report','HomeController@create', function () {
    return view('front.questionier.create');
});
Route::get('/uchaguzi-huru', 'ReportController@index')->name('report.index');
Route::get('/report', 'ReportController@create')->name('report.create');
Route::post('report', 'ReportController@store')->name('report.store');
Route::get('/thanks', 'ReportController@thanks')->name('thanks');
Route::get('/show-reports', 'ReportController@show')->name('show-reports');

Route::redirect('/admin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::redirect('/', '/uchaguzi-huru');

;

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Respondent Category
    Route::delete('respondent-categories/destroy', 'RespondentCategoryController@massDestroy')->name('respondent-categories.massDestroy');
    Route::resource('respondent-categories', 'RespondentCategoryController');

    // Respondent
    Route::delete('respondents/destroy', 'RespondentController@massDestroy')->name('respondents.massDestroy');
    Route::resource('respondents', 'RespondentController');

    // Resource
    Route::delete('resources/destroy', 'ResourceController@massDestroy')->name('resources.massDestroy');
    Route::resource('resources', 'ResourceController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionController');

    // Answer
    Route::delete('answers/destroy', 'AnswerController@massDestroy')->name('answers.massDestroy');
    Route::post('answers/media', 'AnswerController@storeMedia')->name('answers.storeMedia');
    Route::post('answers/ckmedia', 'AnswerController@storeCKEditorImages')->name('answers.storeCKEditorImages');
    Route::resource('answers', 'AnswerController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // County
    Route::delete('counties/destroy', 'CountyController@massDestroy')->name('counties.massDestroy');
    Route::resource('counties', 'CountyController');

    // Sub County
    Route::delete('sub-counties/destroy', 'SubCountyController@massDestroy')->name('sub-counties.massDestroy');
    Route::resource('sub-counties', 'SubCountyController');

    // Constituency
    Route::delete('constituencies/destroy', 'ConstituencyController@massDestroy')->name('constituencies.massDestroy');
    Route::resource('constituencies', 'ConstituencyController');

    // Ward
    Route::delete('wards/destroy', 'WardController@massDestroy')->name('wards.massDestroy');
    Route::resource('wards', 'WardController');

    // Office
    Route::delete('offices/destroy', 'OfficeController@massDestroy')->name('offices.massDestroy');
    Route::resource('offices', 'OfficeController');

    // Source
    Route::delete('sources/destroy', 'SourceController@massDestroy')->name('sources.massDestroy');
    Route::resource('sources', 'SourceController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('wizard', function () {
    return view('default');
});

/*Route::get('report-misuse', function () {
    return view('front.create');
});*/
