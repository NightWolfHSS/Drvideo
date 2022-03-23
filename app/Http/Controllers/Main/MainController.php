<?php
/*
* MainController Ready
* for other users
*/
namespace App\Http\Controllers\Main;

use Auth;
use Validator;
use Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment;
use App\Models\Args;
// use App\Models\Partner;

use App\Models\MiniImg;
use App\Models\Social;

class MainController extends Controller
{
	/*just home page*/
	public function home()
	{

		// век живи век учись... не нужны нам тут модели мы юзаем DB фасад
		// $slides  = DB::table('sliders')->get();
		$pieces  = DB::table('pieces')->get();
		$partner = DB::table('partners')->take(10)->get();
		$mini_img = DB::table('mini_imgs')->get();
		$soc      = DB::table('socials')->get();
		// is Empty slides
		// if ($slides->isEmpty()) {
		// 	$slides = null;
		// }
		return view('home.index', 
		[
			// 'slides' => $slides,
			'pieces' => $pieces,
			'partner' => $partner,
			'mini_img' => $mini_img,
			'soc'      => $soc,
		]);
	}

	/**
	 * pay now
	 * return view Pay page
	 */
	public function payUser() 
	{
		$footer  = DB::table('footer_itms')->get();
		$mini_img = DB::table('mini_imgs')->get();
		$soc      = DB::table('socials')->get();
		// data
		return view('home.cart',
		[
			'footer'  => $footer,
			'mini_img' => $mini_img,
			'soc'      => $soc,
		]);
	}

	/**	
	 * about company
	 * you can see and use this information
	 */
	public function contact()
	{
		$footer  = DB::table('footer_itms')->get();
		$mini_img = DB::table('mini_imgs')->get();
		$soc      = DB::table('socials')->get();
		return view('home.contact', 
		[
			'footer'  => $footer,
			'mini_img' => $mini_img,
			'soc'      => $soc,
		]);
	}

	/**
	 * send recall
	 * method post 
	 */
	 public function sendRecall(Request $req)
	 {	
		/*rules ready */ 
		$rules = [
			'rating'        => 'required',
			'id_product'    => 'required',
			'id_user'       => 'required',
			'img'      		=> 'required',
			'user'          => 'required',
			'patronymic'    => 'required',
			'comment'		=> 'required'
		];
		//start api
		$val_api = Validator::make($req->all(), $rules);
		//cheking
		if ($val_api->fails())
		{
		return back()
		  ->withInput()
		  ->withErrors($val_api);  
		} else {
		  $data = $req->input(); // get data
		  try {
		  // save data
		  $comments = new Comment();
		  $comments->rating	 	       = $data['rating'];
		  $comments->id_product	 	   = $data['id_product'];
		  $comments->id_user	 	   = $data['id_user'];
		  $comments->img	 	       = $data['img'];
		  $comments->user	 	       = $data['user'];
		  $comments->patronymic	 	   = $data['patronymic'];
		  $comments->comment	 	   = $data['comment'];
		  $comments->save();
		  // redirect 
			return back()->with('status', 'отправлено!');
		  } catch (Exception $e) {
			return back()->with('status', 'не получилось!');
		  }
		}
	 }

	/**
	 * UserPanel
	 * check current user
	 */
	public function showUser() 
	{			
		/* checkin user */
		if (Auth::guard('user')->check()) {
			$user = auth('user')->user();
			if (!$user) {
				return redirect('/');
			}
			return view('userpanel.userpanel', ['user' => $user]);
		}
		return redirect('/login');
	}

	/**
	 * just updating custom stuff
	 * only for an authorized user
	 */
	public function updateUserData(Request $req) 
	{
		// get current user id and other staff in data
		$staff = auth('user')->user()->id;
		$user = User::find($staff);
        $data = $req->input();
        // delete old file
        Storage::disk('public')->delete($user->image_user);
        // cheking if file and save
        if($req->hasFile('image')){
            $req->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $req->file('image')->store('uploads','public');
            $user->image_user = $path;
        }
        // upd staff
        $user->name = $data['name'];
        $user->patronymic = $data['patronymic'];
        $user->save();
		// success or filed		
      	return redirect('/user')->with('status','Отлично! данные обновлены');	
	}

