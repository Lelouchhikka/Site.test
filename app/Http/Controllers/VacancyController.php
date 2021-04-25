<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies=Vacancy::query()->latest()->paginate(10);

        return view('vacancy.index',[
            'vacancies'=>$vacancies
        ]);
    }
    public function show(Vacancy $vacancy)
    {
        return view('vacancy.show', [
            'vacancy'=>$vacancy
        ]);
    }
    public function create()
    {
        return view('vacancy.create');
    }

    public function store(VacancyRequest $request)
    {
        Vacancy::create($request->validated());
        return redirect()->route('vacancy.index');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancy.index');
    }
}
