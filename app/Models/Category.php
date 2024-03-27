<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];
    protected static $category;
    protected static $categoryImage, $imageName, $imageDirectory, $imageUrl;

    public static function createCategory($request)
    {
        // Check if a file was uploaded
        if ($request->hasFile('image')) {
            self::$categoryImage = $request->file('image');
            self::$imageName = rand(10, 1000) . self::$categoryImage->getClientOriginalName();
            self::$imageDirectory = 'backend/img/';
            self::$categoryImage->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory . self::$imageName;

            self::$category = new Category();
            self::$category->name = $request->name;
            self::$category->image = self::$imageUrl;
            self::$category->status = $request->status;

            self::$category->save();
        } else {
            // Handle the case when no file is uploaded
            // You might want to throw an exception, log an error, or handle it in some way
            // For now, this example just returns without saving anything
            return;
        }
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        self::$category->status = $request->status;

        self::$category->save();
    }
}
