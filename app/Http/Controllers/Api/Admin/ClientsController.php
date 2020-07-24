<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\User;

class ClientsController extends Controller
{
    
    /**
     * Get Clients List
     */
    public function getClients(Request $request) {   
        $params = $request->all();
        $limit = (isset($params['limit']))?$params['limit']:5; 
        $page =  ( isset($params['page']) )?$params['page']:1;
        $offset = (( $page - 1 ) * $limit);

        $result = User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'user');
        })
        ->where(function($q) use ($params) {
            $q->orWhere('first_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('last_name', 'LIKE', '%'.$params['search'].'%') 
            ->orWhere('display_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('email', 'LIKE', '%'.$params['search'].'%');
         }) 
        ->orderBy($params['sort'],$params['direction'])
        ->offset($offset)
        ->limit($limit)
        ->get()
        ->all();   
        $count = $this->getClientsCount($request);
        return [
            'data' => $result,
            'total' => $count
        ];
    }
    
    /**
     * Get Clients Total Count
     */
    private function getClientsCount(Request $request){  
        $params = $request->all(); 
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'user');
        })
        ->where(function($q) use ($params) {
            $q->orWhere('first_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('last_name', 'LIKE', '%'.$params['search'].'%') 
            ->orWhere('display_name', 'LIKE', '%'.$params['search'].'%')
            ->orWhere('email', 'LIKE', '%'.$params['search'].'%');
         }) 
        ->get()
        ->count();  
    }

    public function editClients(Request $request,$id) {  
        return User::whereHas('roles', function ($q) {
            $q->where('roles.name', '=', 'user');
        })->find($id);  
    }


}
