<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexApplicationApiRequest;
use App\Models\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApplicationController extends Controller
{
    /**
     * @param IndexApplicationApiRequest $request
     * @return JsonResponse
     */
    public function index(IndexApplicationApiRequest $request): JsonResponse
    {
        $search = $request->input('search');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        $searchable = $request->input('searchable', []);
        $filter = $request->input('filter', []);

        $query = Application::with(['voivodeship'])->search($search, $searchable)->filter($filter);

        $applicationsCount = $query->count('id');
        $applications = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $applicationsCount,
            'rows' => $applications
        ], Response::HTTP_OK);
    }
}