	/**
	 * login 
	 * check authorization
	 */
	public function login() 
	{	
		/* checkin user */
		if (Auth::guard('user')->check()) {
			return redirect('/user');
		}
		return view('home.login');
	}

	/**
	 * login method 
	 * is user
	 */
	public function comeIn(Request $req)
	{	
		/*validate*/
		$this->validate($req, [
			'email'     => 'required|email',
			'password'  => 'required',
		]);
		/*auth*/
		$credentials = $req->only('email', 'password');
		if (Auth::guard('user')->attempt($credentials)) {
			$req->session()->regenerate();
			return redirect()->intended('/user');
		};
		/* notations */
		return back()->withErrors([
			'email'    => 'mail - не верный!',
			'password' => 'пароль не верный!',
		]);
	}

	/**
	 * method registration
	 * return data
	 */
	public function registrationIn(Request $req) 
	{
		/*rules ready */ 
		  $rules = [
			'name'          => 'required|between:2,255',
			'patronymic'    => 'required|between:2,255',
			'email'         => 'required|email|unique:users',
			'password'      => 'required|confirmed|between:8,255|regex:(^([A-Za-z0-9]+)?$)',
		  ];
		  //start api
		  $val_api = Validator::make($req->all(), $rules);
		  //cheking
		  if ($val_api->fails())
		  {
			return redirect('/registration')
			->withInput()
			->withErrors($val_api);  
		  } else {
			$data = $req->input(); // get data
			try {
			// save data
			$post = new User();
			$post->name	 	   = $data['name'];
			$post->patronymic  = $data['patronymic'];
			$post->email 	   = $data['email'];
			$post->password    = Hash::make($data['password']);
			$post->save();
			// redirect 
			  return redirect('/login')->with('status', 'Регистрация завершена - Теперь заходите!');
			} catch (Exception $e) {
			  return redirect('/registration')->with('status', 'произошла какая то ошибка - попробуйте снова');
			}
		  }
	}

	/**
	* Logout 
    */
    public function logout(Request $req)
	{
	    Auth::logout();
	    $req->session()->invalidate();
	    $req->session()->regenerateToken();
	    return redirect('/');
	}

	/**
	 * Registration 
	 * check authorization
	 * we use own created guard
	 */
	public function registration() 
	{
		/* checkin user */
		if (Auth::guard('user')->check()) {
			return redirect('/login');
		}
		return view('home.registration');
	}

	/* single-product*/
	public function ShowItem($id) 
	{	
		
		/**
		 * также логика - дать комментарий. Его отправить в админку - там показывать все только что добавленные отзывы
		 * одобрил отзыв добавил 1 к примеру - не одобрил 0. пока админ адабривает - статус проверки отзыва.
		 * одобрил и показали сразу отзыв (можно сделать загрузку анимацию )
		 * 
		 * проверка если id_user !== null проверка на сущ комент сказать - спасибо за отзыв 
		 * если нет то позволить оставить отзыв.
		 * показать 3 отзыва
		 * показать оценки пользователей у кого какие звезды - колличество цифра
		 */
		// $current_user = auth('user')->user()->id;
		$footer  = DB::table('footer_itms')->get();
		$user = auth('user')->user();
		$product = DB::table('products')->find($id);
		$mini_img = DB::table('mini_imgs')->get();
		$soc      = DB::table('socials')->get();
	
		// $comment = DB::table('comments')->select('*')->where('id_product', '=', $id)->get();
		if (!$product) {
			return redirect('/');
		}

		return view('home.item', [
			'product' => $product,
			'user' => $user,
			'footer' => $footer,
			'mini_img' => $mini_img,
			'soc'      => $soc,
		]);
	}

