<?php

namespace App\Controllers;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        
    }
    public function index()
    {
        $studentmodel = new StudentModel();
        $data['student'] = $studentmodel->findAll();
        return view('student/view_student',$data);
    }
    public function create()
    {
        return view('student/add_student');
    }
    public function add_record()
    {
        $rules= [
            'name'=>'required',
            'email'=>'required|is_unique[student.email,id]',
            'phone'=>'required|is_unique[student.phone,id]|max_length[10]|numeric|min_length[10]',
            'image'=> 'uploaded[image]|mime_in[image, image/png, image/jpg, image/jpeg]',
        ];
        
        if ($this->validate($rules))
        {
            $studentmodel = new StudentModel();
            $file = $this->request->getFile('image');
            if ($file->isValid() && ! $file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('public/upload/', $imageName);
                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'image' => $imageName,
                    // 'status' => $this->request->getPost('status')
                ];
                
                $studentmodel->insert($data);
                return redirect('student')->with('status_icon','success')->with('status','Record Add Succesfully');
            };

        }else
        {
            $data['validation']= $this->validator;
            return view('student/add_student',$data);

        }
        
    }
    public function delete($id)
    {
        $studentmodel = new StudentModel();
        $row= $studentmodel->find($id);
        unlink('public/upload/'.$row['image']);
        $studentmodel-> delete($id);
        return redirect('student')->with('status_icon','success')->with('status','Record Delete Succesfully');

    }
    public function edit($id)
    {
        $studentmodel =new StudentModel();
        $data['studentmodel']= $studentmodel->find($id);
        return view('student/edit',$data);
    }
    public function update($id)
    {
        $studentmodel =new StudentModel();
        $rules= [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|max_length[10]|numeric|min_length[10]',
            'image'=> 'uploaded[image]|ext_in[image,png,jpg,gif]',
        ];
        
        if ($this->validate($rules))
        {
            $studentmodel = new StudentModel();
            $file = $this->request->getFile('image');
            if ($file->isValid() && ! $file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('public/upload/', $imageName);
                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'image' => $imageName,
                    'status' => $this->request->getPost('status')
                ];
                
                $studentmodel->update($id, $data);
                return redirect('student')->with('status_icon','success')->with('status','Record Edit Succesfully');
            };

        }else
        {
            $data['validation']= $this->validator;
            return view('student/edit',$data);

        }

  
    }

}

?>