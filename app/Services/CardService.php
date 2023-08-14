<?php
namespace App\Services;

use App\Repositories\CardRepository;

class CardService
{
    protected $cardRepository;

    public function __construct(CardRepository $cardRepository)
    {
      $this->cardRepository = $cardRepository;
    }
    public function getAllCards()
    {
      return $this->cardRepository->all();
    }

    public function getCard(int $id) {
      return $this->cardRepository->get($id);
    }

    public function saveCard(array $data, $model)
    {
      return $this->cardRepository->save($data, $model);
    }

    public function deleteCard($model)
    {
      return $this->cardRepository->delete($model);
    }
}
