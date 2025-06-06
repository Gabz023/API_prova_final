<?php

namespace App\Repositories;
use App\Models\Review;

class RepositoryReview
{
    public function get()
    {
        return Review::all();
    }

    public function store(array $data)
    {
        return Review::create($data);
    }

    public function details(int $id)
    {
        return Review::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $review = Review::find($id);
        $review->update($data);

        return $review;
    }

    public function delete(int $id)
    {
        $review = $this->details($id);
        $review->delete();

        return $review;
    }
}