<?php
/*
* AddController Ready
* there is only method add for all 
* you can find to add thus: needed (add_name_method) ctrl+f
*/
namespace App\Http\Controllers;
use Validator;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Piece;
use App\Models\Partner;
use App\Models\Footer_itm;
use App\Models\MiniImg;
use App\Models\Social;

class AddController extends Controller
{   
    /**
     * Slider
     */
    public function add_slider(Request $req)
    {
        /** rules */
        $rules = [
            'name'         => 'required',
            'deskroption'  => 'required',
            'href'         => 'required',
            'image'        => 'mimes:png,jpeg,jpg',
        ];
        // Start API
        $val_api = Validator::make($req->all(), $rules);
        // checking
        if ($val_api->fails()) {
            return redirect('/edito_admin')
            ->withInput()
            ->withErrors($val_api);
        } else {
            $data = $req->input(); // get data
            try {
                // set data
                $slider = new Slider();
                $slider->name        = $data['name'];
                $slider->deskroption = $data['deskroption'];
                $slider->href        = $data['href'];
                // is there an image and save file and puth
                if ($req->hasFile('image')) {
                    $slide_x = $req->file('image')->store('uploads/slider','public');
                    $slider->image = $slide_x;
                }
                // set data
                $slider->save();
                return redirect('/edito_admin')->with('status', 'Слайдер обновлён');
            } catch (Exception $e) {
                return redirect('/edito_admin')->with('status', 'Слайдер не обновил свои данные!');
            }
        }
    }

    /**
     * Pieces
     */
    public function add_pieces(Request $req)
    {
        /** rules */
        $rules = [
            'icon'  => 'mimes:png,jpeg,jpg',
            'name' => 'required',
            'desk' => 'required',
        ];
        // Start API
        $val_api = Validator::make($req->all(), $rules);
        // checking
        if ($val_api->fails()) {
            return redirect('/edito_admin')
            ->withInput()
            ->withErrors($val_api);
        } else {
            $data = $req->input(); // get data
            try {
                // set data
                $piece = new Piece();
                $piece->name  = $data['name'];
                $piece->desk  = $data['desk'];
                // is there an image and save file and puth
                if ($req->hasFile('icon')) {
                    $piece_icon = $req->file('icon')->store('uploads/piece', 'public');
                    $piece->icon = $piece_icon;
                }
                // set data
                $piece->save();
                return redirect('/edito_admin')->with('status', 'фишка была добавлена!');
            } catch (Exception $e) {
                return redirect('/edito_admin')->with('status', 'Фишка не добавлена!');
            }
        }
    }

    /**
     * Partner
     */
    public function add_partner(Request $req)
    {
        /** rules */
        $rules = [
            'logo_p'  => 'mimes:png,jpeg,jpg',
        ];
        // Start API
        $val_api = Validator::make($req->all(), $rules);
        // checking
        if ($val_api->fails()) {
            return redirect('/edito_admin')
            ->withInput()
            ->withErrors($val_api);
        } else {
            $data = $req->input(); // get data
            try {
                // set data
                $partner = new Partner();
                $partner->href_p = $data['href_p'];
                // is there an image and save file and puth
                if ($req->hasFile('logo_p')) {
                    $p_icon = $req->file('logo_p')->store('uploads/partner', 'public');
                    $partner->logo_p = $p_icon;
                }
                // set data
                $partner->save();
                return redirect('/edito_admin')->with('status', 'Партнёр был добавлен!');
            } catch (Exception $e) {
                return redirect('/edito_admin')->with('status', 'Партнёр не добавлен!');
            }
        }
    }

    /**
     * Footer
     * updateOrCreate
     */
    public function add_Fo_Itms(Request $req, $id)
    {      
        /** rules */
        $rules = [
            // 'name'         => 'required',
            // 'deskroption'  => 'required',
            // 'href'         => 'required',
            // 'image'        => 'mimes:png,jpeg,jpg',
        ];
        // Start API
        $val_api = Validator::make($req->all(), $rules);
        // checking
        if ($val_api->fails()) {
            return redirect('/edito_admin')
            ->withInput()
            ->withErrors($val_api);
        } else {
            $data = $req->input(); // get data
            try {
                // set data
                $foo = Footer_itm::find($id);
                $foo->column_1        = $data['column_1'];
                $foo->desk_1          = $data['desk_1'];
                $foo->column_2        = $data['column_2'];
                $foo->desk_2          = $data['desk_2'];
                $foo->column_3        = $data['column_3'];
                $foo->column_4        = $data['column_4'];
                $foo->desk_4          = $data['desk_4'];
                // set data
                $foo->save();
                return redirect('/edito_admin')->with('status', 'Подвал обновлён!');
            } catch (Exception $e) {
                return redirect('/edito_admin')->with('status', 'Подвал не обновлён!');
            }
        }
       
    }

     /**
     * Mini image
     */
    public function add_mini(Request $req)
    {
        /** rules */
        $rules = [
            'mini'  => 'required|mimes:png,jpeg,jpg',
        ];
        // Start API
        $val_api = Validator::make($req->all(), $rules);
        // checking
        if ($val_api->fails()) {
            return redirect('/edito_admin')
            ->withInput()
            ->withErrors($val_api);
        } else {
            $data = $req->input(); // get data
            try {
                // set data
                $foo = new MiniImg();
                // is there an image and save file and puth
                if ($req->hasFile('mini')) {
                    $m1 = $req->file('mini')->store('uploads/footer', 'public');
                    $foo->mini = $m1;
                }
                // set data
                $foo->save();
                return redirect('/edito_admin')->with('status', 'картинка была добавлена!');
            } catch (Exception $e) {
                return redirect('/edito_admin')->with('status', 'картинка не была добавлена!');
            }
        }
    }

     /**
     * Soc icons
     */
    public function add_soc(Request $req)
    {
        /** rules */
        $rules = [
            'icon' => 'required',
            'href' => 'required',
        ];
        // Start API
        $val_api = Validator::make($req->all(), $rules);
        // checking
        if ($val_api->fails()) {
            return redirect('/edito_admin')
            ->withInput()
            ->withErrors($val_api);
        } else {
            $data = $req->input(); // get data
            try {
                // set data
                $soc = new Social();
                // is there an image and save file and puth
                $soc->icon = $data['icon'];
                $soc->href = $data['href'];
                // set data
                $soc->save();
                return redirect('/edito_admin')->with('status', 'соц сеть была добавлена!');
            } catch (Exception $e) {
                return redirect('/edito_admin')->with('status', 'соц сеть не добавлена!');
            }
        }
    }
    //  end
}
