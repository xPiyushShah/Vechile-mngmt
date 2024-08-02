<?php

namespace App\Controllers;

use Config\Services;

class Home extends BaseController
{
    protected $db;
    protected $datatable;
    protected $datatables;
    protected $datatab;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->datatable = $this->db->table('bidi3');
        $this->datatables = $this->db->table('products');
        $this->datatab = $this->db->table('trans');

        // Uncomment and use CORS if needed
        $this->cors = Services::response()
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
            ->setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization');

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit(0);
        }
    }

    public function index()
    {
        return view('index');
    }

    public function customer()
    {
        return view('customertb'); // custoemer table
    }
    public function custAdd()
    {
        return view('custform'); // addform of custromer
    }
    public function addData()
    {

        $data = $this->request->getVar();
        if ($this->datatable->insert($data)) {
            $response = ['status' => 'success', 'message' => 'Customer added successfully!'];
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to add customer.'];
        }
    
        
        return $this->response->setJSON($response);
    }

    public function getData()
    {
        $data = $this->datatable->get()->getResult();

        $tr = "";
        $id = 1;
        foreach ($data as $row) {
            $tr .= '<tr>
            <td>' . $id . '</td>
            <td>' . $row->name . ' </td>
            <td>' . $row->email . '</td>
            <td>' . $row->number . '</td>
            <td>
            <button class="editpenbtn" type="button" onclick="showModal(\'' . base_url() . 'edit/' . $row->id . '\', \'Edit Table\')">
                <i class="fa-regular fa-pen-to-square"></i>
            </button>
            </td>
        </tr>';
            $id++;
        }
        echo json_encode($tr);
    }
    public function edit($id)
    {
        $data['edit'] = $this->datatable->getwhere(['id' => $id])->getRow();
        echo view("custedit", $data);
    }
    public function update($id)
    {
        $data = $this->request->getVar();
        $result = $this->datatable->where('id', $id)->update($data);
        echo json_encode($result);
    }


    //vvechile 
    public function vechile()
    {
        return view('vechiletb');
    }
    public function vechiled()
    {
        return view('vechile');
    }
    public function vechSave()
    {
        $data = $this->request->getPost();
        $this->datatables->insert($data);

        if (empty($data)) 
        {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
            return;
        }

        $response = 10;

        echo json_encode($response);
    }
    
    public function vechgetData()
    {
        $data = $this->datatables->get()->getResult();

        $tr = "";
        $id = 1;
        foreach ($data as $row) {
            $tr .= '<tr>
            <td>' .$id . ' </td>
            <td>' . $row->series . ' </td>
            <td>' . $row->brand . '</td>
            <td>' . $row->price . '</td>
            <td>' . $row->status . '</td>
            <td>
            <button class="editpenbtn" type="button" onclick="showModal(\'' . base_url() . 'edits/' . $row->id . '\', \'Edit Table\')">
                <i class="fa-regular fa-pen-to-square"></i>
            </button>
            </td>
        </tr>';
            $id++;
        }
        echo json_encode($tr);

    }
    public function edits($id)
    {
        $data['edits'] = $this->datatables->getwhere(['id' => $id])->getRow();
        echo view("vechileedit", $data);
    }
    public function updates($id)
    {
        $data = $this->request->getVar();
        $result = $this->datatables->where('id', $id)->update($data);
        echo json_encode($result);
    }

    //purchase
    public function purchase(){
        return view('purchase');
    }
    public function purshow(){
        return view('purd');
    }
    public function pursave(){
       
        $data = $this->request->getPost();
        $this->datatab->insert($data);
        $response = 10;

        echo json_encode($response);
    }
    public function purData(){
        $data = $this->datatab->get()->getResult();

        $tr = "";
        $id = 1;
        foreach ($data as $row) {
            $tr .= '<tr>
            <td>' . $id . '</td>
            <td>' . $row->name . '</td>
            <td>' . $row->brand . ' </td>
            <td>' . $row->amount . '</td>
            <td>' . $row->amounts . '</td>
            <td>' . $row->status . '</td>
            <td>
            <button class="editpenbtn" type="button" onclick="showModal(\'' . base_url() . 'edited/' . $row->id . '\', \'Edit Table\')">
                <i class="fa-regular fa-pen-to-square"></i>
            </button>
            </td>
        </tr>';
            $id++;
        }
        echo json_encode($tr);
    }
    public function edited($id)
    {
        $data['edit'] = $this->datatab->getwhere(['id' => $id])->getRow();
        echo view("puredits", $data);
    }
    public function updated($id)
    {
        $data = $this->request->getVar();
        $result = $this->datatab->where('id', $id)->update($data);
        echo json_encode($result);
    }
    public function fetchData()
    {
        $vechId = $this->request->getVar('brand');
        $vechData = $this->datatables->getWhere(['brand' => $vechId])->getResult();
        
        if ($vechData) {
            $data = [];
    
            foreach ($vechData as $row) {
                $data[] = [
                    'amount' => $row->price,
                    'brand' => $row->brand
                ];
            }
    
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        } else {
            $response = ['status' => 'error', 'message' => 'No data found.'];
        }
        return $this->response->setJSON($response);
    }   
}
