<?php

use georgescafe\repositories\IRepository;

abstract class AccountsBaseController extends Controller {


    public function __construct(IRepository $repo) {

        $this->repository = $repo;

    }


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }

    }



    protected function index() {

        return $this->repository->all();
    }



    public function show($id) {
        return $this->repository->find($id);
    }


    protected function create() {

    }



    protected function store() {

        $entity = $this->repository->store();

        if( $entity != null )
        {
            $data = ['status' => 'success', 'message' => static::$resource. ' created successfully', static::$resource => $entity->toArray() ];
        } else {
            $data = ['status' => 'fail', 'message' => 'error occured while creating ' . static::$resource , 'errors' => $this->repository->get_errors()->all()];
        }
        echo json_encode($data);
    }



    protected function edit($id) {

    }


    protected function update($id) {


        if($this->repository->update($id, null)) {

            $data = ['status' => 'success', 'message' => static::$resource . ' has been updated successfully'];
        } else {

            $data = ['status' => 'fail', 'message' => 'errors occured while updating ' . static::$resource , 'errors' => $this->repository->get_errors()->all()];
        }

        echo json_encode($data);
    }



    protected function destroy($id) {

        if($this->repository->destroy($id)) {

            $data = ['status' => 'success', 'message' => static::$resource . ' has been Deleted successfully'];
            echo json_encode($data);
        }
    }


}
