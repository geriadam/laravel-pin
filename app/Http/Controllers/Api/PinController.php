<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PinRequest;
use App\Http\Resources\PinResource;
use App\Http\Resources\PinCollection;
use App\Models\Pin;
use App\Traits\ResponseApi;
use Symfony\Component\HttpFoundation\Response;

class PinController extends Controller
{
    use ResponseApi;

    public function index()
    {
        $pins = Pin::publish()
            ->latest()
            ->get();
        return $this->sendResponse(new PinCollection($pins), "Get Index Successfully", Response::HTTP_OK);
    }

    public function moderation()
    {
        $pins = Pin::draft()
            ->latest()
            ->get();
        return $this->sendResponse(new PinCollection($pins), "Get Index Successfully", Response::HTTP_OK);
    }

    public function favorites()
    {
        $user = auth('sanctum')->user();
        $pins = Pin::with(['likers', 'user'])
            ->has('likers')
            ->whereHas('likers', function ($query) use ($user) {
                return $query->whereUserId($user->id);
            })
            ->get();
        return $this->sendResponse(new PinCollection($pins), "Get Index Successfully", Response::HTTP_OK);
    }

    public function store(PinRequest $request)
    {
        $request->merge(['user_id' => auth('sanctum')->user() ? auth('sanctum')->user()->id : null]);
        $request->merge(['is_publish' => auth('sanctum')->user() ? true : false]);
        $pin = Pin::create($request->all());
        return $this->sendResponse(new PinResource($pin), "Upload pin Successfully", Response::HTTP_CREATED);
    }

    public function like(Pin $pin)
    {
        $user = auth('sanctum')->user();
        $user->toggleLike($pin);
        return $this->sendResponse(new PinResource($pin), "Add to favorite Successfully", Response::HTTP_OK);
    }

    public function publish(Pin $pin)
    {
        $pin->toPublish();
        return $this->sendResponse(new PinResource($pin), "Publish pin Successfully", Response::HTTP_OK);
    }
}
