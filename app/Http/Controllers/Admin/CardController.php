<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardModel;
use App\Repositories\CardRepository;
use App\Http\Requests\CardRequest;

class CardController extends Controller
{
    public function __construct(protected CardRepository $cardRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = $this->cardRepository->all();

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
        try {
          $this->cardRepository->save($request->validated(), new CardModel);
          return redirect()->back()->with('success', 'Card has been succsessfully saved');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
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
      $card = $this->cardRepository->get($id);
      return view('admin.cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CardRequest $request, CardModel $card)
    {
        try {
          $this->cardRepository->save($request->validated(), $card);
          return redirect()->back()->with('success', 'Card has been succsessfully updated');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardModel $card)
    {
        try {
          $this->cardRepository->delete($card);
          return redirect()->back()->with('success', 'Card has been succsessfully deleted');
        } catch (\Exception $e) {
          return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
