<?php namespace App\Http\Requests;

use App\Library\Helpers\MyRouteHelper;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class DomainRequest extends Request {


    /**
     * @var \Route
     */
    private $route;

    function __construct(Route $route)
    {

        $this->route = $route;
    }

    /**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */


	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $id = '';
        if(getAction()=='update') {
            $id = ',' . $this->route->getParameter('domain');
        }
		return [
            'code' => 'required|unique:domains,code'.$id.'|max:20',
            'name' => 'required|unique:domains,name'.$id.'|max:100',
        ];
	}

}
