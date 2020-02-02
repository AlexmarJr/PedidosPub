<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Publicacao;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PubExport;

class LoginController extends Controller
{
    public function store(Request $request)
    {

        //Testing github
        try{
        $adminStatus = $request->get('adminStatus');
        $cong = $request->get('congregacao');
        $publ = Publicacao::all();
                $id = $request->get('id', false);
                $pub['name']=$request->selectPub;
                $pub['congregacao']=$request->congregacao;
                $pub['idioma']=$request->languagePub;
                $pub['quant']=$request->quant;
                if($id){
                    $publications = Publicacao::find($id);
                    $publications->fill($pub);
                    $publications->save();
                }
                else{
                    Publicacao::create($pub);
                }
                return redirect()->route('index')->withSuccess('Operação realizada com Sucesso!');
        }
                catch (\Exception $e) {
                    return redirect()->route('index')->withErrors($e->getMessage());
                }
        
    }
    public function option(){
        $userName = session()->get('valor');
        $cong = session()->get('cong');
        $publ = Publicacao::all();
        return compact('userName','cong','publ');
    }

    public function read($id){
            $head = Publicacao::find($id);
            return view('index', array_merge(['head' => $head], $this->option()));
    }

    public function delete($id){
        try{
        $head = Publicacao::find($id);
        $head->delete();
        return view('index',$this->option());
        }
        catch (\Exception $e) {
            return redirect()->route('index');
        }
    }

    public function deleteAdmin($id){
        try{
        $head = Publicacao::find($id);
        $head->delete();
        return view('admin',$this->option());
        }
        catch (\Exception $e) {
            return redirect()->route('index');
        }
    }

    public function changeStatus($id){
       
            $head = Publicacao::find($id)->update(['status' => 1]);
            return redirect()->route('search');
            
    }

    public function search(){
        $publ = DB::table('publicacao')->orderBy('congregacao')->where('status','=','0')->get();
        return view('admin', compact('publ'));
    }

    public function searchEnviados(){
        $publ = DB::table('publicacao')->orderBy('created_at')->get();
        return view('historicRequests', compact('publ'));
    }

    public function login(Request $request) {
        $x = false;
        $usuarios = Usuarios::all();
        $userName = $request->get('user');
        $userPass = $request->get('pass');
        $cong = Usuarios::where('name',$userName)->value('cong');
        $publ = Publicacao::all();
        $request->session()->put('valor',$userName);
        $request->session()->put('cong',$cong);
        foreach ($usuarios as $value){
            
            if ($value->name == $userName && $value->password == $userPass) {
                    return redirect()->route('index',compact('userName','cong','publ'))->withSuccess('Operação realizada com Sucesso!');
        }   
        $x = true;
        
    }
    
    return view('login',compact('x'));
    
}

public function index(Request $request){
    $publ = Publicacao::all();
    $userName = $request->session()->get('valor');
    $cong = $request->session()->get('cong');
    return view('index',compact('userName','cong','publ'));
}



public function historic(){
    return view('historicRequests');
}

public function logoff(){
    $x = false;
    return view('login',compact('x'));
}

public function filter(Request $request){
    $cong = $request['congSelect'];
    
    $publ = DB::table('publicacao')->orderBy('created_at')->where('congregacao','=',$cong)->get();
    return view('historicRequests', compact('publ'));
}


public function export() 
{
    return Excel::download(new PubExport, 'Pedidos.xlsx');
}


}
