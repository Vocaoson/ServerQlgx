<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SynFileCL extends CI_Controller 
{
    private $dataDir;
    public function __construct(){
        parent::__construct();
        $this->load->model('SynFileMD');
        $this->load->model('GiaoXuMD');
        $this->dataDir = $this->config->item("data_dir");
        if(!is_dir($this->dataDir . '/temp_syn')) {
            $check= mkdir($this->dataDir . '/temp_syn',0777,TRUE);
        }
        if(!is_dir($this->dataDir . '/syn')) {
            $check= mkdir($this->dataDir . '/syn',0777,TRUE);
        }
    }
    public function getFileSyn($maGiaoXuRieng){
        if(isset($_FILES) && count($_FILES) > 0){
            $zip = new ZipArchive();
            $dirTemp = $this->dataDir . '/temp_syn/';
            $file = $dirTemp . $_FILES['file']['name'];
            if(count($_FILES) > 0){
                move_uploaded_file($_FILES['file']['tmp_name'],$file);
            }
            
            $res = $zip->open($file);
            if($res === true)
            {
                $synId = $this->insert($maGiaoXuRieng);
                if($synId) 
                {
                    $path = $this->getStorePath($maGiaoXuRieng,$synId);
                    if(is_dir($path))
                    {
                        $zip->extractTo($path);
                        echo 1;
                    }
                    else
                    {
                        echo 0;
                    }
                }
            } else {
                echo -1;
            }
            $zip->close();
        }
    }
    public function insert($maGiaoXuSyn){
        $this->SynFileMD->uploadedDate = date('m-d-Y H:i:s');
        $this->SynFileMD->maGiaoXuSyn = $maGiaoXuSyn;
        $result = $this->SynFileMD->insert();
        return $result;
    }
    public function getStorePath($maGiaoXuSyn,$synId){
        $dirData = $this->dataDir . '/syn/';
        $dir = $dirData . $maGiaoXuSyn . '/' . $synId;
        if(!is_dir($dir)){
            $rs = mkdir($dir,0700,true);
        }
        return $dir;
    }
    
}