<?php

class Block {
    private $id;
    private $dttm;
    private $content;
    private $hash;
    
    public function __construct($id = 0, $dttm = null, $content = "", $hash = "") {
        $this->id = $id;
        $this->dttm = $dttm ?? new DateTime();
        $this->content = $content;
        $this->hash = $hash;
    }
    
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setDttm($dttm) {
        $this->dttm = $dttm;
        return $this;
    }
    
    public function getDttm() {
        return $this->dttm;
    }
    
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }
    
    public function getHash() {
        return $this->hash;
    }
    
    public function generateHash() {
        return hash('sha256', $this->id . $this->content . $this->dttm->format('YY-mm-dd HH:mm:ss') . $this->hash);
    }
}
