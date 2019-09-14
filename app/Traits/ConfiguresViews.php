<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/22/2019
 * Time: 11:39 PM
 */

namespace App\Traits;

trait ConfiguresViews
{
    /**
     * View name for index list
     *
     * @var string
     */
    protected $indexViewName;

    /**
     * View name for index list
     *
     * @var string
     */
    protected $createViewName;

    /**
     * View name for index list
     *
     * @var string
     */
    protected $showViewName;

    /**
     * View name for editing an item
     *
     * @var string
     */
    protected $editViewName;

    /**
     * @return string
     */
    public function getIndexViewName(): string
    {
        return $this->indexViewName;
    }

    /**
     * @param string $viewViewName
     */
    public function setIndexViewName(string $indexViewName): void
    {
        $this->indexViewName = $indexViewName;
    }

    /**
     * @return string
     */
    public function getShowViewName(): string
    {
        return $this->showViewName;
    }

    /**
     * @param string $viewViewName
     */
    public function setShowViewName(string $showViewName): void
    {
        $this->showViewName = $showViewName;
    }

    /**
     * @return string
     */
    public function getCreateViewName(): string
    {
        return $this->createViewName;
    }

    /**
     * @param string $viewViewName
     */
    public function setCreateViewName(string $createViewName): void
    {
        $this->createViewName = $createViewName;
    }

    /**
     * @return string
     */
    public function getEditViewName(): string
    {
        return $this->editViewName;
    }

    /**
     * @param string $viewViewName
     */
    public function setEditViewName(string $editViewName): void
    {
        $this->editViewName = $editViewName;
    }

    /**
     * @param string $viewName
     */
    public function setAllViewByName(String $viewName) : void
    {
        $this->indexViewName    = $viewName . ".index";
        $this->showViewName     = $viewName . ".detail";
        $this->editViewName     = $viewName . ".edit";
        $this->createViewName   = $viewName . ".create";
    }

    /**
     * @param array $views
     *  [
     *   "indexViewName" => "viewName.index",
     *   "showViewName" => "viewName.detail",
     *   "createViewName" => "viewName.create",
     *   "editViewName" => "viewName.edit",
     *  ]
     */
    public function setAllViewByArray(array $views) : void
    {
        foreach ($views AS $key => $view){
            $this->{$key} = $view;
        }
    }
}