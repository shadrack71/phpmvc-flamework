<?php
namespace app\core\field;

use App\Model;


class Field {

    public Model $model;
    public string $attribute;

    public function __construct($model, $attribute){
        $this->model = $model;
        
        $this ->attribute = $attribute;



    }

    public function __toString()
    {
        return sprintf(
            '
            <div class="form-group">
              <label> %s </label>
                <input class="form-control form-control-lg" type="text" name="%s" value = "%s"
                  
                                    </div>
            
            ',
            $this ->attribute,
            $this ->attribute,
            $this ->attribute,




        );
        
    } 





}