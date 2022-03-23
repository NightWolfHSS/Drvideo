<?php
/*
* DeleteController Ready
* there is only method add for Delete data  
* you can find to delete thus: needed (delete_name_method) ctrl+f
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Piece;
use App\Models\Partner;
use App\Models\MiniImg;
use App\Models\Social;
use Storage;

class DeleteController extends Controller
{
    /**
     * destroy slider 
     * page - config-admin
     */
    public function delete_slider_opt($id)
    {
       $slides = Slider::find($id);
       // checking pictures
       if ($slides->image == "null") {
           // nothing
       } else {
           Storage::disk('public')->delete($slides->image);
       }
       // delete 
       $slides->delete();
       return redirect('/edito_admin')->with('status', 'Слайд был удалён!');
    }

    /**
     * destroy Pieces 
     * page - config-admin
     */
    public function delete_piece($id)
    {
       $piece = Piece::find($id);
       // checking pictures
       if ($piece->icon == "null") {
           // nothing
       } else {
           Storage::disk('public')->delete($piece->icon);
       }
       // delete 
       $piece->delete();
       return redirect('/edito_admin')->with('status', 'фишка была удалена!');
    }

    /**
     * destroy Partners 
     * page - config-admin
     */
    public function delete_partners($id)
    {
       $partner = Partner::find($id);
       // checking pictures
       if ($partner->logo_p == "null") {
           // nothing
       } else {
           Storage::disk('public')->delete($partner->logo_p);
       }
       // delete 
       $partner->delete();
       return redirect('/edito_admin')->with('status', 'Партнер был удален!');
    }

    /**
     * destroy mini images 
     * page - config-admin
     */
    public function delete_mini($id)
    {
       $mini = MiniImg::find($id);
       // checking pictures
       if ($mini->mini == "null") {
           // nothing
       } else {
           Storage::disk('public')->delete($mini->mini);
       }
       // delete 
       $mini->delete();
       return redirect('/edito_admin')->with('status', 'Картинка была удалена!');
    }

    
     /**
     * destroy icons social 
     * page - config-admin
     */
    public function delete_icon($id)
    {
       $soc = Social::find($id);
       $soc->delete();
       return redirect('/edito_admin')->with('status', 'соц сеть была удалена!');
    }

    // end
}
