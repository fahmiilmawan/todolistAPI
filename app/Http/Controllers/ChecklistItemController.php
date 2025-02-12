<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data = ChecklistItem::where('checklistID', $id)->get();
        return response()->json([
            'data' => $data
        ]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id,Request $request)
    {
        try {
            $request->validate([
                'itemName' => 'required',
            ]);

            $data = ChecklistItem::create([
                'itemName' => $request->itemName,
                'checklistID' => $id,
            ]);

            return response()->json([
                'message' => 'Data created successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $checklistID, string $checklistItemID)
    {
        $data = ChecklistItem::where('checklistID', $checklistID)->where('id', $checklistItemID)->first();
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $checklistID, string $checklistItemID)
    {
        try {
            $request->validate([
                'itemName' => 'required',
            ]);

            $data = ChecklistItem::where('checklistID', $checklistID)->where('id', $checklistItemID)->first();
            if (!$data) {
                return response()->json(['message' => 'Data not found'], 404);
            }

            $data->update($request->all());
            return response()->json([
                'message' => 'Data updated successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $checklistID, string $checklistItemID)
    {
        $data = ChecklistItem::where('checklistID', $checklistID)->where('id', $checklistItemID)->first();
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Data deleted successfully'], 200);
    }

    public function updateRename(Request $request, string $checklistID, string $checklistItemID)
    {
        try {
            $request->validate([
                'itemName' => 'required',
            ]);

            $data = ChecklistItem::where('checklistID', $checklistID)->where('id', $checklistItemID)->first();
            if (!$data) {
                return response()->json(['message' => 'Data not found'], 404);
            }

            $data->update($request->all());
            return response()->json([
                'message' => 'Data updated successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
