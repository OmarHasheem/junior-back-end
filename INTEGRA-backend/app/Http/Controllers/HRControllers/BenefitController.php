<?php

namespace App\Http\Controllers\HRControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HR\BenefitCollection;
use App\Http\Resources\HR\BenefitResource;
use App\Models\HR\Benefit;

class BenefitController extends Controller
{

    public function index() : BenefitCollection
    {
        return new BenefitCollection(Benefit::all());
    }

    public function show($id) : BenefitResource
    {
        $benefit = Benefit::findOrFail($id);
        return new BenefitResource($benefit);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'cost' => ['required'],
        ]);

        Benefit::create([
            'name' => request('name'),
            'cost' => request('cost'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function update($id)
    {
        $benefit = Benefit::findOrFail($id);

        request()->validate([
            'name' => ['required'],
            'cost' => ['required'],
        ]);

        $benefit->update([
            'name' => request('name'),
            'cost' => request('cost'),
        ]);

        return response()->json(["message" => "The process has been succeded"]);
    }

    public function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();

        return response()->json(["message" => "The process has been succeded"]);
    }
}