<?php
/*
* AdminController Ready
* there is only view template
* you can find to view thus: needed (view) ctrl+f
*/
namespace App\Http\Controllers\Admin;

use Auth;
use Validator;
use Artisan;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Adminx;
use App\Models\Product;
use App\Models\Image;
use App\Models\Args;
use App\Models\Slider;  
use App\Models\Piece;
use App\Models\Partner;
use App\Models\MiniImg;
use App\Models\Social;

class AdminController extends Controller
{
   /**
   * testing and debuging method 
   * design kod
   * the code must be correct
   */
   public function test()
   {  
    \Artisan::call('optimize');
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');
    return 'O>K';
   }

  //  public function hash() 
  //  {
  //    return DB::table('admx')->insert(['name'=>'Vadim', 'email' => 'm12@mail.ru', 'password' => Hash::make('0202sx')]);
  //  }

   /** 
    * show edit main page
    * we use data for view 
   */
   public function editAdmin()
   {
      $piece    = DB::table('pieces')->get();
      $slides   = DB::table('sliders')->get();
      $partners = DB::table('partners')->take(10)->get();
      $mini_img = DB::table('mini_imgs')->get();
      $soc      = DB::table('socials')->get();

      return view('admin.config-admin', 
      [
          'slides' => $slides,
          'piece'  => $piece,
          'partners' => $partners,
          'mini_img' => $mini_img,
          'soc'      => $soc,
      ]);
   }

   /**
   * show items in admin
   */
   public function showItems(Request $req) 
   {
      $products = DB::table('products')->paginate(6);
      return view('admin.showItems', ['products' => $products]);
   }

	  /**
    * only admin
    */
    public function admin(Request $req) 
    {	
		  return view('admin.admin');
    }

  	/** 
    * login admin
    */
  	public function login_x() 
  	{	
  		if (!Auth::check()) {
  			return view('admin.loginx');
  		}
  		return redirect('/admin');
  	}

  	/*
    * request array
    */
  	public function send_x(Request $req)
  	{	
      Artisan::call('cache:clear');
  		/*validate*/
  		$this->validate($req, [
  			'name'     => 'required',
  			'password' => 'required',
  		]);
  		/*auth*/
  		$credentials = $req->only('name', 'password');
  		if (Auth::attempt($credentials)) {
  			$req->session()->regenerate();
  			return redirect()->intended('/admin');
  		}
  		/* validate auth */
  		return back()->withErrors([
  			'name' 	   => 'Имя не верно',
  			'password' => 'пароль не верный'
  		]);
  	}

  	/*logout*/
  	public function logout(Request $req)
  	{
  		Auth::logout();
      Artisan::call('cache:clear');
  		$req->session()->invalidate();
  		$req->session()->regenerateToken();
  		return redirect('/');
  	}

    /**
     * add products 
     * get data Args
     */
    public function addItem(Request $req)
    {
      $args = Args::whereNull('parent_id')
                      ->with('childsArgs')
                      ->get();
    	return view('admin.addItem', compact('args'));
    }

    /* control args */
    public function controlArgs(Request $req)
    {
      $args = Args::whereNull('parent_id')
                      ->with('childsArgs')
                      ->get();
      return view('admin.contArg', compact('args'));
    }

    /**
    * add new args
    */
    public function addArx(Request $req) 
    {
      // rule
      $rules = [ 
        'img'   => 'mimes:png,jpeg,jpg',
        'name'  => 'required|max:150',
      ];
      //start API
      $val_api = Validator::make($req->all(), $rules);
      //cheking
      if ($val_api->fails()) {
        return redirect('/controllargs')
        ->withInput()
        ->withErrors($val_api);  
      } else {
        $data = $req->input(); // get data
        try {
        // save args
        $arg = new Args();
        $arg->name = $data['name'];
        // imagen args
        if ($req->hasFile('img')) {
            $path_x = $req->file('img')->store('uploads','public');
            $arg->img = $path_x;
        }
        // save   
        $arg->save();
        // redirect is error
          return redirect('/controllargs')->with('status', ' подкатегория добавлена');
        } catch (Exception $e) {
          return redirect('/controllargs')->with('status', ' провал - не добавлено');
        }
      }
    }

   /** 
    * sets procats
    */ 
    public function procats_save(Request $req) 
    {
        // Validate 
        $rules = [
            'name'      => 'required|string',
            'parent_id' => 'required'
        ];
         //start API
        $val_api = Validator::make($req->all(), $rules);
        // cheking
        if ($val_api->fails()) {
          return redirect('/controllargs')
          ->withInput()
          ->withErrors($val_api);  
        } else {
          $data = $req->input();
        try {
         // get all
        $stmt = new Args();
        $stmt->name = $data['name'];
        if ($data['parent_id'] === "null") {
            return redirect('/controllargs')->with('status', 'только двойная вложенность!');
        }
        $stmt->parent_id = $data['parent_id'];
        // save and redirect
        $stmt->save();
         // redirect is error
         return redirect('/controllargs')->with('status', 'подкатегория добавлена');
        } catch (Exception $e) {
         return redirect('/controllargs')->with('status', 'провал - не добавлено');
        }
      }
    }

    /**
     * destroy args
     * remove argument images if present
    */  
    public function del_item_arg($id) 
    {
        $args = Args::find($id);
        // checking pictures
        if ($args->img == "null") {
          // nothing
        } else {
          Storage::disk('public')->delete($args->img);
        }
        // delete
        $args->delete();
        return redirect('/controllargs')->with('status', 'удаление выполнено!');
    }

