<?php
namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
      $this->contactRepository = $contactRepository;
    }

    public function getFirstContact () {
      return $this->contactRepository->first();
    }

    public function saveContact(array $data, $model)
    {
      return $this->contactRepository->save($data, $model);
    }

}
