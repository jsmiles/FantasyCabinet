<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SubmissionController extends Controller
{
    public function userSubmission(Request $request) 
    {
        try {
            $validatedData = $request->validate([
                'prime_minister' => 'required|string',
                'chancellor' => 'required|string',
                'foreign_secretary' => 'required|string',
                'motivation' => 'required|string',
            ]);

            Submission::create($validatedData);

            return response()->json(['message' => 'Submission successful'], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
     
}
