<?php

namespace georgescafe\repositories;

/**
 * undocumented class
 *
 * @package default
 * @author 
 **/
interface IRepository
{
	
	/**
	* Returns the index of the model.
	*/
	public function all();

	/**
	* Stores an entities.
	*/
	public function store($properties = null);

	/**
	* Returns an entity with the $id
	*/
	public function find($entity_id);


	public function update($entity_id, $properties = null);


	public function destroy($id);

}