<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Student1 extends CI_Controller {


    private $perPage = 0;
    

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index()
    {
        $id = 5;
       // $this->load_groups($id);
        $this->load->database();
        $this->load->model('MyModel');
      //  $this->enter_group(6);


        $group_id = 6;




        $pageNo = $this->input->get("page");

        if(!empty($pageNo)){
          /*  echo "<script type='text/javascript'>alert('submitted successfully!')</script>";*/
           /* echo "<script type='text/javascript'>alert(page)</script>";*/
            $data = $this->MyModel->getAssignments($group_id,$pageNo);
            $result = $this->load->view('data4', $data);
            echo json_encode($result);

        }

        else{

            $this->load->view('studentPage');
            $data['posts'] = $this->MyModel->getAssignments($group_id,0);
            $this->load->view('myPost1', $data);

        }
        







        //   $this->load->database();
        //$count = $this->db->get_where('student_group', array('id' => $id), $limit, $offset)->num_rows();
      //  $count = $this->db->get('posts')->num_rows();
      //  $count = $this->db->get('student_group')->num_rows();
       // echo $count;



	//	$this->load->view('studentPage');
      //  $pageNo = $this->input->get("page");
       /* if(!empty($pageNo)){*/


        //    $start = ceil($this->input->get("page") * $this->perPage);
         // $query = $this->db->limit($start, $this->perPage)->get("student_group");
          /*  $query = $this->db->get_where('student_group', array('user_id' => $id), $this->perPage, $start);
            $data['posts'] = $query->result();
            $result = $this->load->view('data1', $data);
            echo json_encode($result);*/


       /* }else{
            $query = $this->db->limit(5, $this->perPage)->get("posts");
            $data['posts'] = $query->result();
            $this->load->view('myPost', $data);
        }*/
    }

    function load_groups($user_id){
        $this->load->model('MyModel');
        $this->load->view('studentPage');
        //$data['groups'] = $this->MyModel->getClasses($user_id);
        $data = $this->MyModel->getClasses($user_id);
        $this->load->view('view_classes',$data);
    }

    function enter_group($group_id){
        /*echo $user_id." ".$group_id;
        $this->load->view('studentPage');
        echo "entered";*/







        $pageNo = $this->input->get("page");
        if(!empty($pageNo)){
            echo "<script> alert(page);</script>";
            $data = $this->MyModel->getAssignments($group_id,$pageNo);
            $result = $this->load->view('data4', $data);
            echo json_encode($result);

        }

        else{
            $this->load->view('studentPage');
            $data['posts'] = $this->MyModel->getAssignments($group_id,0);
            $this->load->view('myPost1', $data);

        }
    }


}