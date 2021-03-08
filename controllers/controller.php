<?php

class Controller
{
    private $_f3;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    // Show products on page w/ $f3
    public function products()
    {
        $title = getProductTitles();
        $images = getProductImages();
        $description = getProductDescriptions();
        $value = getProductValue();

        $this->_f3->set('div', array(
            'title'=>($title),
            'images'=>($images),
            'description'=>($description),
            'value'=>($value)));

        // Associate products with arrays
//        $this->_f3->set('title', $title);
//        $this->_f3->set('images', $images);
//        $this->_f3->set('description', $description);
//        $this->_f3->set('value', $value);

        // Render view
        $view = new Template();
        echo $view->render('views/products.html');
    }

}