	/**
	 * all products
	 */
	public function ShowProducts(Request $req)
	{	
		// get Data
		$footer  = DB::table('footer_itms')->get();
		$products = DB::table('products')->paginate(6); 
		$filter   = DB::table('products')->select('brand')->distinct()->get();
		$args     = Args::whereNull('parent_id')->with('childsArgs')->get();
		$mini_img = DB::table('mini_imgs')->get();
		$soc      = DB::table('socials')->get();
		// is Empty products
		if ($products->isEmpty()) {
			$products = null;
		}
		// is data
		return view('home.products', 
		[
			'products' => $products,
		 	'filter'   => $filter,
			'args'	   => $args,
			'footer'   => $footer,
			'mini_img' => $mini_img,
			'soc'      => $soc,
		]);	
	}

	/**
	 * get post
	 * method find
	 * return redirect to filter
	*/
	public function findItem(Request $req)	 
	{	
		// converting lowercase
		// check is not null
		if ($req->input('exsp') !== null) {
			$smaller = mb_strtolower($req->input('exsp'));
			// check
			if ($smaller !== '') {
				return redirect('/products/'.$smaller);
			} else if ($smaller == '') {
				return redirect('/products');
			}
		}
		// check is not null
		if ($req->input('stmt') !== null) {
			$smaller = mb_strtolower($req->input('stmt'));
			// check
			if ($smaller !== '') {
				return redirect('/products/'.$smaller);
			} else if ($smaller == '') {
				return redirect('/products');
			}
		}
		return redirect('/products');
	}

	/**
	 * we use one method to prevent multiple code
	 * we use all filters here
	 */
	public function showItems(Request $req, $name)
	{
		/**
		 * everything is simple here
		 * the current match is a column in the database
		 * method urldecode 
		 * $name matches it is url $name
		 */
		$path = $req->path(); 
		$exp_word = explode('/', $path);
		$name_column = $exp_word[1];
		$fix = urldecode($exp_word[2]);
		// get all data
		$selecter  = DB::table('products')->select('selecter')->distinct()->get();
		$filter    = DB::table('products')->select('brand')->distinct()->get();
		$footer    = DB::table('footer_itms')->get();
		$mini_img  = DB::table('mini_imgs')->get();
		$soc       = DB::table('socials')->get();
		$args      = Args::whereNull('parent_id')->with('childsArgs')->get();
		//  filter Descending
		if ($path === "products/price/more") {
			if (!$fix === "more") {
				$itm = "null";
				return redirect('/products');
			}
			// $path = "products/price/".$name;
			$itm = DB::table('products')
			->orderBy('price','desc')
			->paginate(6);
			$fix = 'дороже';
		} else {
			$itm = null;	
		} 


		// filter Ascending
		if ($path === "products/price/low") {
			$path = "products/price/".$name;
			if (!$fix == "low") {
				$itm = "null";
				// return redirect('/products');
			}
			$itm = DB::table('products')
				->orderBy('price','asc')
				->paginate(6);
				$fix = 'дешевле';
			// $itm = null;
		} else {
			$itm = null;
		}
		// brand filter
		if ($path === "products/brand/".$name) {
			$itm = DB::table('products')
				->where('brand', 'like', $fix)
				->paginate(6);
			// data 
			if($itm->isEmpty()) {
				return redirect('/products');
			} else {
				$fix = $name;
			}
		}
		// dd($fix);
		// if data of null
		// if ($itm == "null") {
		// 	return redirect('/products');
		// }
		// get all items
		return view('home.cat', 
		[
			'itm'      => $itm,
			'filter'   => $filter,
			'fix' 	   => $fix,
			'selecter' => $selecter,
			'args'     => $args,
			'footer'   => $footer,
			'mini_img' => $mini_img,
			'soc'      => $soc,
		]);
	}

}
