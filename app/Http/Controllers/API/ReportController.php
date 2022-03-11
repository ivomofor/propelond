<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ReportResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\Report;
use App\Models\Post;
use App\Models\User;


class ReportController extends Controller
{

    public function index(){

        $reports = Report::orderBy('id', 'DESC')->get();

        return ReportResource::collection($reports);
    }
        
    public function show_report(Request $request, $id){

        $report = Report::find($id);

        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }
        $report->load('user');
        return $report;
    }

    public function report_post($post_id, Request $request ){

        $post=Post::where('id', $post_id)->first();

        if($post){
            
            $validator = Validator::make($request->all(), [
            'description' => 'required|max:250',
            ]);

            if($validator->fails()) {

                return response()->json([
                    'message' => 'Validation errors',
                    'errors' => $validator->messages()
                ],422);
            }

            $report = Report::create([
                'description' =>$request->description,
                'post_id' =>$post->id,
                'user_id' =>$request->user()->id
           ]);
           $report->load('user');

           return response()->json([
               'message' => 'Report successfuly created',
               'data' =>$report
           ], 200);

        }else{
           return response()->json([
          'massage' => 'No report found',
           ], 400);
       }
    }

    public function update_report( Request $request, $id){

        $report = Report::find($id);

        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, report with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $report->fill($request->all())->save();

        if ($updated) {
            $responseReport = Report::with('user')->where('id', $report->id)->first();
            return response()->json([
                'success' => true,
                'message' => 'Report successful updated',
                'report' => $responseReport
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, report could not be updated'
            ], 500);
        }
    }

    public function delete_report(Request $request, $id){
        $report = Report::find($id);
        //check if user is editing his own report
        if(!$report){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorize access'
            ]);
        }
        $report->delete();

        return response()->json([
            'success' => true,
            'message' => 'Report deleted'
        ]);
    }

}
