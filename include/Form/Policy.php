<?php

namespace AmavisWblist\Form;

class Policy extends AbstractForm {

    private $fields = [
        ['name' => 'policy_name', 'label' => 'Policy Name', 'type' => 'text', 'size' => 30, 'maxlength' => 255, 'required' => true],
        ['name' => 'virus_lover', 'label' => 'Virus Lover', 'type' => 'selectyn_'],
        ['name' => 'spam_lover', 'label' => 'Spam Lover', 'type' => 'selectyn_'],
        ['name' => 'banned_files_lover', 'label' => 'Banned Files Lover', 'type' => 'selectyn_'],
        ['name' => 'bypass_virus_checks', 'label' => 'Bypass Virus Checks', 'type' => 'selectyn_'],
        ['name' => 'bypass_spam_checks', 'label' => 'Bypass Spam Checks', 'type' => 'selectyn_'],
        ['name' => 'bypass_banned_checks', 'label' => 'Bypass Banned File Checks', 'type' => 'selectyn_'],
        ['name' => 'bypass_header_checks', 'label' => 'Bypass Header Checks', 'type' => 'selectyn_'],
        ['name' => 'spam_modifies_subj', 'label' => 'Spam Modifies Subject', 'type' => 'selectyn_'],
        ['name' => 'warnvirusrecip', 'label' => 'Warn Virus Recipient', 'type' => 'selectyn_'],
        ['name' => 'warnbannedrecip', 'label' => 'Warn Banned File Recipient', 'type' => 'selectyn_'],
        ['name' => 'warnbadhrecip', 'label' => 'Warn Bad Header Recipient', 'type' => 'selectyn_'],

        ['name' => 'spam_tag_level', 'label' => 'Insert header tags starting at what level?', 'type' => 'text'],
        ['name' => 'spam_tag2_level', 'label' => 'Mark as spam startin gat what level?', 'type' => 'text'],
        ['name' => 'spam_kill_level', 'label' => 'Spam Quarantine only cutoff', 'type' => 'text'],
        ['name' => 'spam_dsn_cutoff_level', 'label' => 'Do Not send notifications after this level', 'type' => 'text'],
        ['name' => 'spam_quarantine_cutoff_level', 'label' => 'Do not quarantine after this level', 'type' => 'text'],


        ['name' => 'virus_quarantine_to', 'label' => 'Quarantine Virus To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_quarantine_to', 'label' => 'Quarantine Spam To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'banned_quarantine_to', 'label' => 'Quarantine Banned Files to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'bad_header_quarnatine_to', 'label' => 'Bad Header Quarantine To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'other_quarantine_to', 'label' => 'Quarantine All Other Messages To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],

        ['name' => 'addr_extension_virus', 'label' => 'Address extension for virus messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],
        ['name' => 'addr_extension_spam', 'label' => 'Address extension for spam messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],
        ['name' => 'addr_extension_banned', 'label' => 'Address extension for banned messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],
        ['name' => 'addr_extension_bad_header', 'label' => 'Address extension for bad header messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],

        ['name' => 'newvirus_admin', 'label' => 'New virus admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'virus_admin', 'label' => 'Other virus admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'banned_admin', 'label' => 'Banned header admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'bad_header_admin', 'label' => 'Bad header admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_admin', 'label' => 'Spam admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_subject_tag', 'label' => 'Set Spam Message subject to include...', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_subject_tag2', 'label' => 'Set Spam Message second level subject to include...', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],

        ['name' => 'message_size_limit', 'label' => 'Maximum Message size to scan (bytes)', 'advanced' => true, 'type' => 'text', 'size' => 10, 'maxlength' => 10],
        ['name' => 'banned_rulenames', 'label' => 'Comma seperated list of bad rule names', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],

    ];


    public function __construct()
    {

        parent::__construct();

        $this->initialize();
    }

    protected function initialize() {

        $form = $this->form;
        $form->setAction('insertpolicy.php');
        $form->setMethod('post');

        foreach ($this->fields as $spec) {

            $spec['advanced'] = isset($spec['advanced']) ? $spec['advanced'] : false;

            $spec['required'] = isset($spec['required']) ? $spec['required'] : false;

            $advanced_or_normal = $spec['advanced'] ? "advanced" : "normal";

            if ($spec['type'] == 'selectyn_') {
                $element = new \Zend_Form_Element_Select($spec['name']);
                $element->setLabel($spec['label']);
                $element->setMultiOptions(['Y' => 'Yes', 'N' => 'No', '' => 'Default']);
            }
            elseif ($spec['type'] == 'text') {
                // asdf
                $spec['size'] = isset($spec['size']) ? $spec['size'] : 6;
                $spec['maxlength'] = isset($spec['maxlength']) ? $spec['maxlength'] : 6;

                $element = new \Zend_Form_Element_Text($spec['name']);
                $element->setAttrib('size', $spec['size']);
                $element->setLabel($spec['label']);
                $element->setAttrib('maxlength', $spec['maxlength']);
                $element->addValidator(new \Zend_Validate_StringLength(0, $spec['maxlength']));
                $element->setREquired($spec['required']);

            }
            else {

                throw new \InvalidArgumentException('Unsupported field type:' . json_encode($spec));
            }

            $element->setRequired($spec['required']);

            $element->setAttrib('class', $advanced_or_normal);

            $form->addElement($element);
        }

        $form->addElement(new \Zend_Form_Element_Select('submit'));
    }
}
