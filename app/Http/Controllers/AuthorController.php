<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('book')->get(); // استرجاع المؤلفين مع كتبهم
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

   
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:authors,email',
        'jobdescription' => 'required|string|max:255',
        'bio' => 'required|string',
        'imageprofile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imagePath = $request->file('imageprofile')->store('authors', 'public');

    Author::create([
        'name' => $request->name,
        'email' => $request->email,
        'jobdescription' => $request->jobdescription,
        'bio' => $request->bio,
        'imageprofile' => $imagePath
    ]);

    return redirect()->route('authors.index')->with('success', 'تم الإضافة بنجاح');
}

public function update(Request $request, $id)
{
    $author = Author::findOrFail($id);
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:authors,email,'.$id,
        'jobdescription' => 'required|string|max:255',
        'bio' => 'required|string',
        'imageprofile' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('imageprofile')) {
        // حذف الصورة القديمة
        Storage::disk('public')->delete($author->imageprofile);
        
        $imagePath = $request->file('imageprofile')->store('authors', 'public');
        $author->imageprofile = $imagePath;
    }

    $author->update($request->except('imageprofile'));

    return redirect()->route('authors.index')->with('success', 'تم التحديث بنجاح');
}
public function show($id)
{
    $author = Author::with('book')->findOrFail($id); // تأكد من عدم وجود أخطاء كتابية هنا
    return view('authors.show', compact('author'));
}

public function destroy($id)
{
    $author = Author::findOrFail($id);
    
    if ($author->imageprofile) {
        Storage::disk('public')->delete($author->imageprofile);
    }
    
    $author->delete();
    
    return redirect()->route('authors.index')->with('success', 'تم الحذف بنجاح');
}

}