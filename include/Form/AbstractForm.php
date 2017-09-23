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

    protected $form;

    public function __construct() {
        $this->form = new \Zend_Form();
    }

    public function isValid(array $data) {
        return $this->form->isValid($data);
    }

    public function getValues()
    {
        return $this->form->getValues();
    }

    public function render() {

        $form = $this->form;

/*
        // see http://blog.kosev.net/2010/06/tutorial-create-zend-framework-form/
        $form->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'span')),
            'Form'
        ));
        $form->setElementDecorators(array(
            'ViewHelper',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'span')),
            array('Label', array('tag' => 'span')),
            array(array('row' => 'HtmlTag'), array('tag' => 'div'))
        ));

*/
        return $form->render(new \Zend_View());
    }
}