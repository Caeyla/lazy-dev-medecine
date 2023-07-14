<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Laptop;

class AdminCrudController extends Controller
{
    function getInstance($model)
    {
        $modelName = 'App\Models\\' . $model;
        $instance=app()->make($modelName);
        return $instance;
    }

    function insert(Request $request){
        $instance=$this->getInstance($request['model']);
        foreach ($instance->createModeling->fields as $fillable) {
            if(in_array($fillable,$instance->createModeling->img)){
                $instance[$fillable]=handleImageInsert($fillable);
            }else{
                $instance[$fillable]=$request[$fillable];
            }
        }
        $instance->save();
        return back();
    }

    function handleImageInsert($field)
    {
        $imageData = file_get_contents($_FILES[$fillable]['tmp_name']);
        $base64Image = base64_encode($imageData);
        return $base64Image;
    }

    function initInsertForm($model){
        $instance=$this->getInstance($model);
        $modeling=$instance->createModeling;
        return view('genericForm',['model'=>$model,'modeling'=>$modeling]);
    }

    function initUpdateForm($model,$id){
        $instance=$this->getInstance($model);
        $instance=$instance->find($id);
        return view('genericUpdtForm',['model'=>$model,'instance'=>$instance]);
    }

    function initList($model,Request $request){
        $instance=$this->getInstance($model);
        $query = $instance->newQuery();
        $perPage=5;
        $modeling=$instance->listModeling;
        $data=$this->buildFilter($query,$modeling,$request)->paginate($perPage);

        $data->appends($request->all());

        return view('genericList',[ 'data'=>$data,'modeling'=>$modeling,'model'=>$model]);
    }

    function edit($model,$id,Request $request){
        $instance=$this->getInstance($model);
        $instance=$instance->find($id);
        foreach ($instance->createModeling->fields as $fillable) {
            if($request[$fillable]==null || $request[$fillable]==''){
                continue;
            }
            $instance[$fillable]=$request[$fillable];
        }
        $instance->update();
        return back();
    }

    function delete($model,$id){
        $instance=$this->getInstance($model);
        $instance=$instance->find($id);
        $instance->delete();
        return back();
    }

    function buildFilter($query,$modeling,Request $request){
        $searchable=$modeling->searchable;
        $select=$modeling->select;
        $between=$modeling->between;
        $data=[];
        $query->whereRaw("1=1");
        foreach ($searchable as $search) {
            if($request[$search]==null || $request[$search]==''){
                continue;
            }
            if(in_array($search,$select)){
                $query->where($search,$request[$search]);
            }
            else if(in_array($search,$between)){
                $query->whereBetween($search,$request['min_'.$search],$request['max_'.$search]);
            }
            else{
                $query->where($search,'like','%'.$request[$search].'%');
            }
        }
        return $query;
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('import_file')) {
            $file = $request->file('import_file');

            // Validate the file
            $validated = $request->validate([
                'import_file' => 'required|mimes:csv,txt|max:2048', // Adjust the validation rules as needed
            ]);

            // Move the uploaded file to a desired location
            $destinationPath = storage_path('app/uploads'); // Define the destination path
            $fileName = $file->getClientOriginalName(); // Get the original file name
            $file->move($destinationPath, $fileName);

            // Process or import the file data here

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        // If no file was uploaded, redirect with an error message
        return redirect()->back()->with('error', 'No file was uploaded.');
    }

}
