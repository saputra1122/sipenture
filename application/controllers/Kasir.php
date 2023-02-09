<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models','m');

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

		$this->load->view('admin/index', $data);
	}
	public function sidebar()
	{
		$data = array(
			'dashboard' 		=> "",
			'owner' 			=> "",
			'produk' 			=> "",
			'penjualan' 		=> "",
			'pembelian' 		=> "",
			'laporan penjualan' => "",
			'laporan pembelian' => "",
			'master' 			=> "close",
			'transaksi' 		=> "close",
			'laporan' 			=> "close",
		);
		$this->session->set_userdata($data);
	}
	// public function invoice()
	// {

	// 	$this->load->view('admin/invoice');
	// }
	// public function owner()
	// {
	// 	$this->sidebar();
	// 	$data = array(
	// 		'master' => "open",
	// 		'owner' => "active",
	// 	);
	// 	$this->session->set_userdata($data);
	// 	$select = $this->db->select('*');
	// 	$data['read']=$this->m->Get_All('tbl_owner',$select);
	// 	$this->load->view('admin/owner',$data);

	// }
	// public function owner_add()
	// {
	// 	$data=array(
	// 		'nama_owner' => $this->input->post('nama_owner'),
	// 		'no_hp' => $this->input->post('no_hp'),
	// 		'alamat' => $this->input->post('alamat')
	// 		);
			
	// 		$this->m->Save($data,'tbl_owner');
			
	// 		redirect ('Kasir/owner');
	// }
	// public function owner_update()
	// {
	// 	$where=array(
	// 		'id' => $this->input->post('id'),
	// 		);
	// 	$data=array(
	// 		'nama_owner' => $this->input->post('nama_owner'),
	// 		'no_hp' => $this->input->post('no_hp'),
	// 		'alamat' => $this->input->post('alamat')
	// 		);
			
	// 		$this->m->Update($where, $data, 'tbl_owner');
			
	// 		redirect ('Kasir/owner');
	// }
	// public function owner_delete()
	// {
	// 	$where=array(
	// 		'id' => $this->input->post('id'),
	// 		);
			
	// 		$this->m->Delete($where,'tbl_owner');
			
	// 		redirect('Kasir/owner');
	// }
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
	
	// public function produk()
	// {
	// 	$this->sidebar();
	// 	$data = array(
	// 		'master' => "open",
	// 		'produk' => "active",
	// 	);
	// 	$this->session->set_userdata($data);

	// 	$select = $this->db->select('*');
	// 	$data['read']=$this->m->Get_All('tbl_produk',$select);

	// 	$select = $this->db->select('*');
	// 	$data['nama_owner']=$this->m->Get_All('tbl_owner',$select);

	// 	$this->load->view('admin/produk',$data);
	// }
	// public function produk_add()
	// {
	// 	$data=array(
	// 		'id_owner' => $this->input->post('id_owner'),
	// 		'nama_produk' => $this->input->post('nama_produk'),
	// 		'kuantitas' => $this->input->post('kuantitas'),
	// 		'harga_beli' => $this->input->post('harga_beli'),
	// 		'harga_jual' => $this->input->post('harga_jual')
	// 		);
			
	// 		$this->m->Save($data,'tbl_produk');
			
	// 		redirect ('Kasir/produk');
	// }

	// public function produk_update()
	// {
	// 	$where=array(
	// 		'id' => $this->input->post('id')
	// 	);
	// 	$data=array(
	// 		'id_owner' => $this->input->post('id_owner'),
	// 		'nama_produk' => $this->input->post('nama_produk'),
	// 		'kuantitas' => $this->input->post('kuantitas'),
	// 		'harga_beli' => $this->input->post('harga_beli'),
	// 		'harga_jual' => $this->input->post('harga_jual'),
	// 		'update_date' => $this->input->post('update_date'),
	// 		);
			
	// 		$this->m->Update($where, $data,'tbl_produk');
			
	// 		redirect ('Kasir/produk');
	// }
	// public function produk_delete()
	// {
	// 	$where=array(
	// 		'id' => $this->input->post('id'),
	// 		);
			
	// 		$this->m->Delete($where,'tbl_produk');
			
	// 		redirect('Kasir/produk');
	// }
	public function pembelian()
	{
		$this->sidebar();
		$data = array(
			'transaksi' => "open",
			'pembelian' => "active",
		);
		$this->session->set_userdata($data);

		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('tbl_pembelian',$select);

		$select = $this->db->select('*');
		$data['produk']=$this->m->Get_All('tbl_produk',$select);

		$this->load->view('admin/pembelian',$data);

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
		redirect('Kasir/pembelian');
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
		
		redirect('Kasir/pembelian');
	}
	public function hapus_pembelian()
	{
		$where=array(
		'id' => $this->input->post('id'),
		);
		
		$this->m->Delete($where,'tbl_pembelian');
		
		redirect('Kasir/pembelian');
	}
	
	// public function penjualan()
	// {
	// 	$this->sidebar();
	// 	$data = array(
	// 		'transaksi' => "open",
	// 		'penjualan' => "active",
	// 	);
	// 	$this->session->set_userdata($data);

	// 	$select = $this->db->select('*,tbl_ht_penjualan.id as id');
	// 	$select = $this->db->join('tbl_customer','tbl_customer.id=tbl_ht_penjualan.id_customer');
	// 	$data['read']=$this->m->Get_All('tbl_ht_penjualan',$select);

	// 	$select = $this->db->select('*');
	// 	$data['customer']=$this->m->Get_All('tbl_customer',$select);

	// 	$select = $this->db->select('*');
	// 	$data['produk']=$this->m->Get_All('tbl_produk',$select);

	// 	$this->load->view('admin/penjualan',$data);

	// }
	public function tambah_penjualan()
	{
		$data=array(
			'id_customer' => $this->input->post('id_customer'),
			'waktu' => $this->input->post('waktu'),
			'total_bayar' => $this->input->post('total_bayar'),

		);
		$this->m->Save($data,'tbl_ht_penjualan');
		$this->load->view('admin/penjualan',$data);
	}
	public function edit_penjualan()
	{
		$where=array(
		'id' => $this->input->post('id'),
		);

		$data=array(
			'id_customer' => $this->input->post('id_customer'),
			'waktu' => $this->input->post('waktu'),
			'total_bayar' => $this->input->post('total_bayar'),
		);
		
		$this->m->Update($where, $data, 'tbl_ht_penjualan');
		
		$this->load->view('admin/penjualan',$data);
	}
	public function hapus_penjualan()
	{
		$where=array(
		'id' => $this->input->post('id'),
		);
		
		$this->m->Delete($where,'tbl_ht_penjualan');
		
		redirect('Kasir/penjualan');
	}
	function AddCart($id,$qty){
		$where = array(
			'id' => $id
		);
		$getProduk = $this->m->Get_Where($where, 'tbl_produk');
		foreach($getProduk as $d){}
		$data = array(
			'id'			=> $d->id, 
			'name'			=> $d->nama_produk, 
			'qty' 			=> $qty, 
			'price' 		=> $d->harga_jual, 
			'harga_beli' 	=> $d->harga_beli, 
		);
		$this->cart->insert($data);
		$this->ShowCart();
	}
	function ShowCart(){ 
		$output = '';
		$no = 1;
		foreach ($this->cart->contents() as $items) {
			$output .='
					<tr>
						<td>'.$items['name'].'</td>
						<td>'.$items['price'].'</td>
						<td>'.$items['qty'].'</td>
						<td>'.($items['qty']*$items['price']).'</td>
						<td><center>
						<button type="button" 
						class="btn btn-sm btn-danger cancel-cart" 
						onclick="return batal(`'.$items['rowid'].'`)"><i class="fa fa-times"></i>
						</button>
						</center></td>
					</tr>
					';
		}
		$output .= '
				<tr>
					<th colspan="4">Total</th>
					<th>Rp. '.number_format($this->cart->total(),0, ".", ".").'</td>
				</tr>
		';	
		
		echo $output;
	}
	function DeleteCart($row_id){ 
		$data = array(
			'rowid' => $row_id, 
			'qty' => 0, 
		);
		$this->cart->update($data);
		$this->ShowCart();
	}
	public function SaveTransaksiPenjualan()
	{
		$id = date('YmdHis');
		$id_customer = $this->input->post('id_customer');
		$where = array(
			'id' => $id_customer
		);
		$getCustomer = $this->m->Get_Where($where, 'tbl_customer');
		
		foreach($getCustomer as $c){
			$data = array(
				'id' 			=> $id,
				'id_customer' 	=> $id_customer,
				'nama_cust' 	=> $c->nama_cust,
				'waktu'			=> date('Y-m-d H:i:s'),
				'total_bayar'	=> $this->cart->total(),
				'kasir'			=> $this->session->userdata('username'),
			);
			$this->m->save($data, 'tbl_ht_penjualan');
		}		
	}
	
}