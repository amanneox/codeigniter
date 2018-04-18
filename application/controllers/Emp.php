<?php
header('Access-Control-Allow-Origin: *');
class Emp extends CI_Controller {
  function __construct() {
parent::__construct();
$this->load->library('pagination');
 $this->load->helper(array('form', 'url'));
 $this->load->helper('file');
 $this->load->library('Csvimport');
}

        public function index()
        {
          $this->load->library('pagination');
           $this->load->helper(array('form', 'url'));

          $this->load->model("show_model");
          $limit=$this->input->post('limit');
          if (isset($limit)) {
              $limit_per_page= $this->input->post('limit');
          }
          else {
            $limit_per_page = 10;
           }

                 $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                 $total_records = $this->show_model->get_total();
                 if ($total_records > 0)
                 {
                     $data["leads"] = $this->show_model->get_current_page_records($limit_per_page, $start_index);
                     $data['limit']=$limit_per_page;
                     $config['base_url'] = base_url() . 'Emp/index';
                     $config['total_rows'] = $total_records;
                     $config['per_page'] = $limit_per_page;
                     $config["uri_segment"] = 3;
                     $config['num_links'] = 2;
                                $config['use_page_numbers'] = TRUE;
                                $config['reuse_query_string'] = TRUE;

                                $config['full_tag_open'] = '<div class="pagination">';
                                $config['full_tag_close'] = '</div>';

                                $config['first_link'] = 'First Page';
                                $config['first_tag_open'] = '<span class="firstlink">';
                                $config['first_tag_close'] = '</span>';

                                $config['last_link'] = 'Last Page';
                                $config['last_tag_open'] = '<span class="lastlink">';
                                $config['last_tag_close'] = '</span>';

                                $config['next_link'] = 'Next Page';
                                $config['next_tag_open'] = '<span class="nextlink">';
                                $config['next_tag_close'] = '</span>';

                                $config['prev_link'] = 'Prev Page';
                                $config['prev_tag_open'] = '<span class="prevlink">';
                                $config['prev_tag_close'] = '</span>';

                                $config['cur_tag_open'] = '<span class="curlink">';
                                $config['cur_tag_close'] = '</span>';

                                $config['num_tag_open'] = '<span class="numlink">';
                                $config['num_tag_close'] = '</span>';
                     $this->pagination->initialize($config);

                     // build paging links
                     $data["links"] = $this->pagination->create_links();
                 }

                $this->load->view('employee',$data,$limit_per_page,array('error' => ' ' ));
        }
        public function Export()
        {
          header('Content-Type: text/csv');
          header('Content-Disposition: attachment; filename="export_dump.csv"');

        $output = fopen("php://output", "w");
       fputcsv($output, array('S_No', 'Lead Owner', 'Saletancy ID', 'Company', 'First Name', 'Last Name', 'Title', 'Email', 'Phone', 'Direct Phone', 'Mobile', 'Website', 'Industry', 'Sub Industry', 'Lead Source', 'Lead Status', 'Description', 'Revenue range', 'Employee range', 'Address', 'City', 'State', 'Pincode', 'Country', 'Skype ID', 'Secondry', 'LinkedIn ID', 'Notes'));
        $this->load->model("csv_model");
        $result=$this->csv_model->get_data();
        foreach ($result as $row) {
           fputcsv($output, $row);
        }
        fclose($output);




   }

        public function do_upload()
      {

               $this->load->model("csv_model");
               $data['error'] = '';

               $config['upload_path'] = APPPATH;
               $config['allowed_types'] = 'csv';
               $config['max_size'] = '1000';

               $this->load->library('upload', $config);


               // If upload failed, display error
               if (!$this->upload->do_upload('file')) {
                   $data['error'] = $this->upload->display_errors();
                      echo $data['error'];
                $this->load->view('home', $data);
               } else {
                   $file_data = $this->upload->data();
                   $file_path =  APPPATH.$file_data['file_name'];
			$u_id=$_SESSION['logged_in']['u_id'];
                   if ($this->csvimport->get_array($file_path)) {
                       $csv_array = $this->csvimport->get_array($file_path);
                       foreach ($csv_array as $row) {
                           $insert_data = array(
                               'leadowner'=>$row['Lead Owner'],
                               'leadownerid'=>$row['Saletancy ID'],
                               'company'=>$row['Company'],
                               'firstname'=>$row['First Name'],
                               'lastname'=>$row['Last Name'],
                               'title'=>$row['Title'],
                               'email'=>$row['Email'],
                               'phone'=>$row['Phone'],
                               'directphone'=>$row['Direct Phone'],
                               'mobile'=>$row['Mobile'],
                               'website'=>$row['Website'],
                               'industry'=>$row['Industry'],
                               'subindustry'=>$row['Sub Industry'],
                               'leadsource'=>$row['Lead Source'],
                               'leadstatus'=>$row['Lead Status'],
                               'desc'=>$row['Description'],
                               'revrange'=>$row['Revenue range'],
                               'emprange'=>$row['Employee range'],
                               'address'=>$row['Address'],
                               'city'=>$row['City'],
                               'state'=>$row['State'],
                               'pincode'=>$row['Pincode'],
                               'country'=>$row['Country'],
                               'skypeid'=>$row['Skype ID'],
                               'secondry'=>$row['Secondry'],
                               'linkedinid'=>$row['LinkedIn ID'],
                               'notes'=>$row['Notes'],
			       'u_id'=>$u_id,
                           );
                           $this->csv_model->insert_csv($insert_data);
                       }
                    //   $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                      // redirect(base_url().'csv');
                        redirect('home');
                       //echo "<pre>"; print_r($insert_data);
                   } else
                    echo   $data['error'] = "Error occured";
                       $this->load->view('home', $data);
                    //   $this->load->view('csvindex', $data);
                   }

      }

        }

 ?>
