<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;

class ThoughtsController extends Controller
{
    public function list(Request $request)
    {
        return view('thoughts.index', [
            'thoughts' => $request->user()->thoughts()
                ->withCount('reactions')
                ->paginate(3)
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|min:2|max:200'
        ]);

        $request->user()->thoughts()->create($data);

        return redirect('/feed');
    }

    public function edit(Thought $thought)
    {
        return view('thoughts.edit');
    }
}
