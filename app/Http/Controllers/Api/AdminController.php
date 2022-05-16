<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required',
        ]);
        $id = auth()->user()->id;
        $updateAvatar = User::find($id);
        $updateAvatar->avatar = $request->avatar;
        $updateAvatar->save();
        return response()->json($updateAvatar);
    }
    public function editname(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $updateUser = User::find($id);
        $updateUser->name = $request->name;
        $updateUser->save();
        return response()->json($updateUser);
    }

    public function editemail(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        $updateUser = User::find($id);
        $updateUser->email = $request->email;
        $updateUser->save();
        return response()->json($updateUser);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function cars()
    // {
    //     $curl = curl_init();
    //     $where = urlencode('{
    //         "Category": {
    //             "$exists": true
    //         }
    //     }');
    //     curl_setopt(
    //         $curl,
    //         CURLOPT_URL,
    //         'https://parseapi.back4app.com/classes/Car_Model_List?limit=5&keys=Make&where=' .
    //             $where
    //     );
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, [
    //         'X-Parse-Application-Id: hlhoNKjOvEhqzcVAJ1lxjicJLZNVv36GdbboZj3Z',
    //         'X-Parse-Master-Key: SNMJJF0CZZhTPhLDIqGhTlUNV9r60M2Z5spyWfXW',
    //     ]);
    //     $data = json_decode(curl_exec($curl));
    //     print_r(json_encode($data, JSON_PRETTY_PRINT));
    //     curl_close($curl);
    // }
    public function store_cars()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://parseapi.back4app.com/classes/Carmodels_Car_Model_List?limit=100',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'X-Parse-Application-Id: e5ehHzVjE6FNvcXuIeBR2ApTDu4JAe31L4nVzj0a',
                'X-Parse-REST-API-Key: J5ehTafri8lm3QZwuvJUJSfSilDkLyJLPSgAnOWO',
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);

        $res = $data->results;
        $aC = count($res);
        for ($x = 0; $x <= $aC - 1; $x++) {
            $insert = DB::table('cars')->insertGetId([
                'make' => $res[$x]->Make,
                'model' => $res[$x]->Model,
                'category' => $res[$x]->Category,
                'year' => $res[$x]->Year,
            ]);
        }
    }
}
