<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KhoiGiaoLyMD extends CI_Model {

	private $table;
	public function __construct()
	{
		parent::__construct();
		$this->table='khoigiaoly';
	}
	public function getByMaKhoi($maKhoi)
	{
		$this->db->select('*');
		$this->db->where('MaKhoi', $maKhoi);
		$query=$this->db->get($this->table);
		return $query->row();
	}
	public function getByInfo($dieuKien,$maGiaoXuRieng)
	{
		$this->db->where($dieuKien);
		$this->db->where("MaGiaoXuRieng",$maGiaoXuRieng);
		$query=$this->db->get($this->table);
		return $query->row();
	}

	public function delete($data)
	{
		$this->db->set('DeleteSV',1);
		$this->db->set('MaDinhDanh',$data['MaDinhDanh']);
		$this->db->set('UpdateDate',$data['UpdateDate']);
		$this->db->where('MaKhoi', $data['MaKhoi']);
		$this->db->where('MaGiaoXuRieng', $data['MaGiaoXuRieng']);
		$this->db->update($this->table);
	}
	public function update($data)
	{
		$maKhoi=$data['MaKhoi'];
		unset($data['MaKhoi']);
		unset($data['KhoaChinh']);
		unset($data['KhoaNgoai']);
		unset($data['DeleteClient']);
		$data['DeleteSV']=0;
		$this->db->where('MaKhoi', $maKhoi);
		$this->db->where('MaGiaoXuRieng', $data['MaGiaoXuRieng']);
		$this->db->update($this->table, $data);
	}
	public function insert($data)
	{
		unset($data['MaKhoi']);
		unset($data['KhoaChinh']);
		unset($data['KhoaNgoai']);
		unset($data['DeleteClient']);;
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
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
	public function getAll($maGiaoXuRieng)
	{
		$this->db->where('MaGiaoXuRieng', $maGiaoXuRieng);
		$query=$this->db->get($this->table);
		return $query->result();
	}
	public function deleteReal($dataSV)
	{
		$this->db->where('MaKhoi', $dataSV->MaKhoi);
		$this->db->where('MaGiaoXuRieng', $dataSV->MaGiaoXuRieng);
		$this->db->delete($this->table);
	}
	public function deleteMaKhoi($MaKhoi,$MaGiaoXuRieng)
	{
		$this->db->where('MaKhoi', $MaKhoi);
		$this->db->where('MaGiaoXuRieng', $MaGiaoXuRieng);
		$this->db->set('DeleteSV',1);
		$this->db->update($this->table);
	}
	public function insert($data)
	{
		unset($data['MaKhoi']);
		unset($data['UpdateDate']);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function update($data,$MaKhoi)
	{
		unset($data['MaKhoi']);
		$this->db->where('MaGiaoXuRieng', $data['MaGiaoXuRieng']);
		$this->db->where('MaKhoi', $MaKhoi);
		$this->db->update($this->table, $data);
	}	

	public function getByDK1($data)
	{
		$this->db->where('MaGiaoXuRieng', $data['MaGiaoXuRieng']);
		
		$this->db->where('TenKhoi', $data['TenKhoi']);
		$query=$this->db->get($this->table);
		return $query->result();
	}
*/
}

/* End of file KhoiGiaoLyMD.php */
/* Location: ./application/models/KhoiGiaoLyMD.php */