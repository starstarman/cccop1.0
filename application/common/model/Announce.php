<?php
namespace app\common\model;
use think\Db;
use think\Model;

class Announce extends Model
{
    private  $obj;
    public function _initialize() {
        $this->obj = model("announce");
    }
    public function addi($data){
        return $this->save($data);
    }

    public function getAnnounceElemenById(){
         $order = [
             'id' => 'desc',//降序desc
         ];

         $data = [
         ];
         $result = $this->where($data)
             ->order($order)
             ->paginate(10);
         return $result;
     }
    public function getAnnounceElemenById1($id){
        $data = [
            'id'=>$id,
        ];
        $result = $this->where($data)
            ->select();
        return $result;
    }
    public function getAnnounceTitleById($id) {
        $data = [
            'id' => $id
        ];
        return $this->where($data)
            ->select();
    }
    public function getAnnouncecontentById($id){
        $data = [
            'id'=>$id,
        ];
        $result = $this->where($data)
            ->select();
        return $result;
    }
}