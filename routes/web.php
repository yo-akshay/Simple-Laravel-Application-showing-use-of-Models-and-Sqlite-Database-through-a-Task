<?php

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
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('task');
});

Route::get('/create_task', function () {
    return view('create_task');
});

Route::get('/decide', "Task_Controller@decide");

Route::get('/insert', function(Request $request){
		$Title = Input::get('Title');
		$Completed = Input::get('Completed');
		$Description = Input::get('Description');
		$task = new Task;
        $task->title = $Title;
		$task->completed = $Completed;
		$task->description = $Description ;
        $task->save();
        return redirect('/');
});

Route::get('/update', function(Request $request){
		$id=Input::get('id');
		$title=Input::get('Title');
		$completed=Input::get('Completed');
		$description=Input::get('Description');
		$upd = array(
         'title' => $title,
         'completed' => $completed,
		 'description' => $description
		);
		$flag = Task::find($id)->update($upd);
		return redirect('/');
});

Route::get('/del', function(Request $request){
		$id = Input::get('Title');
		Task::findOrFail($id)->delete();
        return redirect('/');
});
