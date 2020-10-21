<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderIssue;

class OrderIssueController extends Controller
{
    
    public function fetchAll(Request $request){
        
        $issues = orderIssue::all();

   
        $issues_array=[];
        
        foreach($issues as $issue){

            if( $issue->state == 0 ){
                $state = 'جارية';
            } else {
                $state = 'مغلقة';
            }

            $user = \App\User::find($issue->user_id);

            $issue_row;
            $issue_row['id'] = $issue->id;
            $issue_row['user'] = $user->name;
            $issue_row['complaint'] = $issue->issue;
            $issue_row['state'] = $state;
            $issue_row['time'] = $issue->created_at->calendar();
            
            $issues_array[] = $issue_row;
        }
        return response()->json(['data' => $issues_array,]);

    }


    public function deleteIssue(Request $request){
        $delete = orderIssue::where('id',$request->id)->delete();
        if(!$delete){
            return response()->json([ 'error' => 1, 'message' => 'Something went wrong!' ]);
        }
        return response()->json([ 'error' => 0, 'message' => trans('dashboard.deleted_successfully') ]);
    }

}
