<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Http\Requests\UserImportRequest;
use App\Imports\UsersImport;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('users')->with(['users' => User::get()]);
        } catch (\Exception $e) {
            report($e);
            return back()->with('error', 'An error occurred while fetching users.');
        }
    }


    /**
     * Download an Excel file containing all users.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        try {
            return Excel::download(new UsersExport, 'users.xlsx');
        } catch (\Exception $e) {
            report($e);
            return back()->with('error', 'An error occurred while exporting users.');
        }
    }

    /**
     * Handle an incoming request to import users from an Excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(UserImportRequest $request)
    {
        try {
            Excel::import(new UsersImport, $request->file('file'));
            return back()->with('success', 'Users imported successfully.');
        } catch (\Exception $e) {
            report($e);
            return back()->with('error', 'An error occurred while importing users.');
        }
    }
}
