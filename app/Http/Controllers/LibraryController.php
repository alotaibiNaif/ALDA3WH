<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Illuminate\Support\Facades\Auth;
use App\Language;
use App\Books;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    
	
	/**
	 * 
	 *Todo
	 *
	 * ---Books---
	 * Show Books
	 * Store Books
	 * Remove Books 
	 * Update Books
	 *
	 * 
	 *---Author---
	 * Show Authors
	 * Add Author
	 * Remove Author
	 * Update Autoher
	 * 
	 * 
	 * 
	 * ---Language---
	 * Show Languages
	 * Add Lnaguage 
	 * 
	 */
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	
	public function AddAuthor(Request $request)
	{
 	if(Auth::user()->department_id == 2){
		
		$this->validate($request, [
			'name' 	=> 'required',
		]);
		
		$author = new Author();
		$author->id = Author::count();
		$author->name = $request->input('name');
		$author->save();
		
		return redirect('/requests');
		
 		}else 
 			return redirect('/home');
	}
	
	
	public function AddLanguage(Request $request)
	{
		
		
		if(Auth::user()->department_id == 1){
			
			$this->validate($request, [
					'language' 	=> 'required',
			]);
			
			$lang = new Language();
			$lang->id = Language::count();
			$lang->language = $request->input('language');
			$lang->save();
			
			return redirect('/requests');
			
		}else
			return redirect('/home');
		
	}
	
	public function AddBook(Request $request)
	{
		if(Auth::user()->department_id == 1){
			
			$this->validate($request, [
					'name' 			=> 'required',
					'author_id' 	=> 'required',
					'barcode' 		=> 'required',
					'language_id' 	=> 'required',
					'img_path' 		=> 'required',
					'in_stock' 		=> 'required',
			]);
			
			$book 				= new Books();
			$book->id 			= Books::count();
			$book->barcode 		= $request->input('barcode');
			$book->name 		= $request->input('name');
			$book->author_id	= $request->input('author_id');
			$book->language_id	= $request->input('language_id');
			$book->in_stock		= $request->input('in_stock');
			$book->img_path		= $request->input('img_path');
			$book->save();

			return redirect('/library');
			
		}else
			return redirect('/home');
	}
	
	public function UpdateBook(Request $request)
	{
		if(Auth::user()->department_id == 1){
			
			$this->validate($request, [
					'name' 			=> 'required',
					'author_id' 	=> 'required',
					'barcode' 		=> 'required',
					'language_id' 	=> 'required',
					'img_path' 		=> 'required',
					'in_stock' 		=> 'required',
			]);
			
			Books::where('barcode', $request->input('barcode'))
			->update([
					'name'			=> 	$request->input('name'),
					'author_id'		=>	$request->input('author_id'),
					'language_id'	=>	$request->input('language_id'),
					'img_path'		=>	$request->input('img_path'),
					'in_stock'		=>	$request->input('in_stock')
			]);
			
			
			return redirect('/library');
			
		}else
			return redirect('/home');
	}
	
	public function DecreaseBookByOne(Request $request)
	{
		if(Auth::user()->department_id == 1){
			
			$this->validate($request, [
					'barcode' 		=> 'required',
			]);
			
			DB::table('books')->where('barcode', $request->input('barcode'))->decrement('in_stock', 1);
			
			return redirect('/library');
			
		}else
			return redirect('/home');
	}
	
	public function IncrementBookByOne(Request $request)
	{
		if(Auth::user()->department_id == 1){
			
			$this->validate($request, [
					'barcode' 		=> 'required',
			]);
			
			DB::table('books')->where('barcode', $request->input('barcode'))->increment('in_stock', 1);
			
			return redirect('/library');
			
		}else
			return redirect('/home');
	}
	
	
	
	
	
}