<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Pm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pm_model', 'model');
        if ($this->session->userdata('masuk') != TRUE) {
            echo $this->session->set_flashdata('msg', 'Anda Harus Login Terlebih Dahulu !');
            redirect('Auth', 'refresh');
        }
    }

    public function index()
    {
        $title = 'Home';
        $data = array(
            'title' => $title,
            'project' => $this->model->getAll()
        );

        $this->template->load('layout/template_v', 'pm/dashboard_v', $data);
    }

    public function delete()
    {
        $id = $this->input->post('ID_project');
        $this->model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        }
        redirect('Home/pm', 'refresh');
    }

    public function tambahDataProject()
    {
        $config['upload_path'] = './assets/images/project/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/project/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/project/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar             = $gbr['file_name'];

                $idprojct           = strip_tags($this->input->post('ID_project'));
                $nama               = strip_tags($this->input->post('nama'));
                $alamat             = strip_tags($this->input->post('alamat'));
                $deskripsi          = strip_tags($this->input->post('deskripsi'));
                $foto               = $gambar;
                $jmlUnit            = strip_tags($this->input->post('jumlah_unit'));
                $unitKosong         = strip_tags($this->input->post('unit_kosong'));
                $unitIsi            = strip_tags($this->input->post('unit_isi'));
                $idCKP              = strip_tags($this->input->post('ID_catatan_keuangan_project'));
                $data = array(
                    'ID_project'    => $idprojct,
                    'nama'          => $nama,
                    'alamat'        => $alamat,
                    'deskripsi'     => $deskripsi,
                    'foto'          => $foto,
                    'jumlah_unit'   => $jmlUnit,
                    'unit_kosong'   => $unitKosong,
                    'unit_isi'     => $unitIsi,
                    'ID_catatan_keuangan_project' => $idCKP
                );
                $this->form_validation->set_rules('ID_project', 'ID_project', 'required');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
                $this->model->tambahDataProject($data, 'project');
                redirect('Home/pm');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>');
            redirect('Pm', 'refresh');
        }
    }


    public function edit($id)
    {
        $where = array('ID_project' => $id);
        $title = 'Edit Project';
        $data = array(
            'title' => $title,
            'project' => $this->model->edit_data($where, 'project')->result()
        );

        $this->template->load('layout/template_v', 'pm/edit_v', $data);
    }
    public function update()
    {
        $data['project'] = $this->model->getAll();


        $idProject = $this->input->post('ID_project');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $deskripsi = $this->input->post('deskripsi');
        $jmlUnit = $this->input->post('jumlah_unit');
        $unitkosong = $this->input->post('unit_kosong');
        $unitIsi = $this->input->post('unit_isi');
        $foto_lama = $this->input->post('foto_lama');


        // cek jika ada gambar
        $upload_foto = $_FILES['foto']['name'];

        if ($upload_foto) {
            $config['upload_path'] = './assets/images/project/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {

                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/project/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './assets/images/project/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    unlink('assets/images/project/' . $foto_lama);
                    $gambarBaru       = $gbr['file_name'];
                    $this->db->set('foto', $gambarBaru);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gambar Gagal upload</div>');
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hanya tambahkan file gambar</div>');
        }
        $this->db->set('unit_isi', $unitIsi);
        $this->db->set('unit_kosong', $unitkosong);
        $this->db->set('jumlah_unit', $jmlUnit);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('alamat', $alamat);
        $this->db->set('nama', $nama);
        $this->db->where('ID_project', $idProject);
        $this->db->update('project');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
        redirect('Pm', 'refresh');
    }
    public function search()
    {
        $title = 'Home';
        $keywoard = $this->input->post('keywoard');
        $data = array(
            'title' => $title,
            'project' => $this->model->get_keywoard($keywoard)
        );

        $this->template->load('layout/template_v', 'pm/dashboard_v', $data);
    }
}
