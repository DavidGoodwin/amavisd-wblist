<?php
/**
 * Created by PhpStorm.
 * User: palepurple
 * Date: 22/09/2017
 * Time: 21:56
 */

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
        $options = [];
        foreach (range(1, 10) as $p) {
            $options[$p] = $p;
        }
        $priority->setLabel('Choose priority');
        $priority->setMultiOptions($options);


        $form->addElement($priority);

        $policy = new \Zend_Form_Element_Select('policy');
        $policy->setLabel('Choose policy');

        $form->addElement($policy);


        $email = new \Zend_Form_Element_Text('email');
        $email->setRequired(true);
        $email->setLabel("Email Address");
        $form->addElement($email);

        $id = new \Zend_Form_Element_Hidden('id');
        $id->setRequired(False);
        $id->addValidator(new \Zend_Validate_Int());
        $id->addValidator(new \Zend_Validate_GreaterThan(0));
        $form->addElement($id);

    }

    public function setPolicys(array $rows) {
        $options = [];
        foreach($rows as $key => $value) {
            $options[$value['id']] = $value['policy_name'];
        }
        $select = $this->form->getElement('policy');

        $select->setMultiOptions($options);
    }
}