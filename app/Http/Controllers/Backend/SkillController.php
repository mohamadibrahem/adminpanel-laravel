<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Skill;
use Lang;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if (!Gate::allows('skill_access')) {
            return abort(401);
        }
		if (request('show_deleted') == 1) {
            if (! Gate::allows('skill_delete')) {
                return abort(401);
            }
            $skills = Skill::onlyTrashed()->get();
        } else {
			$skills=Skill::all();
		}
       return view('backend.skills.index',['skills'=>$skills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if (!Gate::allows('skill_create')) {
            return abort(401);
        }
		return view('backend.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if (! Gate::allows('skill_create')) {
            return abort(401);
        }
		
        $this->validate(request(),[
	        'title_en'=>'',
	        'title_ar'=>'required', 
	        'percent'=>'required', 
	    ]);
		
		$store=new Skill;
        $store->title_en = request('title_en');
        $store->title_ar = request('title_ar');
        $store->percent = request('percent');
        $store->save();
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
		if (! Gate::allows('skill_view')) {
            return abort(401);
        }
		$skill=Skill::findOrFail($id);
        return view('backend.skills.show',['skill'=>$skill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if (! Gate::allows('skill_edit')) {
            return abort(401);
        }
        $skill=Skill::findOrFail($id);
		return view('backend.skills.edit',['skill'=>$skill]);

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
		if (! Gate::allows('skill_edit')) {
            return abort(401);
        }
		$update=Skill::findOrFail($id);
        $update->update($request->all());
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
		if (! Gate::allows('skill_delete')) {
            return abort(401);
        }
        $skill=Skill::findOrFail($id);
        $skill->delete();
		return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.destroy'));
    }
	
	
		    /**
     * Delete all selected Skill at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('skill_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $skills = Skill::whereIn('id', $request->input('ids'))->get();
            foreach ($skills as $skill) {
                $skill->delete();
            }
        }
    }
    /**
     * Restore Skill from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('skill_delete')) {
            return abort(401);
        }
        $skill = Skill::onlyTrashed()->findOrFail($id);
        $skill->restore();
        return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.restore'));
	}
    /**
     * Permanently delete Skill from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('skill_delete')) {
            return abort(401);
        }
        $skill = Skill::onlyTrashed()->findOrFail($id);
        $skill->forceDelete();
        return redirect()->back()->with('message', Lang::get('quickadmin.controller.fields.delete'));
    }
}
