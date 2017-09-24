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
        $sender = new \Zend_Form_Element_Select('sender');
        $sender->setRequired(true);
        $sender->setLabel('Sender');


 // rid
        $recipient = new \Zend_Form_Element_Select('recipient');
        $recipient->setRequired(true);
        $recipient->setLabel("Recipient");

        $form->addElement($sender);
        $form->addElement($recipient);

// wb

        //  wb     | character varying(10) | not null <- why varchar(10) ????? Score???
        $wb = new \Zend_Form_Element_Select('wb');
        $wb->setRequired(true);
        // wb can contain a -> 'S' => 'Score' - which would allow you to e.g. add 10 spam points on for a specific domain
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
        $sender = $this->form->getElement('sender');

        /* @var \Zend_Form_Element_Select $sender */
        $sender->setMultiOptions($list);
    }

    /**
     * Used to populate the recipient drop down.
     * @param array $list (id => name, id => name ... )
     */
    public function setRecipients(array $list) {
        $recipient = $this->form->getElement('recipient');

        /* @var \Zend_Form_Element_Select $recipient */
        $recipient->setMultiOptions($list);
    }
}
