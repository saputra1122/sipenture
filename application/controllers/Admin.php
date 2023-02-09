<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models','m');
		$this->load->helper('tgl_indo');
		if($this->session->userdata('status_login') != "login"){
			redirect(base_url("auth"));
		}
	}
	public function index()
	{
		$this->sidebar();
		$data = array(
			'dashboard' => "active",
		);

		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$data['penjualan'] = $this->m->Get_All('tbl_dt_penjualan', $select);
		$data['pembelian'] = $this->m->Get_All('tbl_dt_pembelian', $select);
		$data['kategori'] = $this->m->Get_All('tbl_kategori', $select);
		$data['produk'] = $this->m->Get_All('tbl_produk', $select);

		$data['jml_ktg'] =  $this->m->total_ktg();
		$data['jml_produk'] =  $this->m->total_produk();
		$data['jml_penjualan'] =  $this->m->total_penjualan();
		$data['jml_pembelian'] =  $this->m->total_pembelian();
		$this->load->view('admin/index', $data);
	}
	public function sidebar()
	{
		$data = array(
			'dashboard' 		=> "",
			'owner' 			=> "",
			'customer' 			=> "",
			'supplier' 			=> "",
			'produk' 			=> "",
			'kategori' 			=> "",
			'penjualan' 		=> "",
			'pembelian' 		=> "",
			'laporan_penjualan_owner' 		=> "",
			'laporan_penjualan' => "",
			'laporan_pembelian' => "",
			'laporan_all_supplier' => "",
			'laporan_per_supplier' => "",
			'laporan_piutang' => "",
			'master' 			=> "close",
			'transaksi' 		=> "close",
			'laporan' 			=> "close",
		);
		$this->session->set_userdata($data);
	}
	public function invoice()
	{

		$this->load->view('admin/invoice');
	}

	//CUSTOMER
	public function customer()
	{
		$this->sidebar();
		$data = array(
			'master' => "open",
			'customer' => "active",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('tbl_customer',$select);
		$this->load->view('admin/customer',$data);

	}
	public function customer_add()
	{
		$no_hp = trim($no_hp);
    //bersihkan dari karakter yang tidak perlu
     $no_hp = strip_tags($no_hp);     
    // Berishkan dari spasi
    $no_hp= str_replace(" ","",$no_hp);
    // bersihkan dari bentuk seperti  (022) 66677788
     $no_hp= str_replace("(","",$no_hp);
    // bersihkan dari format yang ada titik seperti 0811.222.333.4
     $no_hp= str_replace(".","",$no_hp); 

     //cek apakah mengandung karakter + dan 0-9
     if(!preg_match('/[^+0-9]/',trim($no_hp))){
         // cek apakah no hp karakter 1-3 adalah +62
         if(substr(trim($no_hp), 0, 3)=='+62'){
             $no_hp= trim($no_hp);
         }
         // cek apakah no hp karakter 1 adalah 0
        elseif(substr($no_hp, 0, 1)=='0'){
             $no_hp= '+62'.substr($no_hp, 1);
         }
     }

		$data=array(
			'nama_cust' => $this->input->post('nama_cust'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat_cust' => $this->input->post('alamat_cust'),
			);
			
			$this->m->Save($data,'tbl_customer');
			
			redirect ('Admin/customer');
	}
	public function customer_update()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);

		$data=array(
			'nama_cust' => $this->input->post('nama_cust'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat_cust' => $this->input->post('alamat_cust'),
			);
			
			$this->m->Update($where, $data,'tbl_customer');
			
			redirect ('Admin/customer');
	}
	public function customer_delete()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);
			
			$this->m->Delete($where,'tbl_customer');
			
			redirect('Admin/customer');
	}

	

	//SUPPLIER
	public function supplier()
	{
		$this->sidebar();
		$data = array(
			'master' => "open",
			'supplier' => "active",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('tbl_supplier',$select);
		$this->load->view('admin/supplier',$data);

	}
	public function supplier_add()
	{
		$data=array(
			'nama_supplier' => $this->input->post('nama_supplier'),
			'no_hp_supplier' => $this->input->post('no_hp_supplier'),
			'alamat_supplier' => $this->input->post('alamat_supplier'),
			);
			
			$this->m->Save($data,'tbl_supplier');
			
			redirect ('Admin/supplier');
	}
	public function supplier_update()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);

		$data=array(
			'nama_supplier' => $this->input->post('nama_supplier'),
			'no_hp_supplier' => $this->input->post('no_hp_supplier'),
			'alamat_supplier' => $this->input->post('alamat_supplier'),
			);
			
			$this->m->Update($where, $data,'tbl_supplier');
			
			redirect ('Admin/supplier');
	}
	public function supplier_delete()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);
			
			$this->m->Delete($where,'tbl_supplier');
			
			redirect('Admin/supplier');
	}

	// OWNER
	public function owner()
	{
		$this->sidebar();
		$data = array(
			'master' => "open",
			'owner' => "active",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('tbl_owner',$select);
		$this->load->view('admin/owner',$data);

	}
	public function owner_add()
	{
		$data=array(
			'nama_owner' => $this->input->post('nama_owner'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat')
			);
			
			$this->m->Save($data,'tbl_owner');
			
			redirect ('Admin/owner');
	}
	public function owner_update()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);
		$data=array(
			'nama_owner' => $this->input->post('nama_owner'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat')
			);
			
			$this->m->Update($where, $data, 'tbl_owner');
			
			redirect ('Admin/owner');
	}
	public function owner_delete()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);
			
			$this->m->Delete($where,'tbl_owner');
			
			redirect('Admin/owner');
	}

	public function getProduk()
	{
		$where = array(
			'id' => $this->input->get('id')
		);
		$data['getProduk'] = $this->m->Get_Where($where,'tbl_produk');
		$this->load->view('admin/getProduk', $data);

	}
	public function getProduk2()
	{
		$where = array(
			'id' => $this->input->get('id')
		);
		$data['getProduk2'] = $this->m->Get_Where($where,'tbl_produk');
		$this->load->view('admin/getProduk2', $data);

	}

	// KATEGORI
	public function kategori()
	{
		$this->sidebar();
		$data = array(
			'master' => "open",
			'kategori' => "active",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('tbl_kategori',$select);
		$this->load->view('admin/kategori',$data);

	}
	public function kategori_add()
	{
		$data=array(
			'nama_kategori' => $this->input->post('nama_kategori'),
			'merk' => $this->input->post('merk')
			);
			
			$this->m->Save($data,'tbl_kategori');
			
			redirect ('Admin/kategori');
	}
	public function kategori_update()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);
		$data=array(
			'nama_kategori' => $this->input->post('nama_kategori'),
			'merk' => $this->input->post('merk')
			);
			
			$this->m->Update($where, $data, 'tbl_kategori');
			
			redirect ('Admin/kategori');
	}
	public function kategori_delete()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);
			
			$this->m->Delete($where,'tbl_kategori');
			
			redirect('Admin/kategori');
	}
	
	//PRODUK
	public function produk()
	{
		$this->sidebar();
		$data = array(
			'master' => "open",
			'produk' => "active",
		);
		$this->session->set_userdata($data);
		$select = $this->db->join('tbl_kategori', 'tbl_kategori.id=tbl_produk.id_kategori');
		$select = $this->db->select('tbl_produk.id, tbl_produk.id_kategori, tbl_produk.nama_produk, tbl_kategori.merk, tbl_produk.kuantitas, tbl_produk.harga_beli, tbl_produk.harga_jual');

		$data['read']=$this->m->Get_All('tbl_produk',$select);

		$select = $this->db->select('*');
		$data['nama_kategori']=$this->m->Get_All('tbl_kategori',$select);

		$this->load->view('admin/produk',$data);
	}
	public function produk_add()
	{
		// $select = $this->db->select('*');
		// $select = $this->db->join('tbl_kategori', 'tbl_kategori.id=tbl_produk.id_produk');

		$data=array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_produk' => $this->input->post('nama_produk'),
			'kuantitas' => $this->input->post('kuantitas'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual')
			);
			
			$this->m->Save($data,'tbl_produk');
			
			redirect ('Admin/produk');
	}

	public function produk_update()
	{
		// echo json_encode($this->input->post('id'));
		// die;
		$where=array(
			'id' => $this->input->post('id')
		);
		$data=array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_produk' => $this->input->post('nama_produk'),
			'kuantitas' => $this->input->post('kuantitas'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'update_date' => $this->input->post('update_date'),
			);
			
		$this->m->Update($where, $data,'tbl_produk');
			
		redirect ('Admin/produk');
	}

	public function produk_delete()
	{
		$where=array(
			'id' => $this->input->post('id'),
			);
			
			$this->m->Delete($where,'tbl_produk');
			
			redirect('Admin/produk');
	}

	//PEMBELIAN
	public function pembelian()
	{
		$this->sidebar();
		$data = array(
			'transaksi' => "open",
			'pembelian' => "active",
		);
		$this->session->set_userdata($data);

		$select = $this->db->select('*');
		$select = $this->db->join('tbl_dt_pembelian', 'tbl_dt_pembelian.id=tbl_ht_pembelian.id');

		$data['read'] = $this->m->Get_All('tbl_ht_pembelian', $select);

		$select = $this->db->select('*');
		$data['produk'] = $this->m->Get_All('tbl_produk', $select);

		$data['supplier'] = $this->m->Get_All('tbl_supplier', $select);
		$this->load->view('admin/pembelian', $data);

	}
	public function tambah_pembelian()
	{
		$data=array(
			'id_produk' => $this->input->post('id_produk'),
			'nama_produk' => $this->input->post('nama_produk'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'jumlah' => $this->input->post('jumlah'),
			'tanggal' => $this->input->post('tanggal'),

		);
		$this->m->Save($data,'tbl_pembelian');
		redirect('Admin/pembelian');
	}
	public function edit_pembelian()
	{
		$where=array(
		'id' => $this->input->post('id'),
		);

		$data=array(
		'id_produk' => $this->input->post('id_produk'),
		'nama_produk' => $this->input->post('nama_produk'),
		'harga_beli' => $this->input->post('harga_beli'),
		'harga_jual' => $this->input->post('harga_jual'),
		'jumlah' => $this->input->post('jumlah'),
		'tanggal' => $this->input->post('tanggal'),
		);
		
		$this->m->Update($where, $data, 'tbl_pembelian');
		
		redirect('Admin/pembelian');
	}
	public function hapus_pembelian()
	{
		$where=array(
		'id' => $this->input->post('id'),
		);
		
		$this->m->Delete($where,'tbl_pembelian');
		
		redirect('Admin/pembelian');
	}
	
	//PENJUALAN
	public function penjualan()
	{
		$this->sidebar();
		$data = array(
			'transaksi' => "open",
			'penjualan' => "active",
		);
		$this->session->set_userdata($data);
		$data['dari'] =date('Y-m-d');
		$data['sampai'] =date('Y-m-d');

		$select = $this->db->select('*, sum(harga_jual*kuantitas) as total_omset');
		$select = $this->db->join('tbl_dt_penjualan', 'tbl_dt_penjualan.id=tbl_ht_penjualan.id');
		if (isset($_POST['cari'])) {
			$data['dari'] =$_POST['dari'];
			$data['sampai'] =$_POST['sampai'];
			$date = date('Y-m-d', strtotime($data['sampai'] . "+1 days"));

			$select = $this->db->where('waktu >= "'.$data['dari'].'"');
			$select = $this->db->where('waktu <= "'.$date.'"');
		} else{
			$select = $this->db->where('waktu LIKE "'.date('Y-m-d').'%"');
		}

		$select = $this->db->group_by('tbl_ht_penjualan.id');
		$select = $this->db->order_by('waktu','DESC');
		$data['read']=$this->m->Get_All('tbl_ht_penjualan',$select);

		$select = $this->db->select('*');
		$data['customer']=$this->m->Get_All('tbl_customer',$select);

		$select = $this->db->select('*');
		$data['produk']=$this->m->Get_All('tbl_produk',$select);

		$data['total_bayar'] = 0;
		$data['total_piutang'] = 0;
		$data['total_omset'] = 0;
		foreach($data['read'] as $r){
			$data['total_bayar'] += $r->total_bayar;
			$data['total_omset'] += $r->total_omset;
		}
		$data['total_piutang'] = $data['total_omset'] -$data['total_bayar'];
		$this->load->view('admin/penjualan',$data);

	}

	function AddCart($id,$qty)
	{
		// $where = array(
		// 	'id' => $id
		// );
		$select = $this->db->select('*, tbl_produk.id as id_produk');
		$select = $this->db->where('tbl_produk.id', $id);
		$getProduk = $this->m->Get_All('tbl_produk', $select);
		foreach($getProduk as $d){}
		$data = array(
			'id'			=> $d->id_produk, 
			'name'			=> $d->nama_produk, 
			'qty' 			=> $qty, 
			'price' 		=> $d->harga_jual, 
			'harga_beli' 	=> $d->harga_beli, 
		);
		$this->cart->insert($data);
		$this->ShowCart();
	}

	function AddCartt($id, $qty)
	{
		$select = $this->db->select('*, tbl_produk.id as id_produk');
		$select = $this->db->where('tbl_produk.id', $id);
		$getprdk = $this->m->Get_All('tbl_produk', $select);
		foreach ($getprdk as $d) {
		}
		$data = array(
			'id'			=> $d->id_produk,
			'name'			=> $d->nama_produk,
			'qty' 			=> $qty,
			'price' 		=> $d->harga_jual,
			'harga_beli' 	=> $d->harga_beli,
		);
		$this->cart->insert($data);
		$this->ShowCartt();
	}

	function ShowCart(){ 
		$output = '';
		$no = 1;
		foreach ($this->cart->contents() as $items) {
			$output .= '
					<tr>
						<td class="text-center">' . $no++ . '.</td>
						<td>' . $items['name'] . '</td>
						<td>Rp<span class="float-right">' . number_format($items['price'], 0, ".", ".") . '</span></td>
						<td class="text-center">' . $items['qty'] . '</td>
						<td>Rp<span class="float-right">' . number_format(($items['qty'] * $items['price']), 0, ".", ".") . '</span></td>
						<td>
							<button type="button" 
							class="btn btn-sm btn-danger cancel-cart" 
							onclick="return batal(`' . $items['rowid'] . '`)">
								<i class="fa fa-times"></i>
							</button>
						</td>
					</tr>
					';
		}
		$output .= '
				<tr>
					<th colspan="4" class="text-center text-bold">Total</th>
					<th colspan="2" class="text-bold">Rp<span class="float-right">' . number_format($this->cart->total(), 0, ".", ".") . '</span></td>
				</tr>
		';

		echo $output;
	}

	function ShowCartt()
	{
		$output = '';
		$no = 1;
		$totba = 0;
		foreach ($this->cart->contents() as $items) {
			$totba += $items['qty'] * $items['harga_beli'];
			$output .= '
					<tr>
						<td class="text-center">' . $no++ . '.</td>
						<td>' . $items['name'] . '</td>
						<td>Rp<span class="float-right">' . number_format($items['harga_beli'], 0, ".", ".") . '</span></td>
						<td class="text-center">' . $items['qty'] . '</td>
						<td>Rp<span class="float-right">' . number_format(($items['qty'] * $items['harga_beli']), 0, ".", ".") . '</span></td>
						<td>
							<button type="button" 
							class="btn btn-sm btn-danger cancel-cart" 
							onclick="return batal(`' . $items['rowid'] . '`)">
								<i class="fa fa-times"></i>
							</button>
						</td>
					</tr>
					';
		}
		$output .= '
				<tr>
					<th colspan="4" class="text-center text-bold">Total</th>
					<th colspan="2" class="text-bold">Rp<span class="float-right">' . number_format($totba, 0, ".", ".") . '</span></td>
				</tr>
		';

		echo $output;
	}

	function DeleteCart($row_id)
	{ 
		$data = array(
			'rowid' => $row_id, 
			'qty' => 0, 
		);
		$this->cart->update($data);
		$this->ShowCart();
	}

	function DeleteCartt($row_id)
	{ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $row_id,
			'qty' => 0,
		);
		$this->cart->update($data);
		$this->ShowCartt();
	}

	public function SaveTransaksiPenjualan()
	{
		$id = date('YmdHis');
		$id_customer = $this->input->post('id_customer');

		$where = array(
			'id' => $id_customer,
		);
		$getCustomer = $this->m->Get_Where($where, 'tbl_customer');
		$total_bayar = $this->input->post('total_bayar');
		// if($id_customer == 1){
		// 	$total_bayar = $this->cart->total();
		// }
		foreach ($getCustomer as $gc) {
			$data = array(
				'id' 			=> $id,
				'id_customer' 	=> $id_customer,
				'nama_cust' 	=> $gc->nama_cust,
				'waktu' 		=> date('Y-m-d H:i:s'),
				'total_bayar' 	=> $total_bayar,
				'kasir' 		=> $this->session->userdata('nama'),
			);
			$this->m->Save($data, 'tbl_ht_penjualan');
		}

		foreach ($this->cart->contents() as $items) {
			$data = array(
				'id' 			=> $id,
				'id_produk' 	=> $items['id'],
				'nama_produk' 	=> $items['name'],
				'harga_beli' 	=> $items['harga_beli'],
				'harga_jual' 	=> $items['price'],
				'kuantitas' 	=> $items['qty'],
			);

			$this->m->save($data, 'tbl_dt_penjualan');
			//update stok produk
			$where = array(
				'id'			=> $items['id']
			);
			$getProduk = $this->m->Get_Where($where, 'tbl_produk');
			foreach($getProduk as $p){
				$data = array(
					'kuantitas'		=> ($p->kuantitas-$items['qty']),
				);
				$this->m->Update($where, $data, 'tbl_produk');
			}
		}

		$this->cart->destroy();	
	}

	public function DeleteTransaksiPenjualan()
	{
		$where = array(
			'id' => $this->input->post('id')
		);	
		$select = $this->db->select('*');
		$getProduk = $this->m->Get_Where($where, 'tbl_dt_penjualan');
		foreach($getProduk as $p){
			$where2 = array(
				'id' => $p->id_produk
			);
			$getProduk2 = $this->m->Get_Where($where2, 'tbl_produk');
			foreach($getProduk2 as $p2){}
			$data = array(
				'kuantitas'		=> $p->kuantitas+$p2->kuantitas,
			);
			$this->m->Update($where2, $data, 'tbl_produk');
		}
		$this->m->Delete($where, 'tbl_ht_penjualan');
		$this->m->Delete($where, 'tbl_dt_penjualan');
		redirect('admin/penjualan');
	}

	public function SaveTransaksiPembelian()
	{
		$id = date('YmdHis');
		$id_supplier = $this->input->post('id_supplier');
		$where = array(
			'id' => $id_supplier
		);
		$getSupplier = $this->m->Get_Where($where, 'tbl_supplier');

		$totba = 0;
		foreach ($this->cart->contents() as $items) {
			$totba += $items['qty'] * $items['harga_beli'];
		}
		foreach ($getSupplier as $su) {
			//$totba += $items['qty'] * $items['harga_beli'] ;
			$data = array(
				'id' 			=> $id,
				'id_supplier' 	=> $id_supplier,
				'nama_supplier' => $su->nama_supplier,
				'waktu'			=> date('Y-m-d H:i:s'),
				'total_bayar'	=> $totba,
			);
			$this->m->save($data, 'tbl_ht_pembelian');
		}
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'id' 			=> $id,
				'id_produk' 	=> $items['id'],
				'nama_produk' 	=> $items['name'],
				'harga_beli'	=> $items['harga_beli'],
				'harga_jual'	=> $items['price'],
				'kuantitas'		=> $items['qty'],
			);
			$this->m->save($data, 'tbl_dt_pembelian');
			//update stok produk
			$where = array(
				'id'			=> $items['id']
			);
			$getprdk = $this->m->Get_Where($where, 'tbl_produk');
			foreach ($getprdk as $p) {
				$data = array(
					'kuantitas' => ($p->kuantitas + $items['qty']),
				);
				$this->m->Update($where, $data, 'tbl_produk');
			}
		}
		$this->cart->destroy();
	}

	public function DeleteTransaksiPembelian()
	{
		$where = array(
			'id' => $this->input->post('id')
		);	
		$select = $this->db->select('*');
		$getProduk = $this->m->Get_Where($where, 'tbl_dt_pembelian');
		foreach($getProduk as $p){
			$where2 = array(
				'id' => $p->id_produk
			);
			$getProduk2 = $this->m->Get_Where($where2, 'tbl_produk');
			foreach($getProduk2 as $p2){}
			$data = array(
				'kuantitas'		=> $p->kuantitas+$p2->kuantitas,
			);
			$this->m->Update($where2, $data, 'tbl_produk');
		}
		$this->m->Delete($where, 'tbl_ht_pembelian');
		$this->m->Delete($where, 'tbl_dt_pembelian');
		redirect('admin/pembelian');
	}

	//PROFIL AKUN 
	function profil(){
		$this->sidebar();
		$data = array(
			'master' => "close",
			'transaksi' => "close",
			'laporan' => "close",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$data['profil']=$this->m->Get_All('tbl_user',$select);

		$data['jml_penjualan'] =  $this->m->total_penjualan();
		$data['jml_pembelian'] =  $this->m->total_pembelian();

		$this->load->view('admin/profil',$data);
	}

	function edit_profil() {
		$where = array(
			'id' =>	$this->input->post('id')
		);
		$this->form_validation->set_rules('nama', 'Nama', 'required|xss_clean||max_length[15]');
		$data=array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'akses' => $this->input->post('akses'),
		);

		$this->m->Update($where, $data, 'tbl_user');
		
		redirect('Admin/profil');
	}

	public function CetakFakturPenjualan($id){
		$where = array(
				'id' 			=> $id
		);
		$data['tbl_ht_penjualan'] = $this->m->Get_Where($where, 'tbl_ht_penjualan');
		$data['tbl_dt_penjualan'] = $this->m->Get_Where($where, 'tbl_dt_penjualan');
		$this->load->view('admin/cetakfakturpenjualan', $data);
	}

	public function CetakFakturPembelian($id){
		$where = array(
			'id' 			=> $id
		);
		$data['ht_pembelian'] = $this->m->Get_Where($where, 'tbl_ht_pembelian');
		$data['dt_pembelian'] = $this->m->Get_Where($where, 'tbl_dt_pembelian');
		$this->load->view('admin/cetakfakturpembelian', $data);
	}

	public function LaporanPenjualanRE(){
		$this->sidebar();
		$data = array(
			'laporan' => "open",
			'laporan_penjualan' => "active",
		);
		$this->session->set_userdata($data);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari']. ' + 1 months'));
		$this->load->view('admin/laporan-penjualan-re', $data);
	}

	public function CetakLaporanPenjualanRE()
	{	
		//$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$select = $this->db->join('tbl_dt_penjualan','tbl_ht_penjualan.id=tbl_dt_penjualan.id');
		$select = $this->db->where('waktu >= "'.$_GET['dari'].'"');
		$select = $this->db->where('waktu <= "'.$_GET['sampai'].'"');
		//$select = $this->db->where('id_customer');
		$data['read_penjualan'] = $this->m->Get_All('tbl_ht_penjualan',$select);
		$data['dari'] = $_GET['dari'];
		$data['sampai'] = $_GET['sampai'];
		$this->load->view('admin/laporan_penjualan_re', $data);
	}

	public function LaporanPenjualanOwner(){
		$this->sidebar();
		$data = array(
			'laporan' => "open",
			'laporan_penjualan_owner' => "active",
		);
		$this->session->set_userdata($data);
		$select = $this->db->select('*');
		$select = $this->db->where('id > '."1");
		$data['read_owner'] = $this->m->Get_All('tbl_owner',$select);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari']. ' + 1 months'));
		$this->load->view('admin/laporan-penjualan-owner', $data);
	}

	public function CetakLaporanPenjualanOwner()
	{
		$select = $this->db->select('*');
		$select = $this->db->join('tbl_dt_penjualan','tbl_ht_penjualan.id=tbl_dt_penjualan.id');
		$select = $this->db->where('waktu >= "'.$_GET['dari'].'"');
		$select = $this->db->where('waktu <= "'.$_GET['sampai'].'"');
		$select = $this->db->where('id_owner',$_GET['id_owner']);
		$data['read_penjualan'] = $this->m->Get_All('tbl_ht_penjualan',$select);
		$data['dari'] = $_GET['dari'];
		$data['sampai'] = $_GET['sampai'];
		$this->load->view('admin/laporan_penjualan_owner', $data);
	}

	public function LaporanAllSupplier(){
		$this->sidebar();
		$data = array(
			'laporan' => "open",
			'laporan_all_supplier' => "active",
		);
		$this->session->set_userdata($data);
		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari']. ' + 1 months'));
		$this->load->view('admin/laporan-all-supplier', $data);
	}

	public function CetakLaporanAllSupplier()
	{
		$select = $this->db->select('*');
		$select = $this->db->join('tbl_dt_pembelian', 'tbl_ht_pembelian.id=tbl_dt_pembelian.id');
		$select = $this->db->where('waktu >= "' . $_GET['dari'] . '"');
		$select = $this->db->where('waktu <= "' . $_GET['sampai'] . '"');
		//$select = $this->db->where('id_supplier', '1');
		$data['pembelian'] = $this->m->Get_All('tbl_ht_pembelian', $select);
		$data['dari'] = $_GET['dari'];
		$data['sampai'] = $_GET['sampai'];
		$this->load->view('admin/laporan_all_supplier', $data);
	}

	public function LaporanPerSupplier()
	{
		$this->sidebar();
		$data = array(
			'laporan' => "open",
			'laporan_per_supplier' => "active",
		);
		$this->session->set_userdata($data);

		$select = $this->db->select('*, tbl_ht_pembelian.id as id')->join('tbl_supplier', 'tbl_supplier.id = tbl_ht_pembelian.id_supplier');
		$data['read'] = $this->m->Get_All('tbl_ht_pembelian', $select);

		$select = $this->db->select('*');
		$data['nama_supplier'] = $this->m->Get_All('tbl_supplier', $select);

		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . ' + 1 months'));
		$this->load->view('admin/laporan-per-supplier', $data);
	}

	public function CetakLaporanPerSupplier()
	{
		$select = $this->db->select('*');
		$select = $this->db->join('tbl_dt_pembelian', 'tbl_ht_pembelian.id=tbl_dt_pembelian.id');
		$select = $this->db->where('waktu >= "' . $_GET['dari'] . '"');
		$select = $this->db->where('waktu <= "' . $_GET['sampai'] . '"');
		$select = $this->db->where('id_supplier', $_GET['id_supplier']);
		$data['pembelian'] = $this->m->Get_All('tbl_ht_pembelian', $select);
		$data['nama_supplier']="";
            foreach ($data['pembelian']as $d) {$data['nama_supplier'] = $d->nama_supplier;}
		$data['dari'] = $_GET['dari'];
		$data['sampai'] = $_GET['sampai'];
		$this->load->view('admin/laporan_per_supplier', $data);
	}

	public function LaporanPiutangPerTanggal()
	{
		$this->sidebar();
		$data = array(
			'laporan' => "open",
			'laporan_piutang' => "active",
		);
		$this->session->set_userdata($data);

		$data['dari'] = date('Y-m-d');
		$data['sampai'] = date('Y-m-d', strtotime($data['dari'] . ' + 1 months'));
		$this->load->view('admin/laporan-piutang-per-tanggal', $data);
	}

	public function CetakLaporanPiutangPerTanggal()
	{
		$select = $this->db->select('*, sum(total_bayar) as total_bayar, sum(harga_jual*kuantitas) as total_omset');
		$select = $this->db->join('tbl_dt_penjualan', 'tbl_ht_penjualan.id=tbl_dt_penjualan.id');
		//$select = $this->db->join('tbl_customer', 'tbl_customer.id=tbl_ht_penjualan.id_customer');		
		//$select = $this->db->order_by('tbl_ht_penjualan.id');
		$sampai = date('Y-m-d', strtotime($_GET['sampai'] . ' + 1 days'));
		//$select = $this->db->where('status = ', "Karyawan");
		$select = $this->db->where('waktu >= "' . $_GET['dari'] . '"');
		$select = $this->db->where('waktu <= "' . $sampai . '"');
		$select = $this->db->group_by('tbl_ht_penjualan.id_customer');
		$data['penjualan'] = $this->m->Get_All('tbl_ht_penjualan', $select);
		$data['dari'] = $_GET['dari'];
		$data['sampai'] = $_GET['sampai'];
		$this->load->view('admin/laporan_piutang_per_tanggal', $data);
	}
}