<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function getBinhLuan(){
    	$comment = Comment::all();
    	return view("admin/BinhLuan.binhluan",compact('comment'));
    }
    public function deletecomment($idCm){
    	$cm = Comment::find($idCm);
    	$cm->delete();
    	return redirect('admin/binhluan');
    }
}
