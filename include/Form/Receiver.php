<?php

namespace AmavisWblist\Form;


class Receiver extends AbstractForm
{

    public function __construct() {
        parent::__construct();
        $this->initialize();
    }

    public function initialize()
    {

        $form = $this->form;

        $form->setMethod('POST');
        $form->setAction('recipient.php');

        $priority = new \Zend_Form_Element_Select('priority');
        $options = [];
        foreach (range(0, 30) as $p) {
            $options[$p] = $p;
        }
        $priority->setLabel('Choose priority');
        $priority->setMultiOptions($options);


        $form->addElement($priority);

        $policy = new \Zend_Form_Element_Select('policy_id');
        $policy->setLabel('Choose policy');

        $form->addElement($policy);


        $fn = new \Zend_Form_Element_Text('fullname');
        $fn->setLabel('Full name');
        $fn->addFilter(new \Zend_Filter_StringToLower());
        $fn->addFilter(new \Zend_Filter_StringTrim());

        $fn->setRequired(true);
        $fn->addValidator(new \Zend_Validate_StringLength(0, 255));

        $form->addElement($fn);

        $email = new \Zend_Form_Element_Text('email');
        $email->setRequired(true);
        $email->setLabel("Email Address");
        $email->addFilter(new \Zend_Filter_StringToLower());
        $email->addFilter(new \Zend_Filter_StringTrim());
        $form->addElement($email);


        $id = new \Zend_Form_Element_Hidden('id');
        $id->setRequired(False);
        $id->addValidator(new \Zend_Validate_Int());
        $id->addValidator(new \Zend_Validate_GreaterThan(0));
        $form->addElement($id);

        $submit = new \Zend_Form_Element_Submit('submit');
        $form->addElement($submit);

    }

    public function setPolicys(array $rows) {
        $options = [];
        foreach($rows as $key => $value) {
            $options[$value['id']] = $value['policy_name'];
        }
        $select = $this->form->getElement('policy_id');

        $select->setMultiOptions($options);
    }
}
