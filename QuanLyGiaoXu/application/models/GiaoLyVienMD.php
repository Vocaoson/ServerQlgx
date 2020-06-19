<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GiaoLyVienMD extends CI_Model {
	private $table;
	public function __construct()
	{
		parent::__construct();
		$this->table="giaolyvien";
	}

	public function getByMaLopMaGiaoDan($maLop,$maGiaoDan)
	{
		$this->db->where("MaLop",$maLop);
		$this->db->where("MaGiaoDan",$maGiaoDan);
		return $this->db->get($this->table)->row();
	}
	public function insert($data){
		unset($data["KhoaChinh"]);
		unset($data["DeleteClient"]);
		$this->db->insert($this->table,$data);
	}
	public function delete($data)
	{
		$this->db->set('DeleteSV',1);
		$this->db->set('MaDinhDanh',$data['MaDinhDanh']);
		$this->db->set('UpdateDate',$data['UpdateDate']);
		$this->db->where('MaGiaoDan', $data['MaGiaoDan']);
		$this->db->where('MaLop', $data['MaLop']);
		$this->db->where('MaGiaoXuRieng', $data['MaGiaoXuRieng']);
		$this->db->update($this->table);
	}
	public function update($data)
	{
		$maLop=$data['MaLop'];
		$maGiaoDan=$data['MaGiaoDan'];
		unset($data['DeleteClient']);
		unset($data['MaLop']);
		unset($data['MaGiaoDan']);
		unset($data['KhoaChinh']);
		$data['DeleteSV']=0;
		$this->db->where('MaLop', $maLop);
		$this->db->where('MaGiaoDan', $maGiaoDan);
		$this->db->update($this->table,$data);
	}  
	public function getAllByMaGiaoXuRiengAndDiffMaDinhDanh($maGiaoXuRieng,$maDinhDanh,$dieukien)
	{
		$this->db->where($dieukien);
		$this->db->where('MaGiaoXuRieng', $maGiaoXuRieng);
		$this->db->where('MaDinhDanh !=', $maDinhDanh);
		$query=$this->db->get($this->table);
		$data['field']=$this->db->list_fields($this->table);
		$data['data']= $query->result();
		return $data;
	}
	//Tạm xóa
	/*
	public function getAll($MaGiaoXuRieng)
	{
		$this->db->where('MaGiaoXuRieng', $MaGiaoXuRieng);
		$query=$this->db->get($this->table);
		return $query->result();
	}
	
	public function deleteTwoKey($MaLop,$MaGiaoDan,$magiaoxurieng)
	{
		$this->db->where('MaGiaoXuRieng', $magiaoxurieng);
		$this->db->where('MaGiaoDan', $MaGiaoDan);
		$this->db->where('MaLop', $MaLop);
		$this->db->set('DeleteSV',1);
		$this->db->update($this->table);
	}
	public function deleteMaLop($MaLop,$MaGiaoXuRieng)
	{
		$this->db->where('MaGiaoXuRieng', $MaGiaoXuRieng);
		$this->db->where('MaLop', $MaLop);
		$this->db->set('DeleteSV',1);
		$this->db->update($this->table);
	}
	public function deleteMaGiaoDan($maGiaoDan,$magiaoxurieng)
	{
		$this->db->where('MaGiaoXuRieng', $magiaoxurieng);
		$this->db->where('MaGiaoDan', $maGiaoDan);
		$this->db->set('DeleteSV',1);
		$this->db->update($this->table);
	}
	public function findwithID($MaLop,$maGiaoDan,$maGiaoXu)
	{
		$this->db->where('MaGiaoXuRieng', $maGiaoXu);
		$this->db->where('MaLop', $MaLop);
		$this->db->where('MaGiaoDan', $maGiaoDan);
		$query=$this->db->get($this->table);
		return $query->row();
	}
	*/
}

/* End of file GiaoLyVienMD.php */
/* Location: ./application/models/GiaoLyVienMD.php */