<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadFormRequest;
use App\Thread;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{

	/**
	 * @var Thread
	 */
	private $thread;

	public function __construct(Thread $thread)
	{
		/** @var \Illuminate\Database\Eloquent\Builder $thread */
		$this->thread = $thread;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = $this->thread->orderBy('updated_at', 'desc')->paginate();
        return response()->json($threads, 200);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ThreadFormRequest $request
	 * @return \Illuminate\Http\Response
	 */
    public function store(ThreadFormRequest $request)
    {
        $thread = new Thread();
        $thread->title = $request->input('title');
        $thread->body = $request->input('body');
        $thread->user_id = Auth::user()->id;
        $thread->save();

        return response()->json(['created' => 'success', 'data' => $thread], 200);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param ThreadFormRequest $request
	 * @param  \App\Thread $thread
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
    public function update(ThreadFormRequest $request, Thread $thread)
    {
    	$this->authorize('update', $thread);
		$thread->title = $request->input('title');
		$thread->body = $request->input('body');
		$thread->update();
		// return response()->json(['updated' => 'success', 'data' => $thread], 200);
		return redirect('/threads/'.$thread->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
