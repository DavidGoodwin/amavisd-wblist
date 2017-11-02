<?php

namespace AmavisWblist\Form;


class Sender extends AbstractForm
{

    public function __construct() {
        parent::__construct();
        $this->initialize();
    }

    public function initialize()
    {

        $form = $this->form;
        $form->setMethod('POST');
        $form->setAction('sender.php');

        $priority = new \Zend_Form_Element_Select('priority');
        $priority->setLabel('Choose priority');
        $priority->setMultiOptions(range(0, 20));
        $form->addElement($priority);

        $email = new \Zend_Form_Element_Text('email');
        $email->setRequired(true);
        $email->setLabel("Email Address");
        $email->addFilter(new \Zend_Filter_StringTrim());
        $email->addFilter(new \Zend_Filter_StringToLower());
        $form->addElement($email);

        $id = new \Zend_Form_Element_Hidden('id');
        $id->setRequired(False);
        $id->addValidator(new \Zend_Validate_Int());
        $id->addValidator(new \Zend_Validate_GreaterThan(0));
        $form->addElement($id);

        $submit = new \Zend_Form_Element_Submit('submit');
        $form->addElement($submit);

    }
}
