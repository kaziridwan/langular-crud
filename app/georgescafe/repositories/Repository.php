<?php
namespace georgescafe\repositories;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use \Validator;
use \Input;

abstract class Repository implements IRepository{

	protected $model;

	protected $errors;

	function __construct($model = null) 
	{
		if($model == null) 
		{
			throw new ModelNotFoundException;
		}

		$this->model = $model;
	}


	public function all()
	{
		return $this->model->all();
	}


	public function find($id)
	{
		return $this->model->find($id);
	}




	public function store($properties = null)
	{
		$properties = $properties ?: Input::except("_token");

		if($this->validate($properties)) 
		{

			$model = $this->model->create($properties);
			return $model;
		}

		return null;
	}






	public function update($entity_id, $properties = null)
	{	
		$properties = $properties ?: Input::except("_token");

		if($this->validate($properties)) 
		{
			$entity = $this->model->find($entity_id);
			$entity->update($properties);
			return true;
		}

		return false;

	}




	public function validate($properties)
	{
		$validation = \Validator::make($properties, static::$rules, static::$messages);

		if($validation->passes())
		{
			return true;
		}

		$this->errors = $validation->messages();
		return false;
	}


	public function destroy($id) {
		try {
			$entity = $this->model->find($id);
			$entity->delete();
			return true;
		} catch (ModelNotFoundException $e) {
    		return false;
		}
	}



	public function get_errors()
	{
		return $this->errors;
	}


}






