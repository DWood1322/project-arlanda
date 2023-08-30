<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\client;
use Illuminate\Http\Request; 
use illuminate\Support\Facades\Session;
use DB;




class projectController extends Controller
{
    public function index(Request $request){
         $create = DB::table( 'tb_m_client')
         ->get();
        $katakunci =$request->katakunci;
        $kataclient =$request->kataclient;
        $katastatus =$request->katastatus;
        
        if ($request->has('clear')) {
            return redirect()->route('project');
        }

        if(strlen($katakunci)){
            $data = client::join('tb_m_project', 'tb_m_client.client_id', '=', 'tb_m_project.client_id')
            ->select('tb_m_project.project_id','tb_m_project.project_name', 'tb_m_client.client_name', 'tb_m_project.project_start','tb_m_project.project_end','tb_m_project.project_status',)
            ->when(strlen($katakunci), function ($query) use ($katakunci) {
                return $query->where("project_name", "LIKE", "%$katakunci%");
            })
            ->paginate(5);
            
        }else{
            $data = client::join('tb_m_project', 'tb_m_client.client_id', '=', 'tb_m_project.client_id')
        ->select('tb_m_project.project_id','tb_m_project.project_name', 'tb_m_client.client_name', 'tb_m_project.project_start','tb_m_project.project_end','tb_m_project.project_status',)
        ->paginate(5);
        }

        // if(strlen($kataclient)){
        //     $data = client::join('tb_m_project', 'tb_m_client.client_id', '=', 'tb_m_project.client_id')
        //     ->select('tb_m_project.project_id','tb_m_project.project_name', 'tb_m_client.client_name', 'tb_m_project.project_start','tb_m_project.project_end','tb_m_project.project_status',)
        //     ->when(strlen($kataclient), function ($query) use ($kataclient) {
        //         return $query->where("client_name", "LIKE", "%$kataclient%");
        //     })
        //     ->paginate(5);
            
        // }else{
        //     $data = client::join('tb_m_project', 'tb_m_client.client_id', '=', 'tb_m_project.client_id')
        // ->select('tb_m_project.project_id','tb_m_project.project_name', 'tb_m_client.client_name', 'tb_m_project.project_start','tb_m_project.project_end','tb_m_project.project_status',)
        // ->paginate(5);
        // }

        // if(strlen($katastatus)){
            
        //     $data = client::join('tb_m_project', 'tb_m_client.client_id', '=', 'tb_m_project.client_id')
        //     ->select('tb_m_project.project_id','tb_m_project.project_name', 'tb_m_client.client_name', 'tb_m_project.project_start','tb_m_project.project_end','tb_m_project.project_status',)
        //     ->when(strlen($katastatus), function ($query) use ($katastatus) {
        //         return $query->where("project_name", "LIKE", "%$katastatus%");
        //     })
        //     ->paginate(5);
            
        // }else{
        //     $data = client::join('tb_m_project', 'tb_m_client.client_id', '=', 'tb_m_project.client_id')
        // ->select('tb_m_project.project_id','tb_m_project.project_name', 'tb_m_client.client_name', 'tb_m_project.project_start','tb_m_project.project_end','tb_m_project.project_status',)
        // ->paginate(5);
        // }



        

        return view('dataproject',compact('data','create'));
    }
    public function create(){
      
        $create = DB::table( 'tb_m_client')
        ->get();
        return view('create')->with('create', $create);
    }
    public function insert(Request $request){
        
        $request->validate([
            'project_name' => 'required',
            'client_id'      => 'required',
        ],[
            'project_name' => 'project Name Harus di isi',
            'client_id' => 'client Harus di isi',
        ]);
        //  dd($request->all());
        project::create($request->all());
        return redirect()->route('project')->with('success','Berhasil Menambahkan Data');
    }
    public function edit($id){
        
        $data =  project::where('project_id',$id)->first();
        $create = DB::table( 'tb_m_client')
        ->get();
        // dd($data);
        return view('edit',compact('data','create'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'project_name' => 'required',
            'client_id'      => 'required',
        ],[
            'project_name' => 'project Name Harus di isi',
            'client_id' => 'client Harus di isi',
        ]);
        $data = [
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'project_status' => $request->project_status,

        ];
        project::where('project_id',$id)->update($data);
        return redirect()->route('project')->with('success','Berhasil Update Data');
    }
   
    public function delete(Request $request) {
        $selectedItemIds = $request->input('item_ids', []);
    
         project::whereIn('project_id', $selectedItemIds)->delete();
    
        return response()->json(['message' => 'Item terpilih berhasil dihapus']);
    }
  
   
 
}
