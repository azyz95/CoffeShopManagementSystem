<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Orders;
use App\Item;
use App\Comment;
use Auth;
use DB;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        return view('admin.home');
    }

    public function salaries() {
        if(Auth::user()->type == 1 ){

        $users = User::get();

        return view('admin.salaries', compact('users', $users));

        } else {
            return redirect()->route('home')->with('msg', 'You dont have permision to access this page');
        }
    }

    public function supplies() {
        if(Auth::user()->type == 1 ){

        $items = Item::get();

        return view('admin.supplies', compact('items', $items));

        } else {
            return redirect()->route('home')->with('msg', 'You dont have permision to access this page');
        }
    }

    public function comments() {
        if(Auth::user()->type == 1 ){

        $comments = Comment::get();

        return view('admin.comments', compact('comments', $comments));

        } else {
            return redirect()->route('home')->with('msg', 'You dont have permision to access this page');
        }
    }

    public function addshowuser() {
        if(Auth::user()->type == 1 ){

        return view('admin.add-user');

        } else {
            return redirect()->route('home')->with('msg', 'You dont have permision to access this page');
        }
    }

    public function orders() {
        
        $orders = Orders::get();

        return view('admin.orders', compact('orders', $orders));
    }

    public function approveorder($id) {
        
        $order = DB::table('orders')->where('id', $id)->first();

        if($order != null) {
            if($order->status == 0) {
                DB::table('orders')
                    ->where('id', $id)
                    ->update(['status' => 1, 'worker' => Auth::user()->name]);
                //----------------------------------     
                $msg = 'You have successfuly marked order #' . $order->id . ' as accepted';           
            } else {
                if($order->worker == Auth::user()->name) {
                DB::table('orders')
                    ->where('id', $id)
                    ->update(['status' => 0, 'worker' => '']);
                //----------------------------------  
                    $msg = 'You have successfuly marked order #' . $order->id . ' as waiting';    
                } else {
                    $msg = 'Cant cancel order because you didnt accept order with id #' . $order->id . '';    
                }

            }
            
            return redirect()->back()->with('msg', $msg);
            
        } else {
            return redirect()->back()->with('msg', 'Error while changing order status');
        }

      }

      public function removeorder($id) {
        
        $msg = '';
        $order = DB::table('orders')->where('id', $id)->first();

        if($order != null) {         
                DB::table('orders')
                    ->where('id', $id)
                    ->delete();
                //----------------------------------  
                $msg = 'You have successfuly REMOVED order #' . $order->id;    

        }
            
            return redirect()->back()->with('msg', $msg);
            
      }

      public function removeitem($id) {
        
        $msg = '';
        $item = DB::table('items')->where('id', $id)->first();

        if($item != null) {         
                DB::table('items')
                    ->where('id', $id)
                    ->delete();
                
                @unlink('images/' . $item->picture);
                //----------------------------------  
                $msg = 'You have successfuly REMOVED item #' . $item->id .', '.$item->name;    


        }
            
            return redirect()->back()->with('msg', $msg);
            
      }

      public function storeuser(Request $request)
      {   
          $msg = '';
          
          $user = new User;
          $user->name = $request->input('name');
          $user->email = $request->input('email');
          $user->password = Hash::make($request->input('password'));
          $user->type = $request->input('type');
  
          if ($request->hasFile('picture')){
              $picture = $request->file('picture');
  
              $pic = $picture->getPathname();
              $filename  = rand(1, 9) . round(microtime(true) * 1000) . rand(1, 9) . '.' . $picture->extension();
              $location = public_path('media/' . $filename);
  
              if(Image::make($pic)->save($location)){
                  $user->picture = $filename;
              }
          } else {
              $user->picture = 'default.jpg';
              $msg = '.But picture is not uploaded because of size or type.';
          }
  
          $user->save();
  
          if($user->save()){
              return redirect()->back()->with('msg', 'Successfuly added user to your website' . $msg);
          }
          else {  
              //DELETE THUMBNAIL
              @unlink('images/' . $filename);
  
              return redirect()->back()->with('msg', 'Error while adding item');
          }
      
      }










}
