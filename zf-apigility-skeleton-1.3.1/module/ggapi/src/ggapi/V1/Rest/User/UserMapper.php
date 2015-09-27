<?php
namespace ggapi\V1\Rest\User;

use Zend\Db\TableGateway\TableGateway;

class UserMapper
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

	public function save(UserEntity $user)
	{
		$data = $user->getArrayCopy();
        $id = (int) $user->id;

        if($id == 0){
           $res = $this->tableGateway->insert($data);
           $user->id = $this->tableGateway->lastInsertValue;
           return $user;
        }else{
            if($this->fetchOne($id)){
                $this->tableGateway->update($data, array('id_user'=>$id));
                return $user;
            }
        }
	}

    public function delete($id)
    {
        return $this->tableGateway->delete(array('id_user'=>(int)$id));
    }
}
