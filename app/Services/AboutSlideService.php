<?php
namespace App\Services;

use App\Repositories\aboutSlideRepository;

class AboutSlideService
{
    protected $aboutSlideRepository;

    public function __construct(AboutSlideRepository $aboutSlideRepository)
    {
        $this->aboutSlideRepository = $aboutSlideRepository;
    }
    public function getAllAboutSlides()
    {
        return $this->aboutSlideRepository->all();
    }

    public function getAboutSlide(int $id) {
      return $this->aboutSlideRepository->get($id);
    }

    public function saveAboutSlide(array $data, $model)
    {
        return $this->aboutSlideRepository->save($data, $model);
    }

    public function deleteAboutSlide($model)
    {
        return $this->aboutSlideRepository->delete($model);
    }
}