<?php

namespace App\Http\Controllers;

use App\Mail\userMail;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function home()
    {
        $users = User::get();
        return view('home', compact('users'));
    }

    public function refined()
    {
        return view('refined');
    }

    public function dummy()
    {
        return view('dummy');
    }
    public function add()
    {
        return view('add');
    }

    public function save(Request $request)
    {

        $name       = $request['name'];
        $email      = $request['email'];
        $mobile     = $request['mobile'];
        $password   = $request['password'];

        $users         = User::create([
            'name'     => $name,
            'email'    => $email,
            'mobile'   => $mobile,
            'password' => bcrypt($password),

        ]);
        // Mail::to($users->email)->send(new userMail($users));
        return redirect()->route('home');
    }

    public function export()
    {
        $users = User::all();

        return (new FastExcel($users))->download('user.xlsx', function ($users) {
            return [

                'Name'  => $users->name,
                'Email' => $users->email,

            ];
        });
    }

    public function pdf_export()
    {
        $users = User::get();
        $pdf   = Pdf::loadView('pdf.invoice', ['users' => $users]);
        return $pdf->download('invoice.pdf');
    }
    public function import()
    {
        return view('import');
    }

    public function do_import(Request $request)
    {
        $users = (new FastExcel)->import($request['file'], function ($line) {
            return User::firstOrcreate([
                'name'       => $line['name'],
                'email'      => $line['email'],
                'mobile'     => $line['mobile'],
                'password'   => $line['password'],
            ]);
        });

        return redirect()->route('home');
    }

    public function add1()
    {
        return view('add1');
    }

    public function save1(Request $request)
    {
        $name    = $request['name'];
        $email   = $request['email'];

        Student::create([
            'name'  => $name,
            'email' => $email,

        ]);
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $edit_details = User::find($id);
        return response()->json([
            'status' => '200',
            'result' => $edit_details,

        ]);
    }

    public function update(Request $request)
    {
        $id        = $request['id'];
        $name      = $request['ename'];
        $email     = $request['eemail'];
        $mobile    = $request['emobile'];
        $password  = $request['epassword'];

        User::where('id', $id)->update([
            'name'     => $name,
            'email'    => $email,
            'mobile'   => $mobile,
            'password' => $password,

        ]);
        return redirect()->route('home');
    }

    public function delete(Request $request)

    {
        $id = $request['id'];

        User::where('id', $id)->delete();

        return redirect()->route('home');
    }

    
}
