<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;

class ReactionsController extends Controller
{
    public function list(Thought $thought)
    {
        return view('reactions.index', [
            'thought' => $thought,
            'reactions' => $thought->reactions()
                ->latest()
                ->with('user')
                ->paginate(10)
        ]);
    }

    public function store(Request $request, Thought $thought)
    {
        $data = $request->validate([
            'reaction' => 'required|min:2|max:200'
        ]);

        $data['user_id'] = $request->user()->id;

        $thought->reactions()->create($data);
        $thought->touch('updated_at');

        return redirect('/reactions/' . $thought->id);
    }
}
