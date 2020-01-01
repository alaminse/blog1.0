<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function Index(){
      $post = DB::table('posts')->join('categories','posts.categoryid','categories.id')->select('posts.*','categories.name','categories.slug')->paginate(3);

      return view('page.index',compact('post'));
      // return view('page.about');
    }
    public function About(){
      return view('page.about');
    }
    public function Contact(){
      return view('page.contact');
    }
    public function AddCategory(){
      return view('post.addcategory');
    }
    public function StoreCategory(Request $request){
      $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:25|min:4',
      ]);

      $data = array();
      $data['name'] = $request->name;
      $data['slug'] = $request->slug;
       $category = DB::table('categories')->insert($data);
      if ($category) {
        $notification =array(
          'message'=>'Successfully Category Inserted',
          'alert-type'=>'success'
        );
        return Redirect()->route('all.category')->with($notification);
      }else {
        $notification =array(
          'message'=>'Somthing Went Wrong!!',
          'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }

      //For showing data==============

      // return response()->json($data);
      // echo "<pre>";
      // print_r($data);

    }
    public function AllCategory(){
      $category = DB::table('categories')->get(); // for all data get() for one data fast() we use
      return view('post.allcategory', compact('category'));
    }
    public function ViewCategory($id){
      $category = DB::table('categories')->where('id',$id)->first(); // for all data get() for one data fast() we use
      return view('post.viewcategory')->with('category',$category);
    }
    public function DeleteCategory($id){
      $delete = DB::table('categories')->where('id',$id)->delete();
      $notification =array(
        'message'=>'Successfully Deleted',
        'alert-type'=>'success'
      );
      return Redirect()->route('all.category')->with($notification);
    }
    public function EditCategory($id){
      $category = DB::table('categories')->where('id',$id)->first();
      return view('post.editcategory', compact('category'));
    }
    public function UpdateCategory(Request $request, $id){
      $validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'slug' => 'required|max:25|min:4',
      ]);

      $data = array();
      $data['name'] = $request->name;
      $data['slug'] = $request->slug;
      $category = DB::table('categories')->where('id',$id)->update($data);
      if ($category) {
        $notification =array(
          'message'=>'Successfully Category Update',
          'alert-type'=>'success'
        );
        return Redirect()->route('all.category')->with($notification);
      }else {
        $notification =array(
          'message'=>'Nothing to Updated!!',
          'alert-type'=>'error'
        );
        return Redirect()->route('all.category')->with($notification);
      }
    }

}
