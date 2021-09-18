<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipes\CreateRequest;
use App\Http\Requests\Recipes\UpdateRequest;
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

    public function update(UpdateRequest $request, $id)
    {
        $recipe = Recipe::query()
            ->where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        $recipe->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return response()->json([
            'success' => true,
            'error' => 'recipe successfully updated'
        ]);

    }

    public function delete($id)
    {
        $recipe = Recipe::query()
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        $recipe->delete();
        return response()->json([
            'success' => true,
            'error' => 'recipe successfully deleted'
        ]);
    }

    public function show($id)
    {
        $recipe = Recipe::query()->where('id', $id)->first();

        return response()->json([
            'success' => true,
            'data' => $recipe
        ]);
    }
}
