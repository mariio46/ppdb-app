<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\FaqRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FaqController extends Controller
{
    public function __construct(
        protected FaqRepository $faqRepository
    ) {
    }

    public function index(): Response
    {
        return response()->view('student.faq.index');
    }

    public function getFaqData(Request $request): JsonResponse
    {
        $search = $request->get('search') ?? null;

        $get = $this->faqRepository->getFaqData($search);

        return response()->json($get);
    }
}
