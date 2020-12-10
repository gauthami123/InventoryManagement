<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\ProductInterface;

class ProductRepository implements ProductInterface
{
    /**
     * @var Product
     */
    private $model;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        // TODO: Implement getall() method.
       return $this->model->all();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->findById($id);
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.
        $todo=$this->model->findOrFail($attributes);
        $todo->update($todo);
        return $todo;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->destroy($id);
        return true;
    }
}
  