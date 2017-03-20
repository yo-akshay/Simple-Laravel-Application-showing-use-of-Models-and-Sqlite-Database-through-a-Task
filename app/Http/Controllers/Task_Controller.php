<?php

namespace App\Http\Controllers;

use DB;
use App\Task;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Task_Controller extends Controller
{
    public function decide()
    {
         $input = Input::get('btn');
        if ($input=="create task")
	    {
			return view('create_task');
		}
		if ($input=="delete task")
		{
			return view('delete_task');
		}
		if ($input=="update task")
		{
			return view('update_task');
		}
		if ($input=="show all task")
		{
			$rows=Task::all()->toArray();
			foreach($rows as $values)
			{
				foreach($values as $key=>$val)
				echo "$key  :  $val <br>";
				echo "<br><br>";
			}
		}
    }
}
