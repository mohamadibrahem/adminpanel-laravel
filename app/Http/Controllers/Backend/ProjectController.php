<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Project;
use Lang;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if (!Gate::allows('project_access')) {
            return abort(401);
        }
		if (request('show_deleted') == 1) {
            if (! Gate::allows('project_delete')) {
                return abort(401);
            }
            $projects = Project::onlyTrashed()->get();
        } else {
			$projects=Project::all();
		}
       return view('backend.projects.index',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if (!Gate::allows('project_create')) {
            return abort(401);
        }
		return view('backend.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if (! Gate::allows('project_create')) {
            return abort(401);
        }
        $this->validate(request(),[
	        'title_en'=>'',
	        'description_en'=>'', 
	        'title_ar'=>'required', 
	        'description_ar'=>'required', 
	        'link'=>'required', 
			'main_image'=>'required|image|mimes:jpg,jpeg,gif,png|max:80192',
	    ]);
		
		$image_name=time().'.'.$request->main_image->getClientOriginalExtension();
		$store=new Project;
        $store->title_en = request('title_en');
        $store->title_ar = request('title_ar');
        $store->description_ar = request('description_ar');
        $store->description_en = request('description_en');
        $store->link = request('link');
		$store->main_image = $image_name;
        $store->save();
		$request->main_image->move(public_path('../images/projects'),$image_name);
        return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		if (! Gate::allows('project_view')) {
            return abort(401);
        }
		$project=Project::findOrFail($id);
        return view('backend.projects.show',['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if (! Gate::allows('project_edit')) {
            return abort(401);
        }
        $project=Project::findOrFail($id);
		return view('backend.projects.edit',['project'=>$project]);

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
		if (! Gate::allows('project_edit')) {
            return abort(401);
        }
		$update=Project::findOrFail($id);
		if ($request->hasFile('main_image'))
            {
				if($update->main_image != "")
				{
					unlink(public_path('../images/projects/').$update->main_image);
				}
                $file = $request->file('main_image');
                $image_name=time().'.'.$request->main_image->getClientOriginalExtension();
                $update->main_image = $image_name;
                $file->move(public_path('../images/projects'),$image_name);
            }
		$update->title_en = $request['title_en'];
		$update->title_ar = $request['title_ar'];
		$update->description_ar = $request['description_ar'];
		$update->description_en = $request['description_en'];
		$update->link = $request['link'];
        return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        $project=Project::findOrFail($id);
		
        $project->delete();
        return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.destroy'));
    }
	
	
	    /**
     * Delete all selected Project at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $projects = Project::whereIn('id', $request->input('ids'))->get();
            foreach ($projects as $project) {
                $project->delete();
            }
        }
    }
    /**
     * Restore Project from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.restore'));
    }
    /**
     * Permanently delete Project from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('project_delete')) {
            return abort(401);
        }
        $project = Project::onlyTrashed()->findOrFail($id);
		if($project->main_image != "")
			{
				unlink(public_path('../images/projects/').$project->main_image);
			}
        $project->forceDelete();
        return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.delete'));
    }
}
