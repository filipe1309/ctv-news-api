<?php

namespace App\Http\Controllers\V1\ImageNews;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\ImageNews\ImageNewsService;
use App\Http\Controllers\AbstractController;
use Illuminate\Http\Response;

/**
 * Class ImageNewsController
 * @package App\Http\Controllers\V1\ImageNews
 */
class ImageNewsController extends AbstractController
{
    /**
     * @var array
     */
    protected array $searchFields = [];

    /**
     * ImageNewsController constructor.
     * @param ImageNewsService $service
     */
    public function __construct(ImageNewsService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param Request $request
     * @param integer $newsId
     * @return JsonResponse
     */
    public function findByNews(Request $request, int $newsId): JsonResponse
    {
        try {
            $result = $this->service->findByNews($newsId);
            $response = $this->successResponse($result);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param integer $newsId
     * @return JsonResponse
     */
    public function deleteByNews(Request $request, int $newsId): JsonResponse
    {
        try {
            $result['deleted'] = $this->service->deleteByNews($newsId);
            $response = $this->successResponse($result, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }
}
