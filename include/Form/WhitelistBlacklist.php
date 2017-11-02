<?php

namespace AmavisWblist\Form;

class WhitelistBlacklist extends AbstractForm {


    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    protected function initialize() {

        $form = $this->form;
        $form->setAction('whitelistblacklist.php');
        $form->setMethod('post');

// sid
        $sender = new \Zend_Form_Element_Select('sid');
        $sender->setRequired(true);
        $sender->setLabel('Sender');

 // rid
        $recipient = new \Zend_Form_Element_Select('rid');
        $recipient->setRequired(true);
        $recipient->setLabel("Recipient");

        $form->addElement($sender);
        $form->addElement($recipient);

        //  wb     | character varying(10) | not null 
        $wb = new \Zend_Form_Element_Select('wb');
        $wb->setRequired(true);
        // wb can contain a -> 'S' => 'Score' - which would allow you to e.g. add 5 spam points on for a specific domain
        // however, that would break the Zend Form validator ... so I've not bothered ....
        // See: https://www.ijs.si/software/amavisd/amavisd-new-docs.html
        $wb->setMultiOptions(['W' => 'Whitelist', 'B' => 'Blacklist', 'N' => 'Neutral', ] );

        $form->addElement($wb);
        $form->addElement(new \Zend_Form_Element_Submit('submit'));
    }

    /**
     * USed to populate the sender drop down
     * @param array $list (id => name, id => name ...)
     */
    public function setSenders(array $list) {
        $sender = $this->form->getElement('sid');

        /* @var \Zend_Form_Element_Select $sender */
        $sender->setMultiOptions($list);
    }

    /**
     * Used to populate the recipient drop down.
     * @param array $list (id => name, id => name ... )
     */
    public function setRecipients(array $list) {
        $recipient = $this->form->getElement('rid');

        /* @var \Zend_Form_Element_Select $recipient */
        $recipient->setMultiOptions($list);
    }
}
