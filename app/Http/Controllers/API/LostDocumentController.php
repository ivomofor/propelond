<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\LostDocumentResource;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\LostDocument;
use App\Models\User;
use Response;

class LostDocumentController extends Controller
{
    public function index(){

        $lostDocs = LostDocument::orderBy('id', 'DESC')->paginate(6);

        return LostDocumentResource::collection($lostDocs);
    }

    //Lost Document view counter
    public function view($id)
    {
        LostDocument::find($id)->increment('view_count');
        return LostDocument::with(['user'])->find($id);
    }

    // Show lost document
    public function show(Request $request, $id)
    {
        $user = $request->user();
        $lostDocs = $user->report()->find($id);

        if (!$lostDocs) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, lostDocs with id ' . $id . ' cannot be found'
            ], 400);
        }

        return $lostDocs;
    }

    // Create lost document
    public function create(Request $request)
    {
            $this->validate($request, [
                'surname' => 'max:1024|required',
                'given_name' => 'max:1024|required',
                'dob' => 'max:1024',
                'profession' => 'max:1024',
                'unique_identification_number' => 'max:1024',
                'place_pick' => 'max:1024',
                'status' => 'max:1024',
                'doc_type' => 'max:1024',
                'description' => 'max:1024'            
            ]);

            $lostDocs = new LostDocument;
            $lostDocs->surname = $request->surname;
            $lostDocs->given_name = $request->given_name;
            $lostDocs->dob = $request->dob;
            $lostDocs->profession = $request->profession;
            $lostDocs->unique_identification_number = $request->unique_identification_number;
            $lostDocs->place_of_pick = $request->place_of_pick;
            $lostDocs->status = $request->status;
            $lostDocs->doc_type = $request->doc_type;
            $lostDocs->description = $request->description;

            //Upload image file to lost document object
            if($request->file('image_path')==NULL){
                $lostDocs->image_path='';
            }else{
                $response =  $request->file('image_path')->storeOnCloudinary('lost_documents');
                $responseImageUrl = $response->getSecurePath();
                $lostDocs->image_path=$responseImageUrl;
            }

            $user = $request->user();
            $user->city = $request->city;
            $user->country = $request->country;
            $user->phone_number = $request->phone_number;
            $user->save();  

            if ($user->report()->save($lostDocs)) {
                $responseLostDocs = LostDocument::with('user')->where('id', $lostDocs->id)->first();
                return response()->json([
                    'success' => true,
                    'message' => 'Lost document successfully created',
                    'LostDocument' => $responseLostDocs
                ]);
            }else
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, lost document could not be added'
                ], 500);
    }

    //Update lost document
    public function update(Request $request, $id)
    {
        $lostDocs = $request->user()->report()->find($id);

        if (!$lostDocs) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, lost document with id ' . $id . ' cannot be found'
            ], 400);
        }
        $updated = $lostDocs->fill($request->all())
            ->save();

        if ($updated) {
            $responseLostDocs = LostDocument::with('user')->where('id', $lostDocs->id)->first();
            return response()->json([
                'success' => true,
                'message' => 'Lost document successful updated',
                'lostDocument' => $responseLostDocs
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, lost document could not be updated'
            ], 500);
        }
    }

    //Delete lost document
    public function destroy(Request $request, $id)
    {
        $lostDocs = $request->user()->report()->find($id);

        if (!$lostDocs) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, lost document with id ' . $id . ' cannot be found'
            ], 400);
        }

        if ($lostDocs->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'lost document with id ' . $id . ' successful deleted'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'lost document with id ' . $id . ' could not be deleted'
            ], 500);
        }
    }

}
