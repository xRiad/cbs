<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardModel;
use App\Services\CardService;
use App\Http\Requests\CardRequest;

class CardController extends Controller
{
    protected $cardService;

    public function __construct(CardService $cardService) {
      $this->cardService = $cardService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = $this->cardService->getAllCards();

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
        $data = $request->all();

        if($this->cardService->saveCard($data, new CardModel)) {
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
      $card = $this->cardService->getCard($id);
      return view('admin.cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request, CardModel $card)
    {
      $data = $request->all();
      if ($this->cardService->saveCard($data, $card)) {
        return redirect()->back()->with('success', 'Card has been successfully updated.');
      } else {
        return redirect()->back()->with('failure', 'Failed to update card.');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardModel $card)
    {
      if($this->cardService->deleteCard($card)) {
        return redirect()->back()->with('success', 'Card has been successfully deleted.');
      } else {
        return redirect()->back()->with('success', 'Card deletion failed.');
      }
    }
}
