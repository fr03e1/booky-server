<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PublisherController extends Controller
{
    public function __construct(protected Publisher $publisher)
    {
        $this->middleware('auth:web');
    }

    public function index(): View
    {
        $publishers = $this->publisher::all();
        return view('publisher.index',compact('publishers'));
    }

    public function store(PublisherRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->publisher::firstOrCreate($data);
        return redirect()->route('publisher.index');
    }

    public function edit(Publisher $publisher): View
    {
        return view('publisher.edit',compact('publisher'));
    }

    public function update(PublisherRequest $request,Publisher $publisher): RedirectResponse
    {
        $data = $request->validated();
        $publisher->update($data);
        return redirect()->route('publisher.show',$publisher->id);
    }

    public function create(): View
    {
        return view('publisher.create');
    }

    public function delete(Publisher $publisher): RedirectResponse
    {
        $publisher->delete();
        return redirect()->route('publisher.index');
    }

    public function show(Publisher $publisher): View
    {
        return view('publisher.show',compact('publisher'));
    }
}
