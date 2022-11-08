<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\DirectFromForm;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function index(Request $request) {
        $validator  = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'description' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json(['messages' => $validator->errors()->all()], 400);
        }

        $info = $request->all();

        $info['images'] = [];
        if (isset($_FILES['images'])) {
            $count = count($_FILES['images']['name']);
            for ($i = 0; $i < $count; $i++) {
                $image = $_FILES['images']['tmp_name'][$i];
                $imageData = base64_encode(file_get_contents($image));
                $info['images'][$i] = 'data: ' . mime_content_type($image) . ';base64,' . $imageData;
            }
        }

        try {
            Mail::to($info['email'])->send(new DirectFromForm($info));
        } catch (\Throwable $th) {
            return response()->json(['messages' => ['An error occured while sending email. Please ensure mailer host has been setup correctly.']], 400);
        }
        return response()->json(['message'=>'success']);
    }
}
