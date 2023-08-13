<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardModel;
use App\Http\Requests\CardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = CardModel::all();

        return view('admin.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardRequest $request)
    {
        $card = new CardModel;

        $card->title = $request->input('title');
        $card->content = $request->input('content');
        $card->icon = $request->input('icon');
        $card->card_type = $request->input('card_type');
        
        if($card->save()) {
          return redirect()->back()->with('success', 'Card has been succsessfully saved');
        } else {
          return redirect()->back()->with('failure', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
      $card = CardModel::findOrFail($id);
      return view('admin.cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request, int $id)
    {
       $card = CardModel::findOrFail($id);
       if ($card) {
          $card->title = $request->input('title');
          $card->content = $request->input('content');
          $card->icon = $request->input('icon');
          $card->card_type = $request->input('card_type');

          

          if ($card->update()) {
            return redirect()->back()->with('success', 'Card has been successfully updated.');
          } else {
            return redirect()->back()->with('failure', 'Failed to update card.');
          }
       } else {
          return redirect()->back()->with('failure', 'Card not found.');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
      $card = CardModel::findOrFail($id);

      if($card) {
        if($card->delete()) {
          return redirect()->back()->with('success', 'Card has been successfully deleted.');
        } else {

          return redirect()->back()->with('success', 'Card deletion failed.');
        }

      } else {
        return redirect()->back()->with('failure', 'Card does not exist.');
      }
    }
}
