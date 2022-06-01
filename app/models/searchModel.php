<?php
class searchModel extends model{
    protected $key;
    public function getSearchProduct($key){
        $this->dbh->query("SELECT DISTINCT p.name,p.price,p.quantity,p.categoryName,p.subCategory, i.image, d.style,d.neckline,d.season,d.material FROM products p, image i, description d  WHERE p.product_id=i.product_id AND p.product_id = d.product_id AND i.image LIKE '%Front%' AND p.name LIKE '%".$key."%'");
        return $this->dbh->resultSet();
    }
}
?>