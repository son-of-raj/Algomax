<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;

class Controller extends BaseController
{
    public function FileUpload(Request $request){
        $values = Yaml::parse(file_get_contents($request->fileToUpload));
        $role1 = $values['Jobs']['Role1'];
        $role2 = $values['Jobs']['Role2'];

            DB::table('jobs')->insert([
                'Role'      => $role1,
                'Role_number' => 'Role1'
            ]);
            DB::table('jobs')->insert([
                'Role'      => $role2,
                'Role_number' => 'Role2'
            ]);

        $skill1 = $values['Skills']['FullStack'];
    
        $full_stack_array = explode (",",$skill1);

        foreach ($full_stack_array as $full_stack){
             DB::table('skills')->insert([
                'skill_name'      => $full_stack,
                'skill_role' => 'FullStack'
            ]);
        }

        $skill2 = $values['Skills']['AiDeveloper'];

        $aideveloper_array = explode (",",$skill2);

        foreach ($aideveloper_array as $aideveloper){
             DB::table('skills')->insert([
                'skill_name'      => $aideveloper,
                'skill_role' => 'AiDeveloper'
            ]);
        }
        
        $candidates = $values['Candidates'];
        
        foreach($candidates as $key=>$candidate)
            {
            $candidate_name = $key;
            $candidate_role = $candidate;
                 DB::table('candidates')->insert([
                'name'      => $candidate_name,
                'role' => $candidate_role
            ]);
            }

            $status = 'Imported Successfully';
            return back()->with(['status' => $status]);
        
        }

    public function viewData(Request $request){

        $candidate_ids = DB::table('candidates')->pluck('id');

        foreach($candidate_ids as $key => $candidate_id){
            $data[$key]['candidate_name'] = DB::table('candidates')->where('id', $candidate_id)->value('name');
            $data[$key]['candidate_role'] = DB::table('candidates')->where('id', $candidate_id)->value('role');
            $data[$key]['candidate_job'] = DB::table('jobs')->where('Role_number', $data[$key]['candidate_role'])->value('Role');
            $data[$key]['candidate_skills'] = DB::table('skills')->where('skill_role', $data[$key]['candidate_job'])->pluck('skill_name');
        }
        // if( count($candidate_ids > 0)){
        //     return view('view')
        //     ->with('data', $data);
        // }
        $count = count($candidate_ids);
        if ($count > 0){
            return view('view')
            ->with('data', $data);
        }else{
            $data = [];
            
            return view('view')
            ->with('data', $data);
        }
    }


    }
