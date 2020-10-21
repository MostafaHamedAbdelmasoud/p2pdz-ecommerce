<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{   


    public function __construct(){
        $settings = \App\Setting::find(1);
        \View::share('settings', $settings);
    }

    public function store(Request $request){
        
        $question = $request->question;
        $answer = $request->answer;


        $create = Question::create([
            'question' => $question,
            'answer' => $answer,
        ]);

        if(!$create){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.added_successfully'),
        ]);

    }/* /store() */


    
    public function fetch(Request $request){

        $questions = Question::all();
        $questions_array=[];
        foreach($questions as $question){
            $question_row;
            $question_row['id'] = $question->id;
            $question_row['question'] = "<textarea disabled class='form-control' style='direction:rtl;width:100%;height: 36px;min-height: 36px;text-align:center;'> ".$question->question." </textarea>";
            $question_row['answer'] = "<textarea disabled class='form-control' style='direction:rtl;width:100%;height: 36px;min-height: 36px;text-align:center;'> ".$question->answer." </textarea>";
            $questions_array[] = $question_row;
        }
        return response()->json(['data' => $questions_array,]);
    }/* /fetch() */



    public function fetchOne(Request $request){
        
        /* return response()->json([
            'error' => 1,
            'message' => 'hello world',
        ]); */

        $question = Question::find($request->id);

        return response()->json([
            'error' => 0,
            'message' => 'ok',
            'question' => $question,
        ]);

    }/* /fetchOne() */








    public function update(Request $request){
        
        $id = $request->id;
        $question = $request->question;
        $answer = $request->answer;

        $update = Question::where('id', $id)->update([
            'question' => $question,
            'answer' => $answer,
        ]);

        if(!$update){
            return response()->json([
                'error' => 1,
                'message' => trans('dashboard.something_wrong'),
            ]);
        }

        return response()->json([
            'error' => 0,
            'message' => trans('dashboard.updated_successfully'),
        ]);
    }/* /update() */










    public function delete(Request $request){
        $deleteQuestion = Question::where('id',$request->id)->delete();
        if(!$deleteQuestion){
            return response()->json([ 'error' => 1, 'message' => 'Something went wrong!' ]);
        }
        return response()->json([ 'error' => 0, 'message' => trans('dashboard.deleted_successfully') ]);
    }/* /delete() */




}/* /class */
