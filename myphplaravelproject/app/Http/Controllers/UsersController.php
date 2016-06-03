<?php
namespace App\Http\Controllers;
use App\MstUser;
use Illuminate\Routing\Controller as BaseController;
class UsersController extends BaseController {
	public function index() {
		$datas = MstUser::paginate ( 10 );
		foreach ( $datas as $data ) {
			$data->all ();
		}
		return view ( 'pages/user_list' );
	}
}
