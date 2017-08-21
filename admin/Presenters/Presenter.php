<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 23:35
 */

namespace Admin\Presenters;

abstract class Presenter
{
    const ACTION_CREATE = 0;
    const ACTION_EDIT = 1;

    private $fields;

    /**
     * Presenter constructor.
     * @param $fields
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }


    public function renderIndex($models, $inputs, $parent = null)
    {
        if (!empty($inputs[$this->getRouteName() . '_query'])) {
            $models = $this->search($models, $inputs[$this->getRouteName() . '_query']);
        }
        $models = $models->paginate(15, ['*'], $this->getRouteName());

        $fields = array_filter(array_values($this->getFields()), function ($field) {
            return in_array($field->getName(), $this->getIndexFields());
        });
        return view(empty($parent) ? 'crud.index' : 'crud.partials.browse', [
            'parent' => $parent,
            'title' => $this->getTitle(),
            'models' => $models,
            'fields' => $fields,
            'route' => $this->getRouteName()
        ]);
    }

    public function renderShow($model, $inputs = [])
    {
        $relations = [];
        foreach ($this->getRelations() as $key => $presenter) {
            $relations[] = $presenter->renderIndex($model->$key(), $inputs, true);
        }

        return view('crud.show', [
            'model' => $model,
            'fields' => array_values($this->getFields()),
            'route' => $this->getRouteName(),
            'relations' => $relations
        ]);
    }

    public function renderEdit($model = null, $action = self::ACTION_CREATE)
    {
        $fields = array_filter(array_values($this->getFields()), function ($field) {
            return $field->isEditable();
        });

        return view('crud.edit', [
            'action' => $action,
            'model' => $model,
            'fields' => $fields,
            'route' => $this->getRouteName()
        ]);
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    public abstract function getModelClass();

    public abstract function getIndexFields();

    public abstract function getSearchFields();

    public abstract function getRouteName();

    public abstract function getRelations();

    public abstract function getTitle();

    protected function search($sql, $searchQuery)
    {
        if (empty($searchQuery)) return $sql;
        return $sql->where(function ($query) use ($searchQuery) {
            foreach ($this->getSearchFields() as $field) {
                $query->orWhere($field, 'like', "%$searchQuery%");
            }
        });
    }
}