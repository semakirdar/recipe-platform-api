<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipes\CreateRequest;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function store(CreateRequest $request)
    {
        $recipe = Recipe::query()->create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);
        return response()->json([
            'success' => true,
            'error' => 'recipe successfully created'
        ]);
    }
}
