<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
  public function WritePost(){
    $all_cat = DB::table('categories')->get();
    return view('post.writepost', compact('all_cat'));
  }
  public function StorePost(Request $request){

    $validatedData = $request->validate([
      'title' => 'required|max:125',
      'details' => 'required|max:2500',
      'image' => 'mimes:jpeg,jpg,png | max:1000',
    ]);
    $data = array();
    $data['categoryid'] = $request->categoryid;
    $data['title'] = $request->title;
    $data['details'] = $request->details;
    $image = $request->file('image');
    if ($image) {
      $image_name = hexdec(uniqid());
      $ext = strtolower($image->getClientOriginalExtension());
      $image_full_name = $image_name.'.'.$ext;
      $upload_path = "public/FrontEnd/images/";
      $image_url = $upload_path.$image_full_name;
      $image_url = $image->move($upload_path,$image_full_name);
      $data['image'] = $image_url;
      DB::table('posts')->insert($data);
      $notification =array(
        'message'=>'Successfully Post Updated!',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }else {
      DB::table('posts')->insert($data);
      $notification =array(
        'message'=>'Somthing Post Updated!!',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }
  }
  public function AllPost(){
    // $allpost = DB::table('posts')->get();
    $allpost = DB::table('posts')
    ->join('categories','posts.categoryid','categories.id')
    ->select('posts.*','categories.name')
    ->get();
    return view('post.allpost',compact('allpost'));
  }
  public function ViewPost($id){
    // $allpost = DB::table('posts')->get();
    $viewpost = DB::table('posts')
    ->join('categories','posts.categoryid','categories.id')
    ->select('posts.*','categories.name')
    ->where('posts.id',$id)
    ->first();
    // return response()->json($viewpost);
    return view('post.viewpost',compact('viewpost'));
  }
  public function EditPost($id){
    $editcat = DB::table('categories')->get();
    $editpost = DB::table('posts')->where('id',$id)
    ->first();
    return view('post.editpost',compact('editcat','editpost'));
  }
  public function UpdatePost(Request $request,$id){
    $validatedData = $request->validate([
      'title' => 'required|max:125',
      'details' => 'required|max:2500',
      'image' => 'mimes:jpeg,jpg,png | max:1000',
    ]);
    $data = array();
    $data['categoryid'] = $request->categoryid;
    $data['title'] = $request->title;
    $data['details'] = $request->details;
    $image = $request->file('image');
    if ($image) {
      $image_name = hexdec(uniqid());
      $ext = strtolower($image->getClientOriginalExtension());
      $image_full_name = $image_name.'.'.$ext;
      $upload_path = "public/FrontEnd/images/";
      $image_url = $upload_path.$image_full_name;
      $image_url = $image->move($upload_path,$image_full_name);
      $data['image'] = $image_url;
      unlink($request->old_photo);
      DB::table('posts')->where('id',$id)->update($data);
      $notification =array(
        'message'=>'Successfully Post Updated!',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }else {
      $data['image'] = $request->old_photo;
      DB::table('posts')->where('id',$id)->update($data);
      $notification =array(
        'message'=>'Somthing Post Updated!!',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }
  }
  public function DeletePost($id){

    $post = DB::table('posts')->where('id',$id)->first();
    $image = $post->image;
    // return response()->json($image);
    $delete = DB::table('posts')->where('id',$id)->delete();
    if ($delete) {
      unlink($image);
      $notification =array(
        'message'=>'Successfully Post Deleted!!',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.post')->with($notification);
    }else {
      $notification =array(
        'message'=>'Somthing Went Wrong!!',
        'alert-type'=>'warning'
      );
      return Redirect()->route('all.post')->with($notification);
    }
  }
}
