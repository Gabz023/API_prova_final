<?php

namespace App\Services;

use App\Model\Review;
use App\Repositories\RepositoryReview;

class ServiceReview
{

    private RepositoryReview $reviewRepository;

    public function __construct(RepositoryReview $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function get()
    {
        $reviews = $this->reviewRepository->get();

        return $reviews;
    }

    public function store(array $data)
    {
        $review = $this->reviewRepository->store($data);

        return $review;
    }

    public function details(int $id)
    {
        $review = $this->reviewRepository->details($id);

        return $review;
    }

    public function update(int $id, array $data)
    {
         $review = $this->reviewRepository->update($id, $data);

        return $review;
    }

    public function delete(int $id)
    {
        $review = $this->reviewRepository->delete($id);

        return $review;
    }
}

