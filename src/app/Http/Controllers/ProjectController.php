<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @var object
     */
    private Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function index($id)
    {
        $projects = $this->company->projects($id);

        return view('projects.index', compact('projects', 'id'));
    }

    public function create($id)
    {
        return view('projects.create', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required',
            'type' => 'required'
        ]);
        
        $id = $request->post('company_id');

        Project::create($request->post());

        return redirect()->route('projects.index', $id)->with('success','Company has been created successfully.');
    }

    public function edit($projectId, $id)
    {
        $project = Project::where('id', $projectId)->first();

        return view('projects.edit', compact('project', 'id'));
    }

    public function update(Request $request, $projectId, $id)
    {

        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        Project::where('id', $projectId)->update([
            'name' => $request->post('name'),
            'type' => $request->post('type')
        ]);

        return redirect()->route('projects.index', $id)->with('success','The project has Been updated successfully');
    }

    public function destroy($projectId, $id)
    {
        Project::where('id', $projectId)->delete();

        return redirect()->route('projects.index', $id)->with('success','The project has been deleted successfully');
    }
}
