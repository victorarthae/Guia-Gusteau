<?php
/**
 * Created by PhpStorm.
 * User: arthae
 * Date: 9/27/2015
 * Time: 6:36 PM
 */

namespace ggapi\V1\Rest\Profile;

use Zend\Db\TableGateway\TableGateway;

class ProfileMapper
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function fetchOne($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id_user'=>$id));
        $row = $rowset->current();
        if(!$row)
        {
            throw new \Exception("Usuario não encontrado.");
        }

        return $row;
    }

    public function save(ProfileEntity $profile)
    {
        $data = $profile->getArrayCopy();
        $id = (int) $profile->id;

        if($id == 0){
            $res = $this->tableGateway->insert($data);
            $profile->id = $this->tableGateway->lastInsertValue;
            return $profile;
        }else{
            if($this->fetchOne($id)){
                $this->tableGateway->update($data, array('id_user'=>$id));
                return $profile;
            }
        }
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id_user'=>(int)$id));
    }
}