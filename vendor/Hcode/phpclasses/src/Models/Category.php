<?php

namespace Hcode\Models;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class Category extends Model {

    public static function listAll() 
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");
    }

    public function save()
    {

        $sql = new Sql();
        
        $results = $sql->select("CALL sp_categories_save(:idcategory, :descayegory)", array(
            ":idcategory"=>$this->getidcategory(),
            ":descayegory"=>$this->getdescayegory()
        ));

        $this->setData($results[0]);

    }
    
}

?>