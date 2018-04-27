<?php

namespace AmavisWblist\Form;

class Policy extends AbstractForm {

    /**
     * @var array
     */
    private $fields = [
        ['name' => 'policy_name', 'label' => 'Policy Name', 'type' => 'text', 'size' => 30, 'maxlength' => 255, 'required' => true],
        ['name' => 'virus_lover', 'label' => 'Virus Lover', 'type' => 'selectyn_'],
        ['name' => 'spam_lover', 'label' => 'Spam Lover', 'type' => 'selectyn_'],
        ['name' => 'unchecked_lover', 'label' => 'Unchecked Lover', 'type' => 'selectyn_'],
        ['name' => 'banned_files_lover', 'label' => 'Banned Files Lover', 'type' => 'selectyn_'],
        ['name' => 'bad_header_lover', 'label' => 'Bad Header Lover', 'type' => 'selectyn_'],

        ['name' => 'bypass_virus_checks', 'label' => 'Bypass Virus Checks', 'type' => 'selectyn_'],
        ['name' => 'bypass_spam_checks', 'label' => 'Bypass Spam Checks', 'type' => 'selectyn_'],
        ['name' => 'bypass_banned_checks', 'label' => 'Bypass Banned File Checks', 'type' => 'selectyn_'],
        ['name' => 'bypass_header_checks', 'label' => 'Bypass Header Checks', 'type' => 'selectyn_'],

        ['name' => 'virus_quarantine_to', 'label' => 'Quarantine Virus To', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_quarantine_to', 'label' => 'Quarantine Spam To', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'banned_quarantine_to', 'label' => 'Quarantine Banned Files to', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'unchecked_quarantine_to', 'label' => 'Unchecked Quarantine to', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'bad_header_quarantine_to', 'label' => 'Bad Header Quarantine To', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'clean_quarantine_to', 'label' => 'Clean Quarantine To', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'archive_quarantine_to', 'label' => 'Archive Quarantine To', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],


        ['name' => 'spam_tag_level', 'label' => 'Spam - Level 1 - Above this level', 'type' => 'float'],
        ['name' => 'spam_tag2_level', 'label' => 'Spam - Level 2 - Above this level', 'type' => 'float'],
        ['name' => 'spam_tag3_level', 'label' => 'Spam - Level 3 - Blatent spam', 'type' => 'float'],
        ['name' => 'spam_kill_level', 'label' => 'Spam - Quarantine above this level', 'type' => 'float'],
        ['name' => 'spam_dsn_cutoff_level', 'label' => 'Spam - Do Not send notifications above this level', 'type' => 'float'],
        ['name' => 'spam_quarantine_cutoff_level', 'label' => 'Spam - Do not quarantine above this level', 'type' => 'float'],


        ['name' => 'addr_extension_virus', 'label' => 'Address extension for virus messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],
        ['name' => 'addr_extension_spam', 'label' => 'Address extension for spam messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],
        ['name' => 'addr_extension_banned', 'label' => 'Address extension for banned messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],
        ['name' => 'addr_extension_bad_header', 'label' => 'Address extension for bad header messages', 'advanced' => true, 'type' => 'text', 'size' => 6, 'maxlength' => 6],

        ['name' => 'warnvirusrecip', 'label' => 'Warn Virus Recipient', 'type' => 'selectyn_'],
        ['name' => 'warnbannedrecip', 'label' => 'Warn Banned File Recipient', 'type' => 'selectyn_'],
        ['name' => 'warnbadhrecip', 'label' => 'Warn Bad Header Recipient', 'type' => 'selectyn_'],


        ['name' => 'newvirus_admin', 'label' => 'New virus admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'virus_admin', 'label' => 'Other virus admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'banned_admin', 'label' => 'Banned header admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'bad_header_admin', 'label' => 'Bad header admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_admin', 'label' => 'Spam admin email to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_subject_tag', 'label' => 'Set Spam Level 1 Subject to include ...', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_subject_tag2', 'label' => 'Set Spam Level 2 Subject to include...', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'spam_subject_tag3', 'label' => 'Set Spam Level 3 Subject to include...', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],

        ['name' => 'message_size_limit', 'label' => 'Maximum Message size to scan (bytes)', 'advanced' => true, 'type' => 'text', 'size' => 10, 'maxlength' => 10],
        ['name' => 'banned_rulenames', 'label' => 'Comma seperated list of bad rule names', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],

/*
        ['name' => 'disclaimer_options', 'label' => '????', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'forward_method', 'label' => 'forward method to postfix ??', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'sa_userconf', 'label' => 'SpamAssassin config ??', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
        ['name' => 'sa_username', 'label' => 'Run SpamAssassin as user ...', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength' => 64],
*/

    ];


    public function __construct()
    {

        parent::__construct();

        $this->initialize();
    }

    /**
     * @return void
     */
    protected function initialize() {

        $form = $this->form;
        $form->setAction('policy.php');
        $form->setMethod('post');

        foreach ($this->fields as $spec) {

            $spec['advanced'] = isset($spec['advanced']) ? $spec['advanced'] : false;

            $spec['required'] = isset($spec['required']) ? $spec['required'] : false;

            $advanced_or_normal = $spec['advanced'] ? "advanced" : "normal";

            if ($spec['type'] == 'selectyn_') {
                $element = new \Zend_Form_Element_Select($spec['name']);
                $element->setLabel($spec['label']);
                $element->setMultiOptions(['Y' => 'Yes', 'N' => 'No', '' => 'Fall-through']);
            }
            elseif ($spec['type'] == 'text' || $spec['type'] == 'float') {
                // asdf
                $spec['size'] = isset($spec['size']) ? $spec['size'] : 6;
                $spec['maxlength'] = isset($spec['maxlength']) ? $spec['maxlength'] : 6;

                $element = new \Zend_Form_Element_Text($spec['name']);
                $element->setAttrib('size', $spec['size']);
                $element->setLabel($spec['label']);
                $element->setAttrib('maxlength', $spec['maxlength']);

                if($spec['type'] == 'float') {
                    $element->addValidator(new \Zend_Validate_Float('en_GB'));
                }

                $element->addValidator(new \Zend_Validate_StringLength(0, $spec['maxlength']));
                $element->addFilter(new \Zend_Filter_StringTrim());
                $element->setRequired($spec['required']);

            }
            else {

                throw new \InvalidArgumentException('Unsupported field type:' . json_encode($spec));
            }

            $element->setRequired($spec['required']);

            $element->setAttrib('class', $advanced_or_normal);

            $form->addElement($element);
        }

        $id = new \Zend_Form_Element_Hidden('id');
        $id->setRequired(false);
        $id->addValidator(new \Zend_Validate_Int());
        $id->addValidator(new \Zend_Validate_GreaterThan(0));

        $form->addElement($id);

        $form->setDefaults([
            'virus_lover' => '',
            'spam_lover' => 'N',
            'banned_files_lover' => 'N',
            'bad_header_lover' => 'N',
            'bypass_virus_checks' => '',
            'bypass_spam_checks' => '',
            'bypass_banned_checks' => '',
            'bypass_header_checks' => '',
            'spam_modifies_subj' => 'Y',
            'warnvirusrecip' => '',
            'warnbannedrecip'=> '',
            'warnbadhrecip' => '',
        ]);

        $form->addElement(new \Zend_Form_Element_Submit('submit'));
    }
}
