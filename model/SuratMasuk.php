<?php
include_once "KoneksiDb.php";

class SuratMasuk{

    private $no_surat;
    private $tgl_surat;
    private $tgl_diterima;
    private $perihal;
    private $sifat;
    private $kd_instansi;
    private $file;
    private $kd_perusahaan;

    public function setNoSurat($no_surat){
        $this->no_surat = $no_surat;
    }

    public function setTglSurat($tgl_surat){
        $this->tgl_surat = $tgl_surat;
    }

    public function setTglDiterima($tgl_diterima){
        $this->tgl_diterima = $tgl_diterima;
    }

    public function setPerihal($perihal){
        $this->perihal = $perihal;
    }

    public function setSifat($sifat){
        $this->sifat = $sifat;
    }

    public function setKdInstansi($kd_instansi){
        $this->kd_instansi = $kd_instansi;
    }

    public function setFile($file){
        $this->file = $file;
    }

    public function setKdPerusahaan($kd_perusahaan){
        $this->kd_perusahaan = $kd_perusahaan;
    }

    public function queryInputSuratMasuk(){
        $kdb = new KoneksiDb();
        $query = "INSERT INTO surat_masuk VALUES('$this->no_surat', '$this->tgl_surat', '$this->tgl_diterima', '$this->perihal', '$this->sifat', '$this->kd_instansi', '$this->file', '$this->kd_perusahaan')";
        $kdb->execute($query);
    }

    public function queryMelihatSuratMasuk($search){
        $kdb = new KoneksiDb();
        $query = "SELECT surat_masuk.*, instansi.nm_instansi FROM surat_masuk, instansi 
        WHERE surat_masuk.kd_instansi=instansi.kd_instansi AND surat_masuk.perihal LIKE '%$search%'";
        return $kdb->execute($query);
    }
    
    public function queryMencariSuratMasuk(){
        $kdb = new KoneksiDb();
        $query = "SELECT surat_masuk.*, instansi.nm_instansi FROM surat_masuk, instansi WHERE surat_masuk.kd_instansi=instansi.kd_instansi AND surat_masuk.no_surat='$this->no_surat'";
        $result = $kdb->execute($query);
        return $result->fetch_array();
    }

    public function queryEditSuratMasuk($no_suratx){
        $kdb = new KoneksiDb();
        $query = "UPDATE surat_masuk SET no_surat='$this->no_surat', tgl_surat='$this->tgl_surat', tgl_diterima='$this->tgl_diterima', perihal='$this->perihal', sifat='$this->sifat', kd_instansi='$this->kd_instansi', file='$this->file' WHERE no_surat='$no_suratx'";
        $kdb->execute($query);
    }

    public function queryHapusSuratMasuk(){
        $kdb = new KoneksiDb();
        $query = "DELETE FROM surat_masuk WHERE no_surat='$this->no_surat'";
        $kdb->execute($query);
    }

    

}
?>