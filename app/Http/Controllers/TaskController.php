<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SettingsDSP;
use App\Models\Task;
use App\Models\TaskItemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {

    }

    public function index() {
        $select = [
            "id","title"
        ];
        $project = (new Project)
            ->select($select)
            ->with('tasks','users')
            ->get()->toArray();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ;
//        $task = Task::find(6)->user()->get()->toArray();
//        $project = Task::find(6)->project()->get();

        dump($project);
//        dump($task);
//        dump($project);
    }

    public function createForm(Request $request) {




//        DB::beginTransaction();
//        try {
//            foreach($update as $item) {
//                $deal = PmpDspDeals::find($item['id']);
//                $deal->update([
//                    'sspIds' => $item['sspIds']
//                ]);
//            }
//        } catch (Throwable $e) {
//            $this->error('Error occurs on data update');
//            DB::rollBack();
//            return 1;
//        }
//        DB::commit();


        $title = 'Create Task';
        return view('tasks.create', compact('title'));
    }



    public function create(Request $request) {
        dump($request->all());
        $type_0 = 0;
        $type_1 = 1;
        DB::transaction(function () use ($type_0, $type_1) {
            $task = new Task();
            $task->title = 'asasasas';
            $task->description = 'asasasas';
            $task->priority = 100;
            $task->status_id = null;
            $task->save();
            dump($task->id);

            if ($task->id) {
                TaskItemType::upsert([
                    ['task_id' => $task->id, 'task_type_id' => 1],
                    ['task_id' => $task->id, 'task_type_id' => 2]
                ],[]);
            }

            if ($task->priority > 100) {
                throw new \Exception('Priority is Max');
            }
        });



//        $validated = $request->validate([
//            'title' => 'required|unique:posts|max:255',
//            'body' => 'required',
//        ]);

//        if ($validated->fails()) {

//        }
        dump($request->all());
//
//        $task = new Task();
//        $task->title = 'wewewe';
//        $task->description = 'eeeeeeeee';
//        $task->priority = '100';
//        $task->status_id = 4;
//        $task->save();

//        $task = new Task();
//        $task->title = $request->title;
//        $task->description = $request->description;
//        $task->priority = $request->priority;
//        $task->status_id = $request->status_id;
//        $task->save();

//        TaskItemType::upsert([
//            ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
//            ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
//        ],[]);

    }

    public function deleteTask($id) {
        $task = Task::find($id);
        if (!$task) {
            return response('no data', 404);
        }

        DB::transaction(function () use ($task, $id) {
            if ($task->delete()) {
                return response('success');
            } else {
                return response('error', 404);
            }
            //Flight::where('active', 0)->delete();
        });
        return;
    }
}
