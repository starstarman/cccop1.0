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
        $order = [
            'id' => 'asc',//降序desc
        ];

        $data = [
            'id'=>$id,
        ];
        $result = $this->where($data)
            ->order($order)
            ->select();
        return $result;
    }
}