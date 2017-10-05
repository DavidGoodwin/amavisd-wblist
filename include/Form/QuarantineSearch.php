<?php

namespace AmavisWblist\Form;


class QuarantineSearch extends AbstractForm
{

    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    public function initialize()
    {

        $form = new \Zend_Form();
        $form->setMethod('GET');
        $form->setAction('');
        $restrict_dropdown = new \Zend_Form_Element_Select('show');
        $restrict_dropdown->setLabel('Restrict To');
        $restrict_dropdown->setMultiOptions(array('sixty' => 'Last 60 Minutes', 'day' => 'Last 24 hours', 'week' => 'Last Week'));
        $restrict_dropdown->setRequired(false);

        $form->addElement($restrict_dropdown);

        $level = new \Zend_Form_Element_Select('level');
        $level->setLabel('Spam Level >=');
        $level->setMultiOptions(range(0, 10));
        $level->setRequired(false);

        $form->addElement($level);

        $type_dropdown = new \Zend_Form_Element_Select('content');
        $type_dropdown->setLabel('Type');

        $type_dropdown->setRequired(False);

        $form->addElement($type_dropdown);

        $subject = new \Zend_Form_Element_Text('subject');
        $subject->setLabel('Subject');
        $subject->setRequired(False);
        $subject->addValidator(new \Zend_Validate_StringLength(array('min' => 0, 'max' => 50)));
        $form->addElement($subject);

        $quarantined = new \Zend_Form_Element_Checkbox('quarantined_only');
        $quarantined->setLabel("Restrict to Quarantined?");
        $quarantined->setCheckedValue('yes');
        $quarantined->setUncheckedValue('no');
        $form->addElement($quarantined);


        $submit = new \Zend_Form_Element_Submit('submit');
        $form->addElement($submit);

        $this->form = $form;

    }

    public function setContentOptions(array $whatever)
    {
        $this->form->getElement('content')->setMultiOPtions($whatever);
    }
}