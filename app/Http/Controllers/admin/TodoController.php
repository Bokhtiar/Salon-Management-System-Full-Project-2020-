<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $todo=Todo::all();
        return view('admin.todo.all_todo',compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.todo.add_todo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'title'=>'required',
        'start_time'=>'required',
        'end_time'=>'required',
      ]);
      
        $todo= new Todo;
          $todo['title']=$request->title;
          $todo['start_date']=$request->start_time;
          $todo['end_date']=$request->end_time;
          

        if ($todo->save()) {
            Session::flash('insert','Customer Added Sucessfully...');
        }else {
            echo "not send the data";
        }
        return redirect()->route('admin.todo.all-todo');
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }




        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
         public function inactive($id)
         {
             $inactive=todo::find($id);
               $inactive['status']=0;
             $inactive->save();
             Session::flash('inactive','inactive Sucessfully...');
             return redirect()->back();
         }

         /**
          * Show the form for editing the specified resource.
          *
          * @param  int  $id
          * @return \Illuminate\Http\Response
          */

         public function active($id)
         {
             $active=todo::find($id);
               $active['status']=1;
             $active->save();
              Session::flash('Active','active Sucessfully...');
             return redirect()->back();
         }
         /**
          * Show the form for editing the specified resource.
          *
          * @param  int  $id
          * @return \Illuminate\Http\Response
          */
          /**
           * Show the form for editing the specified resource.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function edit($id)
          {
              $todo_edit=todo::find($id);
                return view('admin.todo.edit_todo',compact('todo_edit'));
          }

          /**
           * Update the specified resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function update(Request $request, $id)
          {
            $this->validate($request,[
              'title'=>'required',
              'start_time'=>'required',
              'end_time'=>'required',
            ]);

            $todo_update=Todo::find($id);
              $todo_update['title']=$request->title;
              $todo_update['start_date']=$request->start_time;
              $todo_update['end_date']=$request->end_time;

            if ($todo_update->save()) {
                Session::flash('update','Customer Updated Sucessfully...');
            }else {
                echo "not send the data";
            }
            return redirect()->route('admin.todo.all-todo');
          }

          /**
           * Remove the specified resource from storage.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function destroy($id)
          {
              $todo_delete=Todo::find($id);
                $todo_delete->delete();
                Session::flash('delete','delete Sucessfully...');
              return redirect()->back();
          }

}
