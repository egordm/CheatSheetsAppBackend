<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 00:32
 */

namespace Admin\Controllers;


use Admin\Helpers\FieldHelper;
use Admin\Presenters\Presenter;
use Admin\Repositories\Repository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Monolog\Logger;

abstract class CrudController extends Controller
{
    private $presenter;
    private $repository;

    /**
     * CrudController constructor.
     * @param Presenter $presenter
     * @param Repository $repository
     */
    public function __construct($presenter, $repository = null)
    {
        $this->presenter = $presenter;
        if(empty($repository)) $repository = new Repository($presenter);
        $this->repository = $repository;
    }

    /**
     * @return Presenter
     */
    protected function getPresenter() {
        return $this->presenter;
    }

    /**
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    public function index(Request $request)
    {
        $items = $this->getRepository()->getIndex();
        return $this->getPresenter()->renderIndex($items, $request->all());

    }

    public function create()
    {
        return $this->getPresenter()->renderEdit();
    }

    public function store(Request $request)
    {
        $inputs = $this->getRepository()->parseInputs($request->all());

        $validator = $this->getRepository()->validate($inputs);
        if($validator->fails()) {
            return $this->getPresenter()->renderEdit()
                ->with('model', $inputs)
                ->withErrors($validator->errors());
        }

        $model = $this->getRepository()->createInstance($inputs);
        if(!$model->save()) {
            return $this->getPresenter()->renderEdit()
                ->with('model', $request->all());
        }

        $this->alert('Succesfully created item', 'success');
        return redirect(route($this->getPresenter()->getRouteName() . '.index'));
    }

    public function show(Request $request, $id)
    {
        $item = $this->getRepository()->getModel($id);
        return $this->getPresenter()->renderShow($item, $request->all());
    }

    public function edit($id)
    {
        $model = $this->getRepository()->getModel($id);
        return $this->getPresenter()->renderEdit($model, Presenter::ACTION_EDIT);
    }

    public function update(Request $request, $id)
    {
        $inputs = $this->getRepository()->parseInputs($request->all());
        $model = $this->getRepository()->getModel($id);
        $model->fill($inputs);

        $validator = $this->getRepository()->validate($inputs);
        if($validator->fails()) {
            return $this->getPresenter()->renderEdit($model,Presenter::ACTION_EDIT)
                ->withErrors($validator->errors());
        }

        if(!$model->save()) {
            return $this->getPresenter()->renderEdit($model,Presenter::ACTION_EDIT);
        }

        $this->alert('Succesfully updated item', 'success');
        return redirect(route($this->getPresenter()->getRouteName() . '.index'));
    }

    public function destroy($id)
    {
        $res = $this->getRepository()->delete($id);
        $this->alert('Succesfully deleted item', 'success');
        return redirect(route($this->getPresenter()->getRouteName() . '.index'));
    }

    protected function alert($message, $type = 'info')
    {
        \Session::flash('flash_alert', session('flash_alert', []) + [compact('message', 'type')]);
    }
}