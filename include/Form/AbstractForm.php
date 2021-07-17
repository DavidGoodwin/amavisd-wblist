<?php
/**
 * Created by PhpStorm.
 * User: palepurple
 * Date: 22/09/2017
 * Time: 21:50
 */

namespace AmavisWblist\Form;


use AmavisWblist\Form;

abstract class AbstractForm implements Form
{

    /**
     * @var \Zend_Form
     */
    protected $form;

    public function __construct() {
        $this->form = new \Zend_Form();
    }

    /**
     * @return bool
     */
    public function isValid(array $post) {
        return $this->form->isValid($post);
    }


    /**
     * @return array
     */
    public function getValues()
    {
        return $this->form->getValues();
    }


   /**
    * @return string
    */ 
    public function render() {
        $form = $this->form;
        return $form->render(new \Zend_View());
    }
}
