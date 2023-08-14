<?php
namespace App\Services;

use App\Repositories\LetterRepository;

class LetterService
{
    protected $letterRepository;

    public function __construct(LetterRepository $letterRepository)
    {
      $this->letterRepository = $letterRepository;
    }
    public function getAllLetters()
    {
      return $this->letterRepository->all();
    }

    public function getLetter(int $id) {
      return $this->letterRepository->get($id);
    }

    public function deleteLetter($model)
    {
      return $this->letterRepository->delete($model);
    }
}