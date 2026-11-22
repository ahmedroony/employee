<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShiftResource;
use App\Models\Shift;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
class Shifts extends Controller
{
    public function index()
    {
        $shift = Shift::with('users')->get();
        return ShiftResource::collection($shift);
    }

    public function store(StoreShiftRequest $request) {
        $shift = Shift::create($request->validated());
        return new ShiftResource($shift);
    }

    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        // 1 & 2. Auto-fetch the shift model and validate incoming data

        // 3. Update database using validated data only
        $shift->update($request->validated());
        // 4. Transform and return the updated shift as a JSON response
        return new ShiftResource($shift);
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();

        return response()->json([
            'message' => 'Shift deleted successfully'
        ], 200);
    }
}
