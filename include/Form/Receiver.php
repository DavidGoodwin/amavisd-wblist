<?php
/**
 * Created by PhpStorm.
 * User: palepurple
 * Date: 22/09/2017
 * Time: 21:56
 */

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
        $form->setAction('receiver.php');

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

        $fn->setRequired(true);
        $fn->addValidator(new \Zend_Validate_StringLength(0, 255));

        $form->addElement($fn);

        $email = new \Zend_Form_Element_Text('email');
        $email->setRequired(true);
        $email->setLabel("Email Address");
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