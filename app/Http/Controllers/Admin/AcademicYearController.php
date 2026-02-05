<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicYear;

// app/Http/Controllers/Admin/AcademicYearController.php

class AcademicYearController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $query = AcademicYear::latest();
            return datatables()->of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex justify-content-end">
                            <a href="' . route('academic.year.edit', $row->id) . '"
                            class="btn-action btn-edit-soft"
                            title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="' . route('academic.year.destroy', $row->id) . '"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm(\'Delete this academic year?\')">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit"
                                        class="btn-action btn-delete-soft"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>';
                })
                ->rawColumns(['action', 'DT_RowIndex'])
                ->make(true);
        }
        return view('academic-year.index');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        AcademicYear::create($request->all());
        return redirect()->route('academic.year.index')->with('success','Academic Year Added');
    }

    public function setActive($id) {
        AcademicYear::query()->update(['is_active'=>0]);
        AcademicYear::where('id',$id)->update(['is_active'=>1]);
        return back();
    }

    public function edit($id)
    {
        $year = AcademicYear::findOrFail($id);
        return view('academic-year.edit', compact('year'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $year = AcademicYear::findOrFail($id);
        $year->update($request->all());
        return redirect()->route('academic.year.index')->with('success','Academic Year Updated');
    }

    public function destroy($id)
    {
        AcademicYear::findOrFail($id)->delete();
        return redirect()->route('academic.year.index')->with('success','Academic Year Deleted');
    }

}
