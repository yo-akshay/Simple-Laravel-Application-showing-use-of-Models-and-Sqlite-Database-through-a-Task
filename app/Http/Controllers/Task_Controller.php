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
	
	public function insert()
    {
		$Title = Input::get('Title');
		$Completed = Input::get('Completed');
		$Description = Input::get('Description');
		$insert=DB::table('task')->insert(['Title' => $Title,'Completed' => $Completed,'Description'=> $Description,'created_at' => new DateTime ,'updated_at'=>new DateTime]);
        if($insert)
			echo"Successfully inserted";
		else
			echo "error";
    }
	
	public function del()
    {
		$title=Input::get('Title');
		$flag=Task::where('title', $title)->delete();
		if($flag)
			echo "successfully deleted<br>";
		else
			echo  "error not deleted";
    }
	
	public function update()
    {
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
		if($flag)
			echo "successfully updated<br>";
		else
			echo  "error not updated";
    }
}