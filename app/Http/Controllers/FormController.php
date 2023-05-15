<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreApplicationRequest;
use App\Models\Voivodeship;
use App\Services\ApplicationService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;


class FormController extends Controller
{
    public function __construct(protected ApplicationService $applicationService)
    {
        //
    }

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        if (Cache::has('voivodeships')) {
            $voivodeships = Cache::get('voivodeships');
        } else {
            $voivodeships = Voivodeship::all();
            Cache::put('voivodeships', $voivodeships, now()->addDay(365));
        }

        return view('form/index', [
            'voivodeships' => $voivodeships
        ]);
    }

    public function save(StoreApplicationRequest $request): JsonResponse
    {
        try {
            $application = $this->applicationService->store($request->validated(), $request->file('img_receipt'), $request->all());

            $this->applicationService->sendApplicationMail($request->input('email'), $application->id);

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('form.thx', ['id' => $application->id])
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy dodać Twojego zgłoszenia, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
