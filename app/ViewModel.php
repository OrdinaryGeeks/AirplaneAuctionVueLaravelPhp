<?php
namespace App\Http\ViewModels;
abstract class ViewModel
{
    //https://niceprogrammer.com/laravel-view-model/
    protected $mappings = [];
    /**
     * Map an array to the view-model's properties.
     *
     * @param $values
     * @return ViewModel
     */
    public function mapArray($values)
    {
        foreach ($this->mappings as $index => $mapping) {
            if (is_array($mapping)) {
                if (count($mapping) == 3 && $mapping[2] == 'array') {
                    foreach ($values[$mapping[1]] as $index2 => $value) {
                        /* @var $vm ViewModel */
                        $vm = new $mapping[0]();
                        $this->$index[] = $vm->mapArray($value);
                    }
                } else {
                    /* @var $vm ViewModel */
                    $vm = new $mapping[0]();
                    $this->$index = $vm->mapArray($values[$mapping[1]]);
                }
            } else {
                $this->$index = $values[$mapping];
            }
        }
        return $this;
    }
}