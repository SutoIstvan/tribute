<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Memorial;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($slug)
    {
        $memorial = Memorial::where('id', $slug)->firstOrFail();
        return view('memorial.addcomments', [
            'memorial' => $memorial
        ]);
    }

    public function store(Request $request, $slug)
    {
        $memorial = Memorial::where('id', $slug)->firstOrFail();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'memorial_id' => $memorial->id,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'A megjegyzést sikeresen hozzáadtuk, és moderálásra vár.');
    }

    public function approve(Comment $comment)
    {
        // $this->authorize('moderate', Comment::class);
        
        $comment->update(['status' => 'approved']);
        
        return response()->json(['message' => 'Комментарий одобрен']);
    }

    public function reject(Comment $comment)
    {
        // $this->authorize('moderate', Comment::class);
        
        $comment->update(['status' => 'rejected']);
        
        return response()->json(['message' => 'Комментарий отклонен']);
    }

    public function destroy(Comment $comment)
    {
        // $this->authorize('delete', $comment);
        
        $comment->delete();
        
        return response()->json(['message' => 'Комментарий удален']);
    }

    public function comments($id)
    {
        $memorial = Memorial::where('id', $id)->firstOrFail();
        $comments = $memorial->comments()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('memorial.comments', [
            'memorial' => $memorial,
            'comments' => $comments
        ]);
    }
}