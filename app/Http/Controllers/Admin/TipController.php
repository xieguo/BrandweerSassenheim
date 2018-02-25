<?php

namespace App\Http\Controllers\Admin;

use App\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tips = Tip::orderBy('created_at', 'desc')
            ->paginate(100);

        return view('admin.tips.index', compact('tips'));
    }

    /**
     * @param Tip $tip
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Tip $tip)
    {
        return view('admin.tips.show', compact('tip'));
    }

    /**
     * Create a new tip
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tip = new Tip();

        return view('admin.tips.create', compact('tip'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $tip = $this->validateAndPersist($request);

        return redirect(route('admin.tips.show', $tip->id));
    }

    /**
     * @param Tip $tip
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tip $tip)
    {
        return view('admin.tips.edit', compact('tip'));
    }

    /**
     * @param Tip $tip
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Tip $tip, Request $request)
    {
        $tip = $this->validateAndPersist($request, $tip);

        return redirect(route('admin.tips.show', $tip->id));
    }

    /**
     * @param Request $request
     * @param Tip|null $tip
     * @return Tip
     */
    private function validateAndPersist(Request $request, Tip $tip = null)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $tip = $tip ?: new Tip();
        $tip->fill(['description' => $request->input('description')]);

        $tip->save();

        return $tip;
    }
}
