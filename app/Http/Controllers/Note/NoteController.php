<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\ApiController;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends ApiController
{
    public function index()
    {
        $notes = Note::all();
        $data = NoteResource::collection($notes);
        return $data;
    }

    public function store(Request $request)
    {
        $note = Note::create([
            "customer_id" => $request->customer_id,
            "date" => date("Y-m-d H:i:s"),
            "total" => $request->total,
        ]);

        $note_id = $note->id;
        // $customer_id = $request->customer_id;
        // $total = $request->total;

        $items = $request->items;
        $syncItems = array();

        $note = Note::find($note_id);
        for ($i=0; $i < count($items); $i++) { 
            $syncItems[$items[$i]["id"]] = array('quantity' => $items[$i]["quantity"], 'total' => $items[$i]["total"]);
        }

        $note->items()->sync($syncItems);
        return $note;
    }

    public function show(Note $note)
    {
        $data = new NoteResource($note);
        return $data;
    }

    public function update(Request $request, Note $note)
    {
        $note->update([
            "customer_id" => $request->customer_id,
            "total" => $request->total,
        ]);

        $items = $request->items;
        $syncItems = array();

        for ($i=0; $i < count($items); $i++) { 
            $syncItems[$items[$i]["id"]] = array('quantity' => $items[$i]["quantity"], 'total' => $items[$i]["total"]);
        }

        $note->items()->sync($syncItems);

        return $note;
    }
}
