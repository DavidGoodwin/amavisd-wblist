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
        $form->setAction('insertreceiver.php');

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

        $localuser = new \Zend_Form_Element_Select('local');
        $localuser->setMultiOptions(['Y' => 'Yes' ,'N' => 'No']);
        $localuser->setLabel('Local User?');

        $form->addElement($localuser);

        $fn = new \Zend_Form_Element_Text('fn');
        $fn->setLabel('Full name');
        $fn->setRequired(true);
        $fn->addValidator(new \Zend_Validate_StringLength(0, 255));

        $form->addElement($fn);

        $email = new \Zend_Form_Element_Text('email');
        $email->setRequired(true);
        $email->setLabel("Email Address");

        $form->addElement($email);

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