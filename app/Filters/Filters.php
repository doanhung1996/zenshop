<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters
{
    protected $request, $builder;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;
        foreach ($this->getFilter() as $filter => $value) {
            // qc() , q()
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }


    /**
     * @return array
     */
    public function getFilter(): array
    {
        return array_filter($this->request->only($this->filters));
    }

}