    /**
    * add new item
    * must have refactoring DI?
    */
    public function add(Request $req)
    {
      /*rules ready */ 
      $rules = [
        'img'      => 'mimes:png,jpeg,jpg',
        'images.*' => 'mimes:png,jpeg,jpg',
      ];
      //start API
      $val_api = Validator::make($req->all(), $rules);
      //checking
      if ($val_api->fails()) {
        return redirect('/add')
        ->withInput()
        ->withErrors($val_api);  
      } else {
        $data = $req->input(); // get data
        try {
        // set data
        $post = new Product();
        $post->name        = $data['name'];
        $post->seo_desk    = $data['seo_desk'];
        $post->brand       = $data['brand'];
        $post->selecter    = $data['selecter'];
        $post->price       = $data['price'];
        $post->oldPrice    = $data['oldPrice'];
        $post->count       = $data['count'];
        $post->desc_short  = $data['desc_short'];
        $post->desk_large  = $data['desk_large'];
        $post->you_tb      = $data['you_tb'];
        $post->more_option = $data['more_option'];
        // is there an image and save file and puth
        if ($req->hasFile('img')) {
            $path_x = $req->file('img')->store('uploads','public');
            $post->img = $path_x;
        }
        $images = [];
       // is there an image and save arr file and puth
        if($req->hasFile('images')){
          foreach ($req->file('images') as $key => $img) {
            $images[] = $img->store('uploads','public');
          }
          $post->images = json_encode($images);
        } else {
          $post->images = "null";
        }
        // set data
        $post->save();    
        // redirect 
          return redirect('/add')->with('status', 'Успех данные сохранены');
        } catch (Exception $e) {
          return redirect('/add')->with('status', 'провал - данные не сохранены');
        }
      }
      // end add
    }


    /**
     * view 
     * return page - UPDATE/ID
     */
    public function update_item(Request $req, $id) 
    {
      return "скоро тут можно будет обновить данные поста";
    }


    /**
    * UPDATE item 
    */
    public function upd(Request $req, $id)
    {

      dd('exit');
        return die();
      /*rules ready */ 
      $rules = [
        'img'      => 'mimes:png,jpeg,jpg',
        'images.*' => 'mimes:png,jpeg,jpg',
      ];
      // получать последние файлы а вдруг ты не будешь заменять или удалять старые - заменил вставил удалил старые
      // проверка если файл(ы) то ты удаляешь старые картинки и добовляешь новые 2 проверки
      // редактирование делается по id
      // start API
      $val_api = Validator::make($req->all(), $rules);
      //cheking
      if ($val_api->fails()) {
        return redirect('add')
        ->withInput()
        ->withErrors($val_api);  
      } else {
        $data = $req->input(); // get data
        try {
        // save Post
        $post = Product::find($id);
        $post->name        = $data['name'];
        $post->seo_desk    = $data['seo_desk'];
        $post->brand       = $data['brand'];
        $post->selecter    = $data['selecter'];
        $post->price       = $data['price'];
        $post->oldPrice    = $data['oldPrice'];
        $post->count       = $data['count'];
        $post->desc_short  = $data['desc_short'];
        $post->desk_large  = $data['desk_large'];
        $post->more_option = $data['more_option'];
        // cheak main preview
        if ($req->hasFile('img')) {
      
            $path_x = $req->file('img')->store('uploads','public');
            $post->img = $path_x;
        }
        $images = [];
        // cheak other images
        if($req->hasFile('images')){
          foreach ($req->file('images') as $key => $img) {
            $images[] = $img->store('uploads','public');
          }
          $post->images = json_encode($images);
        } else {
          $post->images = "null";
        }
        // save
        $post->save();
        // redirect 
          return redirect('/add')->with('status', 'Успех данные сохранены');
        } catch (Exception $e) {
          return redirect('/add')->with('status', 'провал - данные не сохранены');
        }
      }
      // end upd
    }





   /**
    * destroy Item 
    */
    public function destroy($id) 
    {
      $stmt = DB::table('products')->find($id);
      if (!$stmt) {
          return redirect('/add')->with('status', 'Такой записи не было найдено!');
      } else {
          // checking the main picture
          if ($stmt->img == "") {
              // nothing
          } else {
            Storage::disk('public')->delete($stmt->img);
          }
          // cheack all images
          if ($stmt->images == "null") {
            // nothing
          } else {
            // delete images
            foreach (json_decode($stmt->images) as $key) {
              Storage::disk('public')->delete($key);
            }
          }
          // delete post{id}
          $stmt = Product::find($id); 
          $stmt->delete();
          // success!
          return redirect('/items')->with('status', 'Товар был удален !');
      }
      // end 
    }


    public function test_getting_data_in_the_fill(Request $req) 
    { 
      $data = $req->input();
      dd($data);
      return die();
    }

      // /* delete args by current id */
      // public function deleteArg($id)
      // {
      //   $arg = Args::with('args')->find($id);
      //   if (!$arg) {
      //     return redirect('/controllargs')->with('status', 'Такой подкатегории нет');
      //   } else {
      //     $arg = Args::find($id);
      //     $arg->delete();
      //     // success!
      //     return redirect('/controllargs')->with('status', 'Подкатегория удалена');
      //   }
      //   // end
      // }

        // /* delete args by current id */
        // public function delProargs($id)
        // {
        //   $arg = Proargs::with('proargs')->find($id);
        //   if (!$arg) {
        //     return redirect('/controllargs')->with('status', 'Такой категории нет');
        //   } else {
        //     $arg = Proargs::find($id);
        //     $arg->delete();
        //     // success!
        //     return redirect('/controllargs')->with('status', 'Категория удалена');
        //   }
        //   // end
        // }

        /**
         * Admin home methode 
         */

        /**
         * create slider information 
         * item product
         */
         public function create_item_slider(Request $req)
         {

         }

}
