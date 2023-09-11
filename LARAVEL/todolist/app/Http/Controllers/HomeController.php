<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;

class HomeController extends Controller {
    public function home(Request $request) 
    {
        $fullname = $request->user()->fullname;
        $tasks = Task::where('fkUser_id', $request->user()->id)->get();

        return view('home', ['fullname' => $fullname, 'tasks' => $tasks]);
   }

   public function add(Request $request)
   {
        $request->validate([
            'description' => 'string|required',
            'do_date' => 'date|required'
        ]);

        $description = $request->input('description');
        $do_date = $request->input('do_date');

        $result = Task::create([
            'description' => $description,
            'do_date' => $do_date,
            'fkUser_id' => $request->user()->id
        ]);

        if($result)
        {
            return redirect()->route('homepage');
        }
        else
        {
            return redirect()->route('homepage')->withErrors(['Gagal menambah Task.']);
        }
   }

   public function delete(Request $request)
    {
        $request->validate([
            'id' => 'integer|required|exists:tasks,id',
        ]);

        $id = $request->input('id');

        $task = Task::find($id);

        if(!$task)
        {
            return redirect()->route('homepage')->withErrors(['Data tidak ditemukan']);
        }

        $result = $task->delete();

        if($result)
        {
            return redirect()->route('homepage');
        }
        else
        {
            return redirect()->route('homepage')->withErrors(['Gagal menghapus.']);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->route('id');

        $task = Task::find($id);

        return view('edit_task', ['task' => $task]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'string|required',
            'do_date' => 'date|required',
            'id' => 'integer|required|exists:tasks,id'
        ]);

        $id = $request->input('id');
        $description = $request->input('description');

        $task = Task::find($id);

        // $task->$description = $description;
        $task->description = $description;
        $task->do_date = $request->input('do_date');

        
        $result = $task->save();

        if($result)
        {
            return redirect()->route('homepage');
        }
        else
        {
            return redirect()->url("/edit/$id")->withErrors(['Gagal mengubah task.']);
        }
    }
}