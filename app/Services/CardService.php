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
}
