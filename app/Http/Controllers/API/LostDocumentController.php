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

    public function create(Request $request)
    {
            $this->validate($request, [
                'fname' => 'max:1024|required',
                'lname' => 'max:1024',
                'dob' => 'max:1024',
                'profession' => 'max:1024',
                'doc_number' => 'max:1024',
                'email' => 'max:1024',
                'phone_number' => 'max:1024',
                'country' => 'max:1024',
                'city' => 'max:1024',
                'description' => 'max:1024'            
            ]);

            $lostDocs = new LostDocument;
            $lostDocs->fname = $request->fname;
            $lostDocs->lname = $request->lname;
            $lostDocs->dob = $request->dob;
            $lostDocs->profession = $request->profession;
            $lostDocs->doc_number = $request->doc_number;
            $lostDocs->email = $request->email;
            $lostDocs->phone_number = $request->phone_number;
            $lostDocs->country = $request->country;
            $lostDocs->city = $request->city;
            $lostDocs->description = $request->description;

            //Upload image file to lost document object
            if($request->file('image_path')==NULL){
                $lostDocs->image_path='';
            }else{
                $response =  $request->file('image_path')->storeOnCloudinary('lost_documents');
                $responseImageUrl = $response->getSecurePath();
                $lostDocs->image_path=$responseImageUrl;
            }

            if ($request->user()->report()->save($lostDocs)) {
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