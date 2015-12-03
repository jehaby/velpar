<?php

namespace App\Http\Controllers;

use App\Exceptions\UserAlreadyHaveSuchPatternException;
use App\Pattern;
use App\Services\PatternService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PatternController extends Controller
{


    public function __construct(PatternService $patternService)
    {
        $this->middleware('auth');
        $this->patternService = $patternService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patterns = \Auth::user()->patterns()->with(['sections', 'prefixes', 'regex'])->get();
        return view('patterns.index')->with(['patterns' => $patterns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patterns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->patternService->createOrReturnExisting([]);
        } catch (UserAlreadyHaveSuchPatternException $e) {
            // TODO: return with error UserAlreadyHaveSuchPatternException
        } catch (\Exception $e) {
            // TODO: return with general error
        }

        // TODO: redirect back or somewhere else with success
        redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pattern $pattern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pattern $pattern)
    {
        $pattern->load(['regex', 'prefixes', 'sections']);
        return view('patterns.edit')->with(['pattern' => $pattern]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Pattern $pattern, Request $request)
    {




        $this->patternService->edit();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pattern $pattern)
    {
        try {
            $this->patternService->delete();
        } catch (\Exception $e) {
            // TODO: show general error
        }
    }
}
