<?php

namespace App\Http\Controllers\V1\News;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\OrderByHelper;
use Illuminate\Http\JsonResponse;
use App\Services\News\NewsService;
use App\Http\Controllers\AbstractController;

/**
 * Class NewsController
 * @package App\Http\Controllers\V1\News
 */
class NewsController extends AbstractController
{
    /**
     * @var array
     */
    protected array $searchFields = ['title', 'slug', 'subtitle'];

    /**
     * NewsController constructor.
     * @param NewsService $service
     */
    public function __construct(NewsService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param Request $request
     * @param integer $authorId
     * @return JsonResponse
     */
    public function findByAuthor(Request $request, int $authorId): JsonResponse
    {
        try {
            $limit = (int) $request->get('limit', 10);
            $orderBy = OrderByHelper::treatOrderBy($request->get('order_by', ''));

            /** @var Object $this */
            $result = $this->service->findByAuthor($authorId, $limit, $orderBy);
            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param string $param
     * @return JsonResponse
     */
    public function findBy(Request $request, string $param): JsonResponse
    {
        try {
            /** @var Object $this */
            $result = $this->service->findBy($param);
            $response = $this->successResponse($result);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param string $param
     * @return JsonResponse
     */
    public function deleteBy(Request $request, string $param): JsonResponse
    {
        try {
            /** @var Object $this */
            $result['deleted'] = $this->service->deleteBy($param);
            $response = $this->successResponse($result, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param integer $authorId
     * @return JsonResponse
     */
    public function deleteByAuthor(Request $request, int $authorId): JsonResponse
    {
        try {
            /** @var Object $this */
            $result['deleted'] = $this->service->deleteByAuthor($authorId);
            $response = $this->successResponse($result, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }
}
