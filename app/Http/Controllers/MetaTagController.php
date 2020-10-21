<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MetaTag;

class MetaTagController extends Controller
{
    public function store(Request $request){
        $meta_tag = $request->meta;
        $create = MetaTag::create([
            'meta_tag' => $meta_tag,
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



    public function fetchOne(Request $request){
        
        $meta = MetaTag::find($request->id);

        return response()->json([
            'error' => 0,
            'message' => 'ok',
            'meta' => $meta,
        ]);

    }/* /fetchOne() */
    

    public function fetch(Request $request){

        $meta_tags = MetaTag::all();
        $meta_tags_array=[];
        foreach($meta_tags as $tag){
            $tag_row;
            $tag_row['id'] = $tag->id;
            $tag_row['meta_tag'] = "<textarea disabled class='form-control' style='direction:ltr;width:100%;height: 36px;min-height: 36px;'> ".$tag->meta_tag." </textarea>";
            $meta_tags_array[] = $tag_row;
        }
        return response()->json(['data' => $meta_tags_array,]);
    }


    
    public function update(Request $request){
        
        $id = $request->id;
        $meta = $request->meta;

        $update = MetaTag::where('id', $id)->update([
            'meta_tag' => $meta,
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
        $deleteMeta = MetaTag::where('id',$request->id)->delete();
        if(!$deleteMeta){
            return response()->json([ 'error' => 1, 'message' => 'Something went wrong!' ]);
        }
        return response()->json([ 'error' => 0, 'message' => trans('dashboard.deleted_successfully') ]);
    }/* /delete() */
}
