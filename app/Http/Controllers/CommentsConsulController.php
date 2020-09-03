<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultation\Consultation;

class CommentsConsulController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:consultations,id',
            'body' => 'required|max:2000',
        ],
        [
            'body.required' => 'コメントしてね'
        ]);
        
        $post = Consultation::findOrFail($params['post_id']);
        $post->comment_to_consultations()->create($params);

        

        return redirect()->route('consultation.show', ['consultation' => $post]);
    }
}
