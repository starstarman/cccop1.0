<?php
namespace app\common\model;
use think\Model;

class Announce extends Model
{
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
    public function getAnnouncecontentById($id){
        $data = [
            'id'=>$id,
        ];
        $result = $this->where($data)
            ->select();
        return $result;
    }